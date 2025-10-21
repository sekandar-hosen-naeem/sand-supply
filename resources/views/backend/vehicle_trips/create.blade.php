@extends('backend.layouts.app')
@section('pageTitle', 'Add Vehicle Trip')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Add New Trip</div>
            <div class="card-body">
                <form method="POST" action="{{ route('vehicle-trips.store') }}">
                    @csrf
                    <input type="text" name="sale_point_id" value="{{ request()->get('sales_id') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Trip Date</label>
                                <input type="date" name="trip_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Distance (KM)</label>
                                <input type="number" step="0.01" name="distance_km" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Quantity (CFT)</label>
                                <input type="number" step="0.01" name="quantity" class="form-control" value="{{ $qty }}">
                            </div>
                        </div>
                    </div>
                    <div id="repeat">
                        <div class="row repeat-item">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Vehicle</label>
                                    <select name="vehicle_id[]" onchange="calculatePrice(this)" class="form-control"
                                        required>
                                        <option value="">Select Vehicle</option>
                                        @foreach($vehicles as $v)
                                            <option data-capacity="{{ $v->capacity_cft }}" data-price="{{ $v->price }}"
                                                value="{{ $v->id }}">
                                                {{ $v->vehicle_no }} {{ $v->capacity_cft }} CFT
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Transport Rate</label>
                                    <input type="text" name="transport_rate_id[]" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Total</label>
                                    <input type="text" name="total[]" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" onkeyup="checkCapacity(this)" name="quantity_cft[]"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks[]" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="button" id="addMore" class="btn btn-secondary mb-3">Add More</button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Cost</label>
                        <input type="number" step="0.01" name="total_cost" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('vehicle-trips.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function checkCapacity(inputElement) {
            const row = inputElement.closest('.repeat-item');
            const vehicleSelect = row.querySelector('select[name="vehicle_id[]"]');
            const selectedOption = vehicleSelect.options[vehicleSelect.selectedIndex];
            const capacity = parseFloat(selectedOption.getAttribute('data-capacity')) || 0;
            const enteredQuantity = parseFloat(inputElement.value) || 0;

            if (enteredQuantity > capacity) {
                alert('Entered quantity exceeds vehicle capacity of ' + capacity + ' CFT.');
                inputElement.value = '';
            }
        }
        function calculatePrice(selectElement) {
            const distance_km = parseFloat(document.querySelector('input[name="distance_km"]').value) || 0;
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const row = selectElement.closest('.repeat-item');
            const rateInput = row.querySelector('input[name="transport_rate_id[]"]');
            const totalInput = row.querySelector('input[name="total[]"]');
            const quantity = parseFloat(document.querySelector('input[name="quantity"]').value) || 0;

            rateInput.value = price.toFixed(2);
            totalInput.value = (price * distance_km).toFixed(2);
            totalCost();
        }

        function totalCost() {
            let total = 0;
            document.querySelectorAll('input[name="total[]"]').forEach(function (input) {
                total += parseFloat(input.value) || 0;
            });
            document.querySelector('input[name="total_cost"]').value = total.toFixed(2);
        }
        document.addEventListener('DOMContentLoaded', function () {
            const addBtn = document.getElementById('addMore');
            const repeat = document.getElementById('repeat');

            function makeRemoveButton() {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'btn btn-danger btn-sm mt-2 remove-item';
                btn.textContent = 'Remove';
                return btn;
            }

            addBtn.addEventListener('click', function () {
                const template = repeat.querySelector('.repeat-item');
                if (!template) return;

                const clone = template.cloneNode(true);

                // clear inputs/selects/textarea values in clone
                clone.querySelectorAll('input, select, textarea').forEach(function (el) {
                    if (el.tagName.toLowerCase() === 'select') {
                        el.selectedIndex = 0;
                    } else if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });

                // append remove button
                const col = document.createElement('div');
                col.className = 'col-12';
                const removeBtn = makeRemoveButton();
                removeBtn.addEventListener('click', function () {
                    clone.remove();
                });
                col.appendChild(removeBtn);
                clone.appendChild(col);

                repeat.appendChild(clone);
            });

            // delegate remove clicks (in case rows are dynamically added in other ways)
            repeat.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-item')) {
                    const row = e.target.closest('.repeat-item');
                    if (row) row.remove();
                }
            });
        });
    </script>
@endpush

{{-- Edit File --}}