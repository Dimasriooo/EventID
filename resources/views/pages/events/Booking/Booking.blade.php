@extends('layouts.index')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Booking</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>Data Booking</div>
                <a href="{{ route('booking.create') }}" class="btn btn-primary">Tambah Booking</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event Date</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Additional Notes</th>
                        <th>Packages ID</th>
                        <th>User ID</th>
                        <th>Actions</th>
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
                            <td>{{ $item->packages_id }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('booking.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('booking.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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