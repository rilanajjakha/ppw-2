<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
           rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>    
            </thead>
            <tbody>
                @foreach($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td>Aksi</td>
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
</body>
</html>