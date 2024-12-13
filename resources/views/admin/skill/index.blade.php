<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Data Skill</title>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1000px;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .table {
            --bs-table-bg: #ffffff;
            --bs-table-color: #212529;
            --bs-table-hover-bg: #f5f8fa;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
        }

        .table thead th {
            vertical-align: middle;
            border-bottom: 2px solid #0a58ca;
        }

        .btn {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {

            .btn-group,
            .btn-group-vertical {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                margin-bottom: 0.25rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center mb-4">Data Skill</h3>
        <div class="mb-3">
            <a href="/konten" class="btn btn-primary">Back</a>
            <a href="{{ route('admin.skill.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill as $row)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.skill.show', $row) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('admin.skill.edit', $row) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.skill.destroy', $row) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="hapus(this)"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('added'))
            Swal.fire({
                title: 'Success',
                text: 'Successfully added new data!',
                icon: 'success'
            });
        @endif

        @if (session('edited'))
            Swal.fire({
                title: 'Success',
                text: 'Successfully edited data!',
                icon: 'success'
            });
        @endif

        function hapus(button) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This data will be permanently deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }

        @if (session('deleted'))
            Swal.fire({
                title: 'Success',
                text: 'Successfully deleted data!',
                icon: 'success'
            });
        @endif

        let table = new DataTable('#myTable', {
            responsive: true
        });
    </script>
</body>

</html>
