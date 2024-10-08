<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>

    <link rel="shortcut icon" href="{{ asset('assets/icon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        label {
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #80bdff;
        }

        textarea.form-control {
            height: 150px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit Data Tamu</h1>
        <form action="{{ route('admin.update', $guest->id) }}" method="POST" id="#form-edit">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $guest->nama }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" value="{{ $guest->email }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon:</label>
                <input type="text" id="telepon" name="telepon" value="{{ $guest->telepon }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan:</label>
                <textarea id="pesan" name="pesan" class="form-control">{{ $guest->pesan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>