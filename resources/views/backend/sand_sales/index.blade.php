@extends('backend.layouts.app')
@section('pageTitle', 'Sand Sales')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sand Sales</div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('sand_sales.create') }}" class="btn btn-primary mb-3">Add New</a>
                        <table class="table table-bordered">
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
                                        <td>{{ $sale->sandType?->sand_name }}</td>
                                        <td>{{ $sale->quantity_cft }}</td>
                                        <td>{{ $sale->rate_per_cft }}</td>
                                        <td>{{ $sale->total_amount }}</td>
                                        <td>{{ ucfirst($sale->payment_status) }}</td>
                                        <td>
                                            <a href="{{ route('vehicle-trips.create') }}?sales_id={{ $sale->id }}">Delivery</a>
                                            |
                                            <a href="{{ route('sand_sales.show', $sale) }}">View</a> |
                                            <a href="{{ route('sand_sales.edit', $sale) }}">Edit</a> |
                                            <form action="{{ route('sand_sales.destroy', $sale) }}" method="POST"
                                                style="display:inline">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Delete this sale?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sand_sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection