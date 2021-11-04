@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-header bg-danger">
            <h3 class="card-title">Canceled History</h3>
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
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($canceled as $data)
                <tr>
                    <td hidden=""></td>
                    <td>{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</td>
                    <td>{{$data->total_payment}}</td>
                    <td>{{$data->reason}}</td>
                    <td><span class="bg-danger rounded p-1">Canceled</span></td>
                    <td>
                        <form action="{{route('view.completed',$data->id)}}" method="post">
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
