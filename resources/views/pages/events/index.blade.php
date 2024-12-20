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
                    <th>base_price</th>
                    <th>Max_guest</th>
                    <th>category</th>
                    <th>Duration_hours</th>
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
                    </tr>
                @endforeach
            </tbody>
            <tbody>
            @endsection
