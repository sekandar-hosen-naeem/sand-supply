@extends('backend.layouts.app')
@section('pageTitle', 'Equipment Usage Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Equipment Usages</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('equipment-usages.create') }}" class="btn btn-primary mb-3">Add New Usage</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipment</th>
                        <th>Operator</th>
                        <th>River Point</th>
                        <th>Date</th>
                        <th>Hours Used</th>
                        <th>Fuel Used (L)</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $usage)
                    <tr>
                        <td>{{ $usage->id }}</td>
                        <td>{{ $usage->equipment?->name ?? '-' }}</td>
                        <td>{{ $usage->operator?->name ?? '-' }}</td>
                        <td>{{ $usage->riverPoint?->point_name ?? '-' }}</td>
                        <td>{{ $usage->usage_date }}</td>
                        <td>{{ $usage->hours_used }}</td>
                        <td>{{ $usage->fuel_used_liters }}</td>
                        <td>{{ number_format($usage->cost,2) }}</td>
                        <td>
                            <a href="{{ route('equipment-usages.edit',$usage->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('equipment-usages.destroy',$usage->id) }}" method="POST" style="display:inline-block;">
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
