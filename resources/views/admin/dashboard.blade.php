<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 2rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            color: #343a40;
        }

        .table-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Dashboard Admin</h1>

        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <form action="{{ route('admin.filter') }}" method="POST"
                    class="row gy-2 gx-3 align-items-center flex-nowrap">
                    @csrf
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control"
                            value="{{ $startDate ?? '' }}" placeholder="Tanggal Mulai">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end_date" class="form-control"
                            value="{{ $endDate ?? '' }}" placeholder="Tanggal Selesai">
                    </div>
                    <div class="col-12 col-md-auto d-flex align-items-center mt-2 mt-md-0">
                        <button type="submit" class="btn btn-primary me-2 px-3"><i class="bi bi-funnel"></i>
                            Filter</button>
                        <a href="{{ route('admin.export.pdf', ['start_date' => $startDate ?? '', 'end_date' => $endDate ?? '']) }}"
                            class="btn btn-danger px-3"><i class="bi bi-file-earmark-pdf"></i> Ekspor PDF</a>
                    </div>
                </form>
                <div class="mt-3 mt-md-0"> 
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary"><i class="bi bi-box-arrow-right"></i>
                            Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table id="tabel-guest" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guests as $guest)
                    <tr>
                        <td>{{ $guest->id }}</td>
                        <td>{{ $guest->nama }}</td>
                        <td>{{ $guest->email }}</td>
                        <td>{{ $guest->telepon }}</td>
                        <td>{{ $guest->pesan }}</td>
                        <td>{{ $guest->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $guest->id) }}" class="btn btn-primary btn-sm"><i
                                    class="bi bi-pencil-square"></i> Edit</a>
                            <form action="{{ route('admin.destroy', $guest->id) }}" method="POST"
                                style="display:inline-block" id="deleteForm-{{ $guest->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $guest->id }})"><i class="bi bi-trash"></i>
                                    Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#tabel-guest');

        function confirmDelete(guestId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data tamu akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + guestId).submit();
                }
            });
        }
    </script>
</body>

</html>
