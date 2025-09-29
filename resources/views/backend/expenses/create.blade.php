@extends('backend.layouts.app')
@section('pageTitle', 'Add Expense')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Expense</div>
        <div class="card-body">
            <form method="POST" action="{{ route('expenses.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="Fuel">Fuel</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Salary">Salary</option>
                        <option value="Purchase">Purchase</option>
                        <option value="Other" selected>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Expense Date</label>
                    <input type="date" name="expense_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
