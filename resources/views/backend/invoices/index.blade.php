@extends('backend.layouts.app')
@section('pageTitle', 'Invoices')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Invoices</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Add New Invoice</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Buyer</th>
                        <th>Sand Type</th>
                        <th>Qty (CFT)</th>
                        <th>Rate</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>{{ $invoice->buyer?->name ?? '-' }}</td>
                        <td>{{ $invoice->sandType?->name ?? '-' }}</td>
                        <td>{{ $invoice->quantity_cft }}</td>
                        <td>{{ number_format($invoice->rate_per_cft,2) }}</td>
                        <td>{{ number_format($invoice->total_amount,2) }}</td>
                        <td>{{ $invoice->payment_status }}</td>
                        <td>
                            <a href="{{ route('invoices.edit',$invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST" style="display:inline-block;">
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
