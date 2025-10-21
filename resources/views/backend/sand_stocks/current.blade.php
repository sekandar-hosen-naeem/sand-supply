@extends('backend.layouts.app')
@section('pageTitle', 'River Points')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sand Stock</div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('sand_stocks.create') }}" class="btn btn-primary mb-3">Add New</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sand Name</th>
                                    <th>Total Stock</th>
                                    <th>Total Sold</th>
                                    <th>Current Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sand_stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>{{ $stock->sand_name }}</td>
                                        <td>{{ $stock->total_stock }}</td>
                                        <td>{{ $stock->total_sold }}</td>
                                        <td>{{ $stock->current_stock }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection