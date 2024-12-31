@extends('layouts.index')

@section('header')
    <h1 class="mt-4">Tambah Package</h1>
@endsection

@section('content')
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

        /* Gaya untuk tombol */
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

        /* Gaya untuk pesan error */
        .text-error {
            color: #dc3545;
            font-size: 12px;
            font-style: italic;
        }
    </style>

    <div class="form-container">
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Package</label>
                <input type="text" class="form-input" id="name" name="name" required>
                @error('name')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-textarea" id="description" name="description" required></textarea>
                @error('description')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="base_price" class="form-label">Harga Dasar</label>
                <input type="number" class="form-input" id="base_price" name="base_price" required>
                @error('base_price')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="max_guest" class="form-label">Maksimal Tamu</label>
                <input type="number" class="form-input" id="max_guest" name="max_guest" required>
                @error('max_guest')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="gathering">Gathering</option>
                    <option value="wedding">Wedding</option>
                    <option value="birthday">Birthday</option>
                </select>
                @error('category')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duration_hours" class="form-label">Durasi (Jam)</label>
                <input type="number" class="form-input" id="duration_hours" name="duration_hours" required>
                @error('duration_hours')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="btn">Simpan</button>
                <a href="{{ route('packages.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
