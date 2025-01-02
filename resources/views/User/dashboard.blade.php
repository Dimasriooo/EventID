@extends('layouts.index')

@section('content')
<div class="container">
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="{{ route('user.bookings') }}">Bookings</a></li>
                <li><a href="{{ route('user.packages') }}">Packages</a></li>
            </ul>
        </nav>
    </div>
    <!-- Add main content -->
</div>
@endsection