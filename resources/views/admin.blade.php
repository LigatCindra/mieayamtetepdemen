<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @if ($logo)
    <link rel="icon" href="{{ asset($logo->url) }}" type="image/ico">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="buttoncontainer ms-3 mt-3 mb-3 me-3">
        <form action="/logout" method="post" class="m-6">
            @csrf
            <button type="submit" class="btn btn-primary ">Logout</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/admin.css">
    <style>
        body {
            background-color: #FFDAB9;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .buttoncontainer {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn-primary {
            margin-top: 10px;
        }

        .table {
            margin-top: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .col-sm-12 {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body class="antialiased">
    <style>
        body {
            background-color: rgb(220, 220, 220);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .container-fluid {
            background-color: #f1c27b;
;
            padding: 50px;
            border-radius: 100px;
        }
    </style>
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
                            <input type="file" name="url_gambar" accept="image/png, image/jpeg"
                                class="form-control-file mt-3">
                            <button type="submit" class="btn btn-primary mt-3">Create Makanan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="container mt-3">
                    <div class="table-responsive-md">
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
                                        <td><img class="img-fluid" src="{{ asset('storage/' . $row->url_gambar) }}"
                                                alt="{{ $row->nama_makanan }}"></td>
                                        <td>
                                            <form method="POST" action="{{ route('makanan.edit', $row->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nama_makanan">Nama Makanan:</label>
                                                    <input type="text" name="nama_makanan"
                                                        value="{{ $row->nama_makanan }}" class="form-control" required>
                                                    <label for="id_kategori">Kategori Makanan:</label>
                                                    <select name="id_kategori" class="form-control">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id_kategori }}">
                                                                {{ $category->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="deskripsi">Deskripsi Makanan:</label>
                                                    <input type="text" name="deskripsi"
                                                        value="{{ $row->deskripsi }}" class="form-control" required>
                                                    <label for="harga">Harga Makanan:</label>
                                                    <input type="number" name="harga" value="{{ $row->harga }}"
                                                        class="form-control" required>
                                                    <input type="file" name="url_gambar"
                                                        accept="image/png, image/jpeg" class="form-control-file mt-3">
                                                    <button type="submit" class="btn btn-primary mt-3">Edit
                                                        Makanan</button>
                                                </div>
                                            </form>
                                            <form style="margin-left:5px;" method="POST"
                                                action="{{ route('makanan.destroy', $row->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="delete" class="btn btn-danger mt-3">Delete
                                                    Makanan</button>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
