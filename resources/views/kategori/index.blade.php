<x-layout>
    <div class="card">
        <h1>Daftar Kategori</h1>
        <p>Kelola kategori koleksi buku perpustakaan kampus.</p>

        <a href="{{ route('kategori.create') }}" class="btn">
            + Tambah Kategori
        </a>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <td>{{ $kategori->firstItem() + $loop->index }}</td>
                            <td>{{ $item->kode_kategori }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi ?: '-' }}</td>
                            <td>{{ $item->buku_count }}</td>
                            <td>
                                <div class="actions">
                                    <a
                                        href="{{ route('kategori.show', $item) }}"
                                        class="btn"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('kategori.edit', $item) }}"
                                        class="btn btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('kategori.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada kategori yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $kategori->links() }}
        </div>
    </div>
</x-layout>
