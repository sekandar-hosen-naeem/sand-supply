@extends('backend.layouts.app')
@section('pageTitle', 'River Points - Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New River Point</div>

                    <div class="card-body">
                        <form action="{{ route('sand_stocks.store') }}" method="POST">
                            @csrf

                            <label>River Point:</label>
                            <select class="form-control" name="river_point_id">
                                @foreach($river_points as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select><br>

                            <label>Sand Type:</label>
                            <select class="form-control" name="sand_type_id">
                                @foreach($sand_types as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select><br>

                            <label>Available Quantity (CFT):</label>
                            <input class="form-control" type="number" name="available_quantity_cft" step="0.01"><br>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection