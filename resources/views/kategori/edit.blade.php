<x-layout>
    <div class="card">
        <h1>Edit Kategori</h1>
        <p>Perbarui informasi kategori buku.</p>

        <form action="{{ route('kategori.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_kategori">Kode Kategori</label>
                <input
                    type="text"
                    id="kode_kategori"
                    name="kode_kategori"
                    value="{{ old('kode_kategori', $kategori->kode_kategori) }}"
                    maxlength="20"
                    required
                >
                @error('kode_kategori')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    maxlength="100"
                    required
                >
                @error('nama_kategori')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                >{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn">
                Simpan Perubahan
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </form>
    </div>
</x-layout>
