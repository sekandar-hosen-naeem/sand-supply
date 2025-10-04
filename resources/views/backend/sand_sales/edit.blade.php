@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Sand Sale</h2>

    <form action="{{ route('sand_sales.update', $sandSale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="date" name="sale_date" class="form-control" value="{{ old('sale_date', $sandSale->sale_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="buyer_id" class="form-label">Buyer</label>
            <select name="buyer_id" class="form-select" required>
                <option value="">Select Buyer</option>
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ $sandSale->buyer_id == $buyer->id ? 'selected' : '' }}>
                        {{ $buyer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sand_type_id" class="form-label">Sand Type</label>
            <select name="sand_type_id" class="form-select" required>
                <option value="">Select Sand Type</option>
                @foreach($sandTypes as $sandType)
                    <option value="{{ $sandType->id }}" {{ $sandSale->sand_type_id == $sandType->id ? 'selected' : '' }}>
                        {{ $sandType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity_cft" class="form-label">Quantity (CFT)</label>
            <input type="number" step="0.01" name="quantity_cft" class="form-control" value="{{ old('quantity_cft', $sandSale->quantity_cft) }}" required>
        </div>

        <div class="mb-3">
            <label for="rate_per_cft" class="form-label">Rate Per CFT</label>
            <input type="number" step="0.01" name="rate_per_cft" class="form-control" value="{{ old('rate_per_cft', $sandSale->rate_per_cft) }}" required>
        </div>

        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" step="0.01" name="total_amount" class="form-control" value="{{ old('total_amount', $sandSale->total_amount) }}" required>
        </div>

        <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select name="payment_status" class="form-select" required>
                <option value="Paid" {{ $sandSale->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="Unpaid" {{ $sandSale->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="Partial" {{ $sandSale->payment_status == 'Partial' ? 'selected' : '' }}>Partial</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Sale</button>
        <a href="{{ route('sand_sales.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
