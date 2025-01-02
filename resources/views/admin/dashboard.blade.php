@extends('layouts.index')

@section('content')
<div class="container">
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}">Users</a></li>
                <li><a href="{{ route('admin.bookings') }}">Bookings</a></li>
                <li><a href="{{ route('admin.packages') }}">Packages</a></li>
                <!-- Add other admin menu items -->
            </ul>
        </nav>
    </div>
    <!-- Add main content -->
</div>
@endsection