@extends('layouts.app')

@section('content')
<h2>Add New Sand Sale</h2>

<form action="{{ route('sand_sales.store') }}" method="POST">
    @csrf

    <label>Sale Date:</label>
    <input type="date" name="sale_date" required><br>

    <label>Buyer:</label>
    <select name="buyer_id" required>
        @foreach($buyers as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select><br>

    <label>Sand Type:</label>
    <select name="sand_type_id" required>
        @foreach($sand_types as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select><br>

    <label>Quantity (CFT):</label>
    <input type="number" name="quantity_cft" step="0.01" required><br>

    <label>Rate per CFT:</label>
    <input type="number" name="rate_per_cft" step="0.01" required><br>

    <label>Payment Status:</label>
    <select name="payment_status" required>
        <option value="pending">Pending</option>
        <option value="partial">Partial</option>
        <option value="paid">Paid</option>
    </select><br>

    <button type="submit">Save</button>
</form>
@endsection
