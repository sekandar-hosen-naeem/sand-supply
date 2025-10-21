@extends('backend.layouts.app')
@section('pageTitle', 'Sand Sales - Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Sale</div>

                    <div class="card-body">
                        <form action="{{ route('sand_sales.store') }}" method="POST">
                            @csrf

                            <label>Sale Date:</label>
                            <input type="date" name="sale_date" required><br>

                            <label>Buyer:</label>
                            <select class="form-control" name="buyer_id" required>
                                @foreach($buyers as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select><br>

                            <label>Sand Type:</label>
                            <select class="form-control" name="sand_type_id" required>
                                @foreach($sand_types as $s)
                                    <option data-price="{{ $s->price_per_cft ?? 0 }}" value="{{ $s->id }}">
                                        {{ $s->sand_name }}
                                    </option>
                                @endforeach
                            </select><br>

                            <label>Quantity (CFT):</label>
                            <input class="form-control" onkeyup="calculatePrice(this.value)" type="number"
                                name="quantity_cft" step="0.01" required><br>

                            <label>Rate per CFT:</label>
                            <input class="form-control" type="number" name="rate_per_cft" step="0.01" required>
                            <label>Total Price:</label>
                            <input class="form-control" type="number" name="total_amount" step="0.01" required><br>

                            <label>Payment Status:</label>
                            <select class="form-control" name="payment_status" required>
                                <option value="pending">Pending</option>
                                <option value="partial">Partial</option>
                                <option value="paid">Paid</option>
                            </select><br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function calculatePrice(quantity) {
            const sandTypeSelect = document.querySelector('select[name="sand_type_id"]');
            const selectedOption = sandTypeSelect.options[sandTypeSelect.selectedIndex];
            const pricePerCft = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const rateInput = document.querySelector('input[name="rate_per_cft"]');
            rateInput.value = pricePerCft.toFixed(2);
            const totalInput = document.querySelector('input[name="total_amount"]');
            totalInput.value = (pricePerCft * quantity).toFixed(2);
        }

        document.querySelector('select[name="sand_type_id"]').addEventListener('change', function () {
            const quantityInput = document.querySelector('input[name="quantity_cft"]');
            calculatePrice(quantityInput.value);
        });
    </script>
@endpush