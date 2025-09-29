@extends('backend.layouts.app')
@section('pageTitle', 'Edit Expense')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Expense</div>
        <div class="card-body">
            <form method="POST" action="{{ route('expenses.update',$expense->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $expense->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $expense->amount) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="Fuel" {{ $expense->category=='Fuel' ? 'selected' : '' }}>Fuel</option>
                        <option value="Maintenance" {{ $expense->category=='Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="Salary" {{ $expense->category=='Salary' ? 'selected' : '' }}>Salary</option>
                        <option value="Purchase" {{ $expense->category=='Purchase' ? 'selected' : '' }}>Purchase</option>
                        <option value="Other" {{ $expense->category=='Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Expense Date</label>
                    <input type="date" name="expense_date" class="form-control" value="{{ old('expense_date', $expense->expense_date) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $expense->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
