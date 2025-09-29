@extends('backend.layouts.app')
@section('pageTitle', 'Suppliers')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Suppliers</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Add New Supplier</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->status }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit',$supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST" style="display:inline-block;">
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
