@extends('layouts.index')


@section('header')
    <h1 class="mt-4">Dashboard Booking</h1>
   
@endsection

@section('content')

<div class="card-body">
    <div class="mb-3">
        <a href="{{ route('booking.create') }}" class="btn btn-primary">Tambah Booking</a>
    </div>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>no</th>
                <th>event_date</th>
                <th>status</th>
                <th>total_price</th>
                <th>additional_notes</th>
                <th>packages_id</th>
                <th>user_id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($booking as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->event_date }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>{{ $item->additional_notes }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->packages_id }}</td>
                    <td>
                        <a href="{{ route('booking.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('booking.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
@endsection