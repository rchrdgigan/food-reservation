@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mt-5">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color:#5f9ea0">
                    <h3 class="page-title text-center"><i class="fas fa-history"></i> My History Log</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-8 mx-auto">
                        <table class="table table-hover table-bordered table-responsive table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Reservation Type</th>
                                <th scope="col">Trasaction Number</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($trasaction as $data)
                                <tr>
                                    <td>{{$data->r_type}}</td>
                                    <td>{{str_pad($data->id, 6, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{Carbon\Carbon::parse($data->r_date)->format('M d, Y | H:i:s')}}</td>
                                    <td>{{$data->total_payment}} pesos</td>
                                    @if($data->status == "canceled")
                                        <td><span class="bg-secondary text-white rounded">canceled</span></td>
                                    @elseif($data->status == "pending")
                                        <td><span class="bg-danger text-white rounded">pending</span></td>
                                    @elseif($data->status == "approved")
                                        <td><span class="bg-info text-white rounded">inprocessing</span></td>
                                    @elseif($data->status == "completed")
                                        <td><span class="bg-success text-white rounded">completed</span></td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">View</a>
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
</div>
@endsection


