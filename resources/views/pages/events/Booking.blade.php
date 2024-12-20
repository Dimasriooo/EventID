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

@endsection