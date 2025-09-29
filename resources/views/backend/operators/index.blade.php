@extends('backend.layouts.app')
@section('pageTitle', 'Operators')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Operators</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('operators.create') }}" class="btn btn-primary mb-3">Add New Operator</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $operator)
                    <tr>
                        <td>{{ $operator->id }}</td>
                        <td>{{ $operator->name }}</td>
                        <td>{{ $operator->phone }}</td>
                        <td>{{ $operator->address }}</td>
                        <td>{{ $operator->status }}</td>
                        <td>
                            <a href="{{ route('operators.edit',$operator->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('operators.destroy',$operator->id) }}" method="POST" style="display:inline-block;">
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
