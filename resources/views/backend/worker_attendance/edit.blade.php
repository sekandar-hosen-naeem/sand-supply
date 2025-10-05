@extends('backend.layouts.app')
@section('pageTitle', 'Edit Worker Attendance')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Attendance</div>
        <div class="card-body">
            <form method="POST" action="{{ route('worker-attendances.update',$workerAttendance->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Worker</label>
                    <select name="worker_id" class="form-control" required>
                        @foreach($workers as $w)
                            <option value="{{ $w->id }}" {{ $workerAttendance->worker_id == $w->id ? 'selected' : '' }}>
                                {{ $w->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">River Point</label>
                    <select name="river_point_id" class="form-control">
                        @foreach($riverPoints as $rp)
                            <option value="{{ $rp->id }}" {{ $workerAttendance->river_point_id == $rp->id ? 'selected' : '' }}>
                                {{ $rp->point_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Attendance Date</label>
                    <input type="date" name="attendance_date" class="form-control" value="{{ $workerAttendance->attendance_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Present" {{ $workerAttendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                        <option value="Absent" {{ $workerAttendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                        <option value="Leave" {{ $workerAttendance->status == 'Leave' ? 'selected' : '' }}>Leave</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ $workerAttendance->remarks }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('worker-attendances.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
