@extends('backend.layouts.app')
@section('pageTitle', 'Equipments')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Equipments</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('equipments.create') }}" class="btn btn-primary mb-3">Add New Equipment</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Serial No</th>
                        <th>Purchase Date</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $equipment)
                    <tr>
                        <td>{{ $equipment->id }}</td>
                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->type }}</td>
                        <td>{{ $equipment->serial_no }}</td>
                        <td>{{ $equipment->purchase_date }}</td>
                        <td>{{ $equipment->purchase_cost }}</td>
                        <td>{{ $equipment->status }}</td>
                        <td>
                            <a href="{{ route('equipments.edit',$equipment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('equipments.destroy',$equipment->id) }}" method="POST" style="display:inline-block;">
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
