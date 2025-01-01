<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <style>
        /* Gaya umum untuk form */
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Gaya untuk header */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Gaya untuk label */
        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #4a4a4a;
            margin-bottom: 8px;
            display: block;
        }

        /* Gaya untuk input dan textarea */
        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        /* Gaya untuk tombol */
        .btn-primary {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Gaya untuk pesan error */
        .text-error {
            color: #dc3545;
            font-size: 12px;
            font-style: italic;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .space-x-4 > * {
            margin-right: 16px;
        }

        .space-x-4 > *:last-child {
            margin-right: 0;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            .btn-primary, .btn-secondary {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Package</h1>
        <form action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label" for="name">Name</label>
                <input class="form-input @error('name') border-red-500 @enderror" id="name" type="text" name="name" value="{{ old('name', $package->name) }}" required>
                @error('name')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-textarea @error('description') border-red-500 @enderror" id="description" name="description" rows="3" required>{{ old('description', $package->description) }}</textarea>
                @error('description')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="base_price">Base Price</label>
                <input class="form-input @error('base_price') border-red-500 @enderror" id="base_price" type="number" name="base_price" value="{{ old('base_price', $package->base_price) }}" required>
                @error('base_price')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="max_guest">Max Guest</label>
                <input class="form-input @error('max_guest') border-red-500 @enderror" id="max_guest" type="number" name="max_guest" value="{{ old('max_guest', $package->max_guest) }}" required>
                @error('max_guest')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="category">Category</label>
                <select class="form-select @error('category') border-red-500 @enderror" id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="wedding" {{ old('category', $package->category) == 'wedding' ? 'selected' : '' }}>Wedding</option>
                    <option value="gathering" {{ old('category', $package->category) == 'gathering' ? 'selected' : '' }}>Gathering</option>
                    <option value="birthday" {{ old('category', $package->category) == 'birthday' ? 'selected' : '' }}>Birthday</option>
                </select>
                @error('category')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="duration_hours">Duration Hours</label>
                <input class="form-input @error('duration_hours') border-red-500 @enderror" id="duration_hours" type="number" name="duration_hours" value="{{ old('duration_hours', $package->duration_hours) }}" required>
                @error('duration_hours')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between space-x-4">
                <button class="btn-primary" type="submit">Update Package</button>
                <a href="{{ route('packages.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
