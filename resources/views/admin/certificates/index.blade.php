<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Certificate</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
            font-family: 'Arial', sans-serif;
            text-shadow: 1px 1px 2px #ccc;
        }

        .table {
            border: 2px solid #007bff;
            transition: transform 0.3s;
        }

        .table:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.5);
        }

        .table th {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }

        .table th:hover {
            background-color: #0056b3;
        }

        .table td {
            background-color: #e9ecef;
            transition: background-color 0.3s, transform 0.3s;
        }

        .table td:hover {
            background-color: #ffc107;
        }

        .btn {
            transition: transform 0.2s, background-color 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
            background-color: #17a2b8;
            color: white;
        }

        .btn-danger {
            transition: transform 0.2s;
        }
    </style>
</head>
<body>

<h3>Data Certificate</h3>
<div class="container mt-5">
    <a href="/konten" class="btn btn-primary">Back</a>
    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">Create</a>
    <table class="table mt-3" id="myTable">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Issued By</th>
                <th scope="col">Issued At</th>
                <th scope="col">Description</th>
                <th scope="col">File</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificates as $certificate)
            <tr>
                <td>{{ $certificate->name }}</td>
                <td>{{ $certificate->issued_by }}</td>
                <td>{{ $certificate->issued_at->format('d/m/Y') }}</td>
                <td>{{ $certificate->description }}</td>
                <!-- Dalam index.blade.php -->
                <td>
                    <a href="{{ asset('storage/public/certificates/' . $certificate->file) }}" target="_blank" class="btn btn-info btn-sm">View PDF</a>
                </td>
                <td>
                    <a href="{{ route('admin.certificates.edit', $certificate) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="hapus(this)" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    @if (session('success'))
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session("success") }}',
            icon: 'success'
        })
    @endif

    function hapus(button) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data akan benar benar terhapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed) {
                button.parentElement.submit();
            };
        });
    }
</script>

<script>
    let table = new DataTable('#myTable');
</script>
</body>
</html>