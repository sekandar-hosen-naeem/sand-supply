@extends('layouts.app')

@section('content')
<h2>Sand Sales</h2>

<a href="{{ route('sand_sales.create') }}">+ Add New Sale</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Buyer</th>
            <th>Sand Type</th>
            <th>Qty (CFT)</th>
            <th>Rate</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sand_sales as $sale)
        <tr>
            <td>{{ $sale->id }}</td>
            <td>{{ $sale->sale_date->format('Y-m-d') }}</td>
            <td>{{ $sale->buyer?->name }}</td>
            <td>{{ $sale->sandType?->name }}</td>
            <td>{{ $sale->quantity_cft }}</td>
            <td>{{ $sale->rate_per_cft }}</td>
            <td>{{ $sale->total_amount }}</td>
            <td>{{ ucfirst($sale->payment_status) }}</td>
            <td>
                <a href="{{ route('sand_sales.show', $sale) }}">View</a> |
                <a href="{{ route('sand_sales.edit', $sale) }}">Edit</a> |
                <form action="{{ route('sand_sales.destroy', $sale) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this sale?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $sand_sales->links() }}
@endsection
