@extends('buku.form')

@section('content')
    <div class="container">
        <h4>Edit Buku</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')
            <div>Judul <input type="text" name="judul" value="{{ $buku->judul }}"></div>
            <div>Penulis <input type="text" name="penulis" value="{{ $buku->penulis }}"></div>
            <div>Harga <input type="text" name="harga" value="{{ $buku->harga }}"></div>
            <div>Tanggal Terbit <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}"></div>

            <div>Photo
                <input class="form-input @error('photo') is-invalid @enderror" 
                    type="file" id="photo" name="photo" value="{{ old('photo') }}">
                @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
            </div>

            <button type="submit">Simpan</button>
            <a href="{{ '/buku' }}">Kembali</a>
        </form>
    </div>
@endsection