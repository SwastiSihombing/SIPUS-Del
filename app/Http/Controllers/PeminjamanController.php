<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('buku')
            ->latest()
            ->paginate(10);

        return view('peminjaman.index', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_pinjam' => ['required', 'string', 'max:255', 'unique:peminjamans,kode_pinjam'],
            'buku_id' => ['required', 'exists:bukus,id'],
            'nim_peminjam' => ['required', 'string', 'max:20'],
            'nama_peminjam' => ['required', 'string', 'max:150'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_jatuh_tempo' => [
                'required',
                'date',
                'after_or_equal:tanggal_pinjam',
            ],
        ]);

        DB::transaction(function () use ($validated) {
            $buku = Buku::whereKey($validated['buku_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($buku->stok <= 0) {
                throw ValidationException::withMessages([
                    'buku_id' => 'Stok buku habis. Peminjaman tidak dapat dilakukan.',
                ]);
            }

            $peminjamanAktif = Peminjaman::where(
                'nim_peminjam',
                $validated['nim_peminjam']
            )
                ->where('buku_id', $buku->id)
                ->where('status', 'dipinjam')
                ->exists();

            if ($peminjamanAktif) {
                throw ValidationException::withMessages([
                    'nim_peminjam' => 'NIM ini masih memiliki peminjaman aktif untuk buku tersebut.',
                ]);
            }

            $buku->decrement('stok');

            Peminjaman::create($validated + [
                'status' => 'dipinjam',
            ]);
        });

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil dicatat.');
    }
}
