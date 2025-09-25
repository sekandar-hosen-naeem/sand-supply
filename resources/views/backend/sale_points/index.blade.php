@extends('backend.layouts.app')
@section('pageTitle', 'Sale Points')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Sale Points</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('sale-points.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>GPS Coordinates</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $point)
                    <tr>
                        <td>{{ $point->id }}</td>
                        <td>{{ $point->name }}</td>
                        <td>{{ $point->location }}</td>
                        <td>{{ $point->gps_coordinates }}</td>
                        <td>
                            <a href="{{ route('sale-points.edit',$point->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sale-points.destroy',$point->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
