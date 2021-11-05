@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> List of Approved Events</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="food_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Trasaction Number</th>
                                <th>Venue</th>
                                <th>Date of Reservation</th>
                                <th>Type of Reservation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($approved as $data) 
                                @forelse($r_id->where('reservation_id',$data->id)->take(1) as $edata)
                                @empty
                                <tr>
                                    <td hidden=""></td>
                                    <td>{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$data->venue}}</td>
                                    <td>{{Carbon\Carbon::parse($data->r_date)->format('M d, Y | H:i:s')}}</td>
                                    <td>{{$data->r_type}}</td>
                                    <td><span class="bg-info rounded p-1">Approved</span></td>
                                    <td>
                                        <button class="btn btn-primary m-1 .btn-sm"
                                                type="submit"
                                                class="btn btn-primary" 
                                                id="{{$data->id}}"
                                                data-toggle="modal" 
                                                data-target="#assignTeamModal">
                                                <i class="fas fa-users"></i>
                                                Assign Team Catering
                                        </button>  
                                    </td>
                                </tr>
                                @endforelse
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
           
            <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> List of Incoming and Outgoing Events</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="team_item" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th hidden="">No.</th>
                                <th>Team Name</th>
                                <th>Location</th>
                                <th>Trasaction Number</th>
                                <th>Date of Reservation</th>
                                <th>Type of Reservation</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedule as $sched_data)
                            <tr>
                                <td>{{$sched_data->team}}</td>
                                <td>{{$sched_data->location}}</td>
                                <td>{{str_pad($sched_data->reservation_id, 6, '0', STR_PAD_LEFT)}}</td>
                                <td>{{Carbon\Carbon::parse($sched_data->r_date)->format('M d, Y | H:i:s')}}</td>
                                <td>{{$sched_data->r_type}}</td>
                                @if($sched_data->status == "incoming")
                                <td><p class="bg-success rounded text-center">{{$sched_data->status}}</p></td>
                                @else
                                <td><p class="bg-info rounded text-center">{{$sched_data->status}}</p></td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
            

        </div>   
    </div>
  </div>
</div>

<!-- Modal TEAM SETTING -->
<div class="modal fade" id="assignTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Assign Team Catering Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('assign.team')}}" method="POST" id="team_frm">
                    @csrf
                    <div class="card-body">
                        <input name="reservation_id" id="reservation_id" hidden>
                        <div class="form-group">
                            <label for="tname"><i class="fas fa-users"></i> Team Name</label>
                            <input type="text" name="tname" class="form-control" id="tname" placeholder="Enter Team Name">
                        </div>
                        <div class="form-group">
                            <label for="location"><i class="fas fa-briefcase"></i> Location</label>
                            <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
