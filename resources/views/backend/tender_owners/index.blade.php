@extends('backend.layouts.app')
@section('pageTitle', 'Tender Owners')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Tender Owners</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('tender-owners.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tender</th>
                        <th>Owner Name</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $owner)
                    <tr>
                        <td>{{ $owner->id }}</td>
                        <td>{{ $owner->tender->tender_no ?? 'N/A' }}</td>
                        <td>{{ $owner->owner_name }}</td>
                        <td>{{ $owner->company_name }}</td>
                        <td>{{ $owner->phone }}</td>
                        <td>{{ $owner->address }}</td>
                        <td>
                            <a href="{{ route('tender-owners.edit',$owner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tender-owners.destroy',$owner->id) }}" method="POST" style="display:inline-block;">
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
