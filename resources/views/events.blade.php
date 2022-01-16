@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:90px">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color:#5f9ea0">
                    <i class="fas fa-id-card"></i> Incoming Schedule
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">Team Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Reservation Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($schedule->where('status', 'incoming') as $data)
                            <tr>
                                <td>{{$data->team}}</td>
                                <td>{{$data->location}}</td>
                                <td>{{Carbon\Carbon::parse($data->r_date)->format('M d, Y | H:i:s')}}H</td>
                                <th>{{$data->r_type}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color:#5f9ea0">
                    <i class="fas fa-id-card"></i> Outgoing Schedule
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">Team Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Reservation Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($schedule->where('status', 'outgoing') as $data)
                            <tr>
                                <td>{{$data->team}}</td>
                                <td>{{$data->location}}</td>
                                <td>{{Carbon\Carbon::parse($data->r_date)->format('M d, Y | H:i:s')}}</td>
                                <th>{{$data->r_type}}</th>
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
