@extends('buku.form')

@section('content')
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" enctype="multipart/form-data" action="{{ route('buku.store') }}">
            @csrf
            <div>Judul <input class="form-input" type="text" name="judul"></div>
            <div>Penulis <input class="form-input" type="text" name="penulis"></div>
            <div>Harga <input class="form-input" type="text" name="harga"></div>
            <div>Tanggal Terbit <input class="form-input" type="date" name="tgl_terbit"></div>

            <div>Photo
                <input class="form-input @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" value="{{ old('photo') }}">
                @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
            </div>

            <button type="submit">Simpan</button>
            <a href="{{ '/buku' }}">Kembali</a>
        </form>
    </div>
@endsection

