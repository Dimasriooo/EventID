@extends('layouts.index')

@section('header')
    <h1 class="mt-4">Edit Package Featured</h1>
@endsection

@section('content')
    <div class="card-body">
        <form action="{{ route('featured.update', $feature->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $feature->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="packages_id" class="form-label">Package ID</label>
                <select class="form-control" id="packages_id" name="packages_id" required>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ $feature->packages_id == $package->id ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('featured.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection