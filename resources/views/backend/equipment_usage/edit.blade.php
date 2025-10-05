@extends('backend.layouts.app')
@section('pageTitle', 'Edit Equipment Usage')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Equipment Usage</div>
        <div class="card-body">
            <form method="POST" action="{{ route('equipment-usages.update',$equipmentUsage->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Equipment</label>
                    <select name="equipment_id" class="form-control" required>
                        @foreach($equipments as $e)
                            <option value="{{ $e->id }}" {{ $equipmentUsage->equipment_id == $e->id ? 'selected' : '' }}>
                                {{ $e->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Operator</label>
                    <select name="operator_id" class="form-control">
                        @foreach($operators as $o)
                            <option value="{{ $o->id }}" {{ $equipmentUsage->operator_id == $o->id ? 'selected' : '' }}>
                                {{ $o->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">River Point</label>
                    <select name="river_point_id" class="form-control">
                        @foreach($riverPoints as $rp)
                            <option value="{{ $rp->id }}" {{ $equipmentUsage->river_point_id == $rp->id ? 'selected' : '' }}>
                                {{ $rp->point_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Usage Date</label>
                    <input type="date" name="usage_date" class="form-control" value="{{ $equipmentUsage->usage_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Hours Used</label>
                    <input type="number" step="0.01" name="hours_used" class="form-control" value="{{ $equipmentUsage->hours_used }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fuel Used (Liters)</label>
                    <input type="number" step="0.01" name="fuel_used_liters" class="form-control" value="{{ $equipmentUsage->fuel_used_liters }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input type="number" step="0.01" name="cost" class="form-control" value="{{ $equipmentUsage->cost }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ $equipmentUsage->remarks }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('equipment-usages.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
