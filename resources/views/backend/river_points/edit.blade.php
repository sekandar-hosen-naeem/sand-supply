@extends('backend.layouts.app')
@section('pageTitle', 'River Points - Update')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update River Point</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('river-points.update',$riverPoint->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="point_name" class="form-label">Point Name</label>
                                <input type="text" class="form-control" id="point_name" name="point_name" value="{{$riverPoint->point_name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{$riverPoint->location}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="gps_coordinates" class="form-label">GPS Coordinates</label>
                                <input type="text" class="form-control" id="gps_coordinates" name="gps_coordinates" value="{{$riverPoint->gps_coordinates}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{$riverPoint->description}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('river-points.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
