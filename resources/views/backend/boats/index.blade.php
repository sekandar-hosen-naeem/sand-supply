@extends('backend.layouts.app')
@section('pageTitle', 'Boats')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Boats</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('boats.create') }}" class="btn btn-primary mb-3">Add New Boat</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Registration No</th>
                        <th>Capacity (CFT)</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $boat)
                    <tr>
                        <td>{{ $boat->id }}</td>
                        <td>{{ $boat->name }}</td>
                        <td>{{ $boat->registration_no }}</td>
                        <td>{{ $boat->capacity_cft }}</td>
                        <td>{{ $boat->status }}</td>
                        <td>
                            <a href="{{ route('boats.edit',$boat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('boats.destroy',$boat->id) }}" method="POST" style="display:inline-block;">
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
