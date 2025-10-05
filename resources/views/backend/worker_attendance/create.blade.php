@extends('backend.layouts.app')
@section('pageTitle', 'Add Worker Attendance')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Attendance</div>
        <div class="card-body">
            <form method="POST" action="{{ route('worker-attendances.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Worker</label>
                    <select name="worker_id" class="form-control" required>
                        <option value="">-- Select Worker --</option>
                        @foreach($workers as $w)
                            <option value="{{ $w->id }}">{{ $w->name }}</option>
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
                    <label class="form-label">Attendance Date</label>
                    <input type="date" name="attendance_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Leave">Leave</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('worker-attendances.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
