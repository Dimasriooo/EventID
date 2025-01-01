@extends('layouts.index')

@section('content')
    <div class="card-body">
        <!-- Tambahkan tombol Create di atas tabel -->
        <div class="mb-3">
            <a href="{{ route('featured.create') }}" class="btn btn-primary">Tambah Fitured</a>
        </div>
        
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>packages_id</th>
                    <th>Actions</th>  <!-- Kolom baru -->
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
                            <a href="{{ route('featured.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('featured.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection