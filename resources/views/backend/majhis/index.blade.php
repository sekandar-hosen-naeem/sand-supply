@extends('backend.layouts.app')
@section('pageTitle', 'Majhis')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Majhis</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('majhis.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Boat Name</th>
                        <th>Daily Wage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $majhi)
                    <tr>
                        <td>{{ $majhi->id }}</td>
                        <td>{{ $majhi->name }}</td>
                        <td>{{ $majhi->phone }}</td>
                        <td>{{ $majhi->boat_name }}</td>
                        <td>{{ $majhi->daily_wage }}</td>
                        <td>{{ $majhi->status }}</td>
                        <td>
                            <a href="{{ route('majhis.edit',$majhi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('majhis.destroy',$majhi->id) }}" method="POST" style="display:inline-block;">
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
