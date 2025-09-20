@extends('backend.layouts.app')
@section('pageTitle', 'River Points')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">River Points</div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('river-points.create') }}" class="btn btn-primary mb-3">Add New</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Point Name</th>
                                    <th>Location</th>
                                    <th>GPS Coordinates</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $point)
                                <tr>
                                    <td>{{ $point->id }}</td>
                                    <td>{{ $point->point_name }}</td>
                                    <td>{{ $point->location }}</td>
                                    <td>{{ $point->gps_coordinates }}</td>
                                    <td>{{ $point->description }}</td>
                                    <td>
                                        <a href="{{ route('river-points.edit', $point->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('river-points.destroy', $point->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
