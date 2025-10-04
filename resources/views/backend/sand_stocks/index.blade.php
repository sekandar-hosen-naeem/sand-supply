@extends('layouts.app')

@section('content')
<h2>Sand Stocks</h2>
<a href="{{ route('sand_stocks.create') }}">+ Add New</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th>
            <th>River Point</th>
            <th>Sand Type</th>
            <th>Available (CFT)</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sand_stocks as $stock)
        <tr>
            <td>{{ $stock->id }}</td>
            <td>{{ $stock->riverPoint?->name }}</td>
            <td>{{ $stock->sandType?->name }}</td>
            <td>{{ $stock->available_quantity_cft }}</td>
            <td>{{ $stock->updated_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('sand_stocks.show', $stock) }}">View</a> |
                <a href="{{ route('sand_stocks.edit', $stock) }}">Edit</a> |
                <form action="{{ route('sand_stocks.destroy', $stock) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $sand_stocks->links() }}
@endsection
