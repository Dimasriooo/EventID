@extends('layouts.index')


@section('header')
    <h1 class="mt-4">Dashboard Package</h1>
    <div class="mb-4">
        <a href="{{ route('packages.create') }}" class="btn btn-primary">Tambah Package</a>
</div>
@endsection


@section('content')
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="card-body">  
        <table id="datatablesSimple" class="table table-bordered">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 border-b text-left">no</th>
                    <th class="px-6 py-3 border-b text-left">Name</th>
                    <th class="px-6 py-3 border-b text-left">description</th>
                    <th class="px-6 py-3 border-b text-left">base_price</th>
                    <th class="px-6 py-3 border-b text-left">Max_guest</th>
                    <th class="px-6 py-3 border-b text-left">category</th>
                    <th class="px-6 py-3 border-b text-left">Duration_hours</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $package->id }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->name }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->description }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->base_price }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->max_guest }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->category }}</td>
                        <td class="px-6 py-4 border-b">{{ $package->duration_hours }}</td>
                        <td class="px-6 py-4 border-b">
                            <div class="flex space-x-2">
                                <a href="{{ route('packages.edit', $package->id) }}" 
                                    type="submit" class="btn btn-warning">
                                    Edit
                                </a>
                                <br>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus package ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody>
            @endsection
