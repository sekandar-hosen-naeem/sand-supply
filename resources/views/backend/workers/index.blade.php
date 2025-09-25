@extends('backend.layouts.app')
@section('pageTitle', 'Workers')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Workers</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('workers.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Daily Wage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $worker)
                    <tr>
                        <td>{{ $worker->id }}</td>
                        <td>{{ $worker->name }}</td>
                        <td>{{ $worker->phone }}</td>
                        <td>{{ $worker->role }}</td>
                        <td>{{ $worker->daily_wage }}</td>
                        <td>{{ $worker->status }}</td>
                        <td>
                            <a href="{{ route('workers.edit',$worker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('workers.destroy',$worker->id) }}" method="POST" style="display:inline-block;">
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
