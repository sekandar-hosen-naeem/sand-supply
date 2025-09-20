@extends('backend.layouts.app')
@section('pageTitle', 'Tenders')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tenders</div>

                    <div class="card-body">
                        <a href="{{ route('tenders.create') }}" class="btn btn-primary mb-3">Add New</a>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>River Point</th>
                                    <th>Tender No</th>
                                    <th>Tender Rate Per CFT</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i=>$point)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $point->riverPoint?->point_name }}</td>
                                    <td>{{ $point->tender_no }}</td>
                                    <td>{{ $point->tender_rate_per_cft }}</td>
                                    <td>{{ $point->start_date }}</td>
                                    <td>{{ $point->end_date }}</td>
                                    <td>{{ $point->status?"Active":"Inactive" }}</td>
                                    <td>
                                        <a href="{{ route('tenders.edit', $point->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('tenders.destroy', $point->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
