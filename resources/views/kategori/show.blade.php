<x-layout>
    <div class="card">
        <h1>Detail Kategori</h1>
        <p>Informasi kategori dan daftar buku di dalamnya.</p>

        <table>
            <tbody>
                <tr>
                    <th>Kode Kategori</th>
                    <td>{{ $kategori->kode_kategori }}</td>
                </tr>
                <tr>
                    <th>Nama Kategori</th>
                    <td>{{ $kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $kategori->deskripsi ?: 'Belum ada deskripsi.' }}</td>
                </tr>
            </tbody>
        </table>

        <h2 style="margin-top: 25px;">Daftar Buku</h2>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ISBN</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kategori->buku as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->isbn }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada buku dalam kategori ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="actions" style="margin-top: 20px;">
            <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-warning">
                Edit Kategori
            </a>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</x-layout>
