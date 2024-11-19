<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Certificate</title>
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

        .card {
            border: 2px solid #007bff;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.5);
        }

        .btn {
            transition: transform 0.2s, background-color 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
            background-color: #17a2b8;
            color: white;
        }

        .form-control {
            border: 1px solid #007bff;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>

<h3>Edit Certificate</h3>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $certificate->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Issued By</label>
                    <input type="text" name="issued_by" class="form-control @error('issued_by') is-invalid @enderror" value="{{ old('issued_by', $certificate->issued_by) }}" required>
                    @error('issued_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Issued At</label>
                    <input type="date" name="issued_at" class="form-control @error('issued_at') is-invalid @enderror" value="{{ old('issued_at', $certificate->issued_at->format('Y-m-d')) }}" required>
                    @error('issued_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $certificate->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Current File</label>
                    <div>
                        <a href="{{ asset('storage/public/certificates/' . $certificate->file) }}" target="_blank" class="btn btn-info btn-sm">View Current PDF</a>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">New File (PDF Only, leave empty to keep current file)</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>