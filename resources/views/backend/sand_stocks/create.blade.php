@extends('layouts.app')

@section('content')
<h2>Add Sand Stock</h2>

<form action="{{ route('sand_stocks.store') }}" method="POST">
    @csrf

    <label>River Point:</label>
    <select name="river_point_id">
        @foreach($river_points as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select><br>

    <label>Sand Type:</label>
    <select name="sand_type_id">
        @foreach($sand_types as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select><br>

    <label>Available Quantity (CFT):</label>
    <input type="number" name="available_quantity_cft" step="0.01"><br>

    <button type="submit">Save</button>
</form>
@endsection
