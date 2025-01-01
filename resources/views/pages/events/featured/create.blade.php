@extends('layouts.index')

@section('header')
    <h1 class="mt-4 text-center">Tambah Package Featured</h1>
@endsection

@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .card {
        margin: 0 auto;
        max-width: 600px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        font-size: 1.2em;
        font-weight: bold;
        text-align: center;
    }

    .form-label {
        font-weight: bold;
        color: #333;
    }

    .form-control, .form-select {
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        border-radius: 5px;
    }

    .btn-secondary:hover {
        background-color: #545b62;
    }

    .invalid-feedback {
        font-size: 0.85em;
        color: red;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            Form Tambah Package Featured
        </div>
        <div class="card-body">
            <form action="{{ route('featured.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                        id="name" name="name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                        id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="packages_id" class="form-label">Package ID</label>
                    <select class="form-select @error('packages_id') is-invalid @enderror" 
                        id="packages_id" name="packages_id" required>
                        <option value="">Pilih Package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" 
                                {{ old('packages_id') == $package->id ? 'selected' : '' }}>
                                {{ $package->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('packages_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('featured.index') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
