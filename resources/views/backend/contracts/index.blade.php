@extends('backend.layouts.app')
@section('pageTitle', 'Contracts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Contract List</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Add New Contract</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tender Owner</th>
                        <th>Buyer</th>
                        <th>Supplier</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->tenderOwner?->name ?? '-' }}</td>
                        <td>{{ $contract->buyer?->name ?? '-' }}</td>
                        <td>{{ $contract->supplier?->name ?? '-' }}</td>
                        <td>{{ $contract->start_date }}</td>
                        <td>{{ $contract->end_date ?? '-' }}</td>
                        <td>{{ number_format($contract->contract_value,2) }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>
                            <a href="{{ route('contracts.edit',$contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contracts.destroy',$contract->id) }}" method="POST" style="display:inline-block;">
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
