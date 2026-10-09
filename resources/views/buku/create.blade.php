<x-layout>
    <div class="card">
        <h1>Tambah Buku</h1>
        <p>Isi formulir berikut untuk menambahkan koleksi buku baru.</p>

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input
                    type="text"
                    id="isbn"
                    name="isbn"
                    value="{{ old('isbn') }}"
                    maxlength="20"
                    required
                >
                @error('isbn')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    maxlength="200"
                    required
                >
                @error('judul')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input
                    type="text"
                    id="penulis"
                    name="penulis"
                    value="{{ old('penulis') }}"
                    maxlength="150"
                    required
                >
                @error('penulis')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input
                    type="text"
                    id="penerbit"
                    name="penerbit"
                    value="{{ old('penerbit') }}"
                    maxlength="150"
                    required
                >
                @error('penerbit')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input
                    type="number"
                    id="tahun_terbit"
                    name="tahun_terbit"
                    value="{{ old('tahun_terbit') }}"
                    min="1900"
                    max="{{ date('Y') }}"
                    required
                >
                @error('tahun_terbit')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="stok">Stok Buku</label>
                <input
                    type="number"
                    id="stok"
                    name="stok"
                    value="{{ old('stok', 0) }}"
                    min="0"
                    required
                >
                @error('stok')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select id="kategori_id" name="kategori_id" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($kategori as $item)
                        <option
                            value="{{ $item->id }}"
                            {{ old('kategori_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <textarea
                    id="sinopsis"
                    name="sinopsis"
                >{{ old('sinopsis') }}</textarea>
                @error('sinopsis')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn">
                Simpan Buku
            </button>

            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</x-layout>
