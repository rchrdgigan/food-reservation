@extends('layouts.admin')

@section('content')

<div class="container-fluid">
<div class="row mb-3">
    <div class="bulletWrap">
        <div class="bulletTrack tableHorizontal">
            <div class="slide tableCell">
                <a href="{{route('pending.transaction')}}"><i class="fas fa-spinner"></i><p class="text-secondary">Pending</p></a>
            </div>
            <div class="slide tableCell">
                <a class="active" href="{{route('inprocess.transaction')}}"><i class="fas fa-history"></i><p class="text-secondary">Processing</p></a>
            </div>
            <div class="slide tableCell">
                <a href="{{route('completed.transaction')}}"><i class="fas fa-calendar-check"></i><p class="text-secondary">Complete</p></a>
            </div>
        </div>
    </div>
</div>
  <div class="row">
    <div class="col-12">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary">
            <h3 class="card-title">Processing Reservation</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="food_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th hidden="">No.</th>
                    <th>Trasaction Number</th>
                    <th>Full Name</th>
                    <th>Total Payment</th>
                    <th>Down Payment</th>
                    <th>Date of Reservation</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($approved as $data)
                <tr>
                    <td hidden=""></td>
                    <td>{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->total_payment}}</td>
                    <td>{{$data->downpayment}}</td>
                    <td>{{Carbon\Carbon::parse($data->r_date)->format('M d, Y | H:i:s')}}</td>
                    <td><span class="bg-info rounded p-1">Approved</span></td>
                    <td>
                        <form action="{{route('view.inprocess',$data->id)}}" method="post">
                        @csrf
                           <button class="btn btn-primary m-1 .btn-sm"
                                type="submit"
                                class="btn btn-primary">
                                Show
                                <i class="fas fa-eye"></i>
                            </button>  
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
</div>

@endsection
