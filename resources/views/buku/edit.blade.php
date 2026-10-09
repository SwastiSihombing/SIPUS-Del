<x-layout>
    <div class="card">
        <h1>Edit Buku</h1>
        <p>Perbarui informasi buku yang sudah tersimpan.</p>

        <form action="{{ route('buku.update', $buku) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input
                    type="text"
                    id="isbn"
                    name="isbn"
                    value="{{ old('isbn', $buku->isbn) }}"
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
                    value="{{ old('judul', $buku->judul) }}"
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
                    value="{{ old('penulis', $buku->penulis) }}"
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
                    value="{{ old('penerbit', $buku->penerbit) }}"
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
                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
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
                    value="{{ old('stok', $buku->stok) }}"
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
                            {{ old('kategori_id', $buku->kategori_id) == $item->id ? 'selected' : '' }}
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
                <textarea id="sinopsis" name="sinopsis">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                @error('sinopsis')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn">
                Simpan Perubahan
            </button>

            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </form>
    </div>
</x-layout>
