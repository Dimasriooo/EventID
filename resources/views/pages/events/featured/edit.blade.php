<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package Featured</title>
    <style>
        /* Gaya untuk form */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #4a4a4a;
            margin-bottom: 8px;
            display: block;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h1 class="mt-4">Edit Package Featured</h1>
    <div class="form-container">
        <form action="{{ route('featured.update', $feature->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-input" id="name" name="name" value="{{ $feature->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-textarea" id="description" name="description" required>{{ $feature->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="packages_id" class="form-label">Package ID</label>
                <select class="form-select" id="packages_id" name="packages_id" required>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ $feature->packages_id == $package->id ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">Update</button>
            <a href="{{ route('featured.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
