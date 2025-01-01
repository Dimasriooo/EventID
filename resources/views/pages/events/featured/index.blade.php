@extends('layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Featured</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>Data Featured</div>
                <a href="{{ route('featured.create') }}" class="btn btn-primary">Tambah Featured</a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Packages ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feature as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->packages_id }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('featured.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('featured.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.container-fluid {
    padding-right: 1.5rem;
    padding-left: 1.5rem;
    width: 100%;
}

.table {
    margin-bottom: 0;
}

#datatablesSimple {
    width: 100% !important;
}

.card {
    margin-right: 0;
    margin-left: 0;
}

.d-flex.gap-2 {
    gap: 0.5rem !important;
}

@media (max-width: 768px) {
    .container-fluid {
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
}
</style>
@endsection