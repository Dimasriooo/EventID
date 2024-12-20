@extends('layouts.index')


@section('header')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection

@section('content')
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>packages_id</th>
            </thead>
            <tbody>
                @foreach ($feature as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->packages_id }}</td> 
                    </tr>
                @endforeach
            </tbody>
@endsection