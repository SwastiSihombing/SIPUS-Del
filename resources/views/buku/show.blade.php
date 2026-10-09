<x-layout>
    <div class="card">
        <h1>Detail Buku</h1>
        <p>Informasi lengkap buku yang tersimpan dalam sistem.</p>

        <table>
            <tbody>
                <tr>
                    <th>ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>
                <tr>
                    <th>Judul Buku</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $buku->stok }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $buku->kategori?->nama_kategori ?? 'Tanpa kategori' }}</td>
                </tr>
                <tr>
                    <th>Sinopsis</th>
                    <td>{{ $buku->sinopsis ?: 'Belum ada sinopsis.' }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 20px;" class="actions">
            <a href="{{ route('buku.edit', $buku) }}" class="btn btn-warning">
                Edit Buku
            </a>

            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</x-layout>
