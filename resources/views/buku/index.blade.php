<x-layout>
    <div class="card">
        <h1>Daftar Buku</h1>
        <p>Kelola koleksi buku perpustakaan kampus melalui halaman ini.</p>

        <a href="{{ route('buku.create') }}" class="btn">
            + Tambah Buku
        </a>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ISBN</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($buku as $item)
                        <tr>
                            <td>
                                {{ $buku->firstItem() + $loop->index }}
                            </td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>
                                {{ $item->kategori?->nama_kategori ?? 'Tanpa kategori' }}
                            </td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <div class="actions">
                                    <a
                                        href="{{ route('buku.show', $item) }}"
                                        class="btn"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('buku.edit', $item) }}"
                                        class="btn btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('buku.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada data buku.
                                Silakan tambahkan buku terlebih dahulu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $buku->links() }}
        </div>
    </div>
</x-layout>
