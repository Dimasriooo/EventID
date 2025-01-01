@extends('layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Users</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>Data Users</div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this user?')">
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