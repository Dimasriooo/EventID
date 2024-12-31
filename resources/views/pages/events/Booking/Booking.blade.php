@extends('layouts.index')


@section('header')
    <h1 class="mt-4">Dashboard Booking</h1>
   
@endsection

@section('content')

<div class="card-body">
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
                </tr>
            @endforeach
        </tbody>
@endsection