<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Skill</title>
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
            transform: rotate(1deg);
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

        .btn-danger:hover {
            transform: rotate(-5deg);
        }
    </style>
</head>
<body>

<h3>Data Skill</h3>
<a href="/konten" class="btn btn-primary">Back</a>
<a href="{{ route('skill.create') }}" class="btn btn-primary">Create</a>
<table class="table mt-3">
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
                <a href="{{ route('skill.show', $row) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('skill.edit', $row) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('skill.destroy', $row) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                {{-- <a href="{{ route('skill.destroy', $row) }}" class="btn btn-danger btn-sm">Delete</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
