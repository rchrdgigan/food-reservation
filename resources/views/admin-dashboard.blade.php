@extends('layouts.admin') 
@section('content')
<div class="container-fluid">
     <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending</span>
                <span class="info-box-number">{{$countPending}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Approved</span>
                <span class="info-box-number">{{$countApproved}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <span class="info-box-number">{{$countComplete}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

      </div>

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
@endsection