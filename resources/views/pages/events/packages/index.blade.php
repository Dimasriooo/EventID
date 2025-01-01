@extends('layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Package</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>Data Package</div>
                <a href="{{ route('packages.create') }}" class="btn btn-primary">Tambah Package</a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success mx-4 mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Base Price</th>
                        <th>Max Guest</th>
                        <th>Category</th>
                        <th>Duration Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->base_price }}</td>
                            <td>{{ $package->max_guest }}</td>
                            <td>{{ $package->category }}</td>
                            <td>{{ $package->duration_hours }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus package ini?')">
                                            Hapus
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

.alert {
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .container-fluid {
        padding-right: 0.75rem;
        padding-left: 0.75rem;
    }
}
</style>
@endsection