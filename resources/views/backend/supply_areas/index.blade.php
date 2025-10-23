@extends('backend.layouts.app')
@section('pageTitle', 'Delivery Areas')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Delivery Areas</div>
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
                        <a href="{{ route('supply-areas.create') }}" class="btn btn-primary mb-3">Add New</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Area Name</th>
                                    <th>River Point</th>
                                    <th>Cost Per CFT</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $point)
                                    <tr>
                                        <td>{{ $point->id }}</td>
                                        <td>{{ $point->name }}</td>
                                        <td>{{ $point->riverPoint->point_name }}</td>
                                        <td>{{ $point->cost_per_cft }}</td>
                                        <td>
                                            <a href="{{ route('supply-areas.edit', $point->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('supply-areas.destroy', $point->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
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