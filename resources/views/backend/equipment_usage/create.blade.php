@extends('backend.layouts.app')
@section('pageTitle', 'Add Equipment Usage')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Equipment Usage</div>
        <div class="card-body">
            <form method="POST" action="{{ route('equipment-usages.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Equipment</label>
                    <select name="equipment_id" class="form-control" required>
                        <option value="">-- Select Equipment --</option>
                        @foreach($equipments as $e)
                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Operator</label>
                    <select name="operator_id" class="form-control">
                        <option value="">-- Select Operator --</option>
                        @foreach($operators as $o)
                            <option value="{{ $o->id }}">{{ $o->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">River Point</label>
                    <select name="river_point_id" class="form-control">
                        <option value="">-- Select River Point --</option>
                        @foreach($riverPoints as $rp)
                            <option value="{{ $rp->id }}">{{ $rp->point_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Usage Date</label>
                    <input type="date" name="usage_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hours Used</label>
                    <input type="number" step="0.01" name="hours_used" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fuel Used (Liters)</label>
                    <input type="number" step="0.01" name="fuel_used_liters" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input type="number" step="0.01" name="cost" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('equipment-usages.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
