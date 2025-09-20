@extends('backend.layouts.app')
@section('pageTitle', 'Tenders - Create')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Tender</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tenders.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="river_point_id" class="form-label">River Point</label>
                                <select class="form-control" id="river_point_id" name="river_point_id" required>
                                    <option value="">Select River Point</option>
                                    @foreach($river_point as $point)
                                        <option value="{{ $point->id }}">{{ $point->point_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tender_no" class="form-label">Tender No</label>
                                <input type="text" class="form-control" id="tender_no" name="tender_no" required>
                            </div>
                            <div class="mb-3">
                                <label for="tender_rate_per_cft" class="form-label">Tender Rate Per CFT</label>
                                <input type="number" step="0.01" class="form-control" id="tender_rate_per_cft" name="tender_rate_per_cft" required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('tenders.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
