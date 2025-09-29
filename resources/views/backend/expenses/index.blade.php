@extends('backend.layouts.app')
@section('pageTitle', 'Expenses')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Expenses</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">Add New Expense</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $expense)
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>{{ $expense->title }}</td>
                        <td>{{ number_format($expense->amount,2) }}</td>
                        <td>{{ $expense->category }}</td>
                        <td>{{ $expense->expense_date }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>
                            <a href="{{ route('expenses.edit',$expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('expenses.destroy',$expense->id) }}" method="POST" style="display:inline-block;">
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
