@extends('backend.layouts.app')
@section('pageTitle', 'Revenues')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Revenues</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('revenues.create') }}" class="btn btn-primary mb-3">Add New Revenue</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $revenue)
                    <tr>
                        <td>{{ $revenue->id }}</td>
                        <td>{{ $revenue->title }}</td>
                        <td>{{ number_format($revenue->amount,2) }}</td>
                        <td>{{ $revenue->category }}</td>
                        <td>{{ $revenue->revenue_date }}</td>
                        <td>{{ $revenue->description }}</td>
                        <td>
                            <a href="{{ route('revenues.edit',$revenue->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('revenues.destroy',$revenue->id) }}" method="POST" style="display:inline-block;">
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
