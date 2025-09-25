@extends('backend.layouts.app')
@section('pageTitle', 'Buyers')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Buyers</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('buyers.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $buyer)
                    <tr>
                        <td>{{ $buyer->id }}</td>
                        <td>{{ $buyer->name }}</td>
                        <td>{{ $buyer->company_name }}</td>
                        <td>{{ $buyer->phone }}</td>
                        <td>{{ $buyer->address }}</td>
                        <td>
                            <a href="{{ route('buyers.edit',$buyer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buyers.destroy',$buyer->id) }}" method="POST" style="display:inline-block;">
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
