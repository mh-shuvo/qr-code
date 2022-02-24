@extends('layouts.user')
@section('title','File Submission List')
@section('css')
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title"> File Submission List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">
                    <thead class=" text-primary">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($members as $key => $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->dob}}</td>
                            <td>{{ucfirst($row->gender)}}</td>
                            <td>{{$row->nationality}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>{{date('d-m-Y',strtotime($row->created_at))}}</td>
                            <td>
                                {!! "<a class='btn btn-sm btn-primary' href='".route('get-member-data',[$row->code])."'>View</a> <a class='btn btn-sm btn-info text-white' href='".route('print',[$row->code])."'>Download</a>" !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
        </div>
    </div>
@endsection
@section('js')
@endsection
