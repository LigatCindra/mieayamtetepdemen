<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <div class="buttoncontainer ms-3 mt-3 mb-3 me-3">
        <form action="/logout" method="post" class="m-6">
             @csrf
             <button type="submit" class="btn btn-primary ">Logout</button>
        </form>
 </div>
 <title>Create Makanan</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <style>
    body {
      background-color: #FFA07A;
    }
    .card {
      margin-top: 100px;
    }
 </style>
</head>
<body>
 <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Makanan</h5>
            <form method="POST" action="{{ route('makanan.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama_makanan">Nama Makanan:</label>
                <input type="text" name="nama_makanan" class="form-control" required>
                <label for="id_kategori">Kategori Makanan:</label>
                <select name="id_kategori" class="form-control">
                 @foreach ($categories as $category)
                    <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                 @endforeach
                </select>
                <label for="deskripsi">Deskripsi Makanan:</label>
                <input type="text" name="deskripsi" class="form-control" required>
                <label for="harga">Harga Makanan:</label>
                <input type="number" name="harga" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="url_gambar">Gambar Makanan:</label>
                <input type="file" name="url_gambar" accept="image/png, image/jpeg" class="form-control-file mt-3">
              </div>
              <button type="submit" class="btn btn-primary">Create Makanan</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="container mt-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nama Makanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($makanans as $makanan)
                <tr>
                 <td>{{ $makanan->nama_makanan }}</td>
                 <td>{{ $makanan->harga }}</td>
                 <td>{{ $makanan->kategori->nama_kategori }}</td>
                 <td>{{ $makanan->deskripsi }}</td>
                 <td><img src="{{ asset('storage/images/' . $makanan->url_gambar) }}" alt="{{ $makanan->nama_makanan }}" width="50px"></td>
                 <td>
                    <form method="POST" action="{{ route('makanan.destroy', $makanan->id_makanan) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                 </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>
</body>
</html>