@extends('backend.layouts.app')
@section('pageTitle', 'Delivery Areas - Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Delivery Area</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('supply-areas.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Area Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="river_point_id" class="form-label">River Point</label>
                                <select class="form-select" id="river_point_id" name="river_point_id" required>
                                    <option value="">Select River Point</option>
                                    @foreach($riverPoints as $point)
                                        <option value="{{ $point->id }}">{{ $point->point_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cost_per_cft" class="form-label">Cost Per CFT</label>
                                <input type="text" class="form-control" id="cost_per_cft" name="cost_per_cft" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('supply-areas.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection