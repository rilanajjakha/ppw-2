@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif

                <a href="{{ route('buku.create') }}" class="btn btn-primary float-end mb-3">Tambah Buku</a>
                <h3 class="mt-4">Data Buku</h3>

                <table class="table table-striped table-hover table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul buku</th>
                            <th class="text-center">Penulis</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Tanggal Terbit</th>
                            <th class="text-center">Gambar</th> 
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data_buku as $index => $buku)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    @if($buku->photo)
                                        <img src="{{ asset('storage/' . $buku->photo) }}" 
                                        alt="Gambar Buku" width="200">
                                    @else
                                        <span>Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Buku</h5>
                                <p class="card-text">{{ $jumlah_buku }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Harga Buku</h5>
                                <p class="card-text">Rp. {{ number_format($total_harga, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection














{{-- @extends('auth.layouts')

@section('content')

<a href="{{ route('buku.index') }}">Lihat Buku</a>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection --}}