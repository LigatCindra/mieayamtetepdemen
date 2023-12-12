<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <div class="buttoncontainer ms-3 mt-3 mb-3 me-3">
                <form action="/logout" method="post" class="m-6">
                    @csrf
                    <button type="submit" class="btn btn-primary ">Logout</button>
                </form>
            </div>
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="path/to/admin.css">
  <style>
    body {
      background-color: #FFDAB9;
    }
    .buttoncontainer {
      margin: 1rem;
    }
  </style>
</head>
<body class="antialiased">
  <div class="container-fluid">
    <div class="row min-vh-100 bg-light">
      <div class="col-sm-12 col-md-6">
        <div class="container mt-3">
          <h1 class="font-weight-bold">Create Makanan</h1>
          <form method="POST" action="{{ route('makanan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama_makanan">Nama Makanan:</label>
              <input type="text" name="nama_makanan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Makanan</button>
          </form>
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
              @foreach ($makanan as $row)
                <tr>
                  <td>{{ $row->nama_makanan }}</td>
                  <td>{{ $row->harga }}</td>
                  <td>{{ $row->kategori->nama_kategori }}</td>
                  <td>{{ $row->deskripsi }}</td>
                  <td><img style="height: 250px; width: 250px;" src="{{ asset('storage/' . $row->url_gambar) }}" /></td>
                  <td>
                    <!-- Edit Form -->
                    <form method="POST" action="{{ route('makanan.edit', $row->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <!-- ... Form Inputs ... -->
                      <button type="submit" class="btn btn-primary">Edit Makanan</button>
                    </form>
                    <!-- Delete Form -->
                    <form style="margin-left: 5px;" method="POST" action="{{ route('makanan.destroy', $row->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="delete" class="btn btn-danger">Delete Makanan</button>
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
