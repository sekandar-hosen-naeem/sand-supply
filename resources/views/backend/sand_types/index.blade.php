@extends('backend.layouts.app')
@section('pageTitle', 'Sand Types')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Sand Types</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('sand-types.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sand Name</th>
                        <th>Quality Grade</th>
                        <th>Price per CFT</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $sandType)
                    <tr>
                        <td>{{ $sandType->id }}</td>
                        <td>{{ $sandType->sand_name }}</td>
                        <td>{{ $sandType->quality_grade }}</td>
                        <td>{{ $sandType->price_per_cft }}</td>
                        <td>
                            <a href="{{ route('sand-types.edit',$sandType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sand-types.destroy',$sandType->id) }}" method="POST" style="display:inline-block;">
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
