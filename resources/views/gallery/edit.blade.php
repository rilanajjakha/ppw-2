@extends('auth.layouts')

@section('content')
    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" 
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 row">
            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="title" name="title" 
                    value="{{ old('title', $gallery->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end text-start">
                Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" rows="5" name="description">
                    {{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">
                File input</label>
            <div class="col-md-6">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="input-file" name="picture">
                        <label class="custom-file-label" for="input-file">Choose file</label>
                    </div>
                </div>
                @if($gallery->picture)
                    <div class="mt-2">
                        <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" 
                            alt="Current Image" class="img-thumbnail" width="150">
                    </div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        
    </form>
@endsection