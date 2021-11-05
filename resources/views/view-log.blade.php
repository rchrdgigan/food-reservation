@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-uppercase m-0 text-center" style="color:#5f9ea0"><u><b> Transaction Information</b></u></h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-8 mx-auto">
                    <div class="text-left pt-2">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Venue:</label>
                                    <label style="color:#5f9ea0">{{$current->venue}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Motif:</label>
                                    <label style="color:#5f9ea0">{{$current->motif}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Number of Guest:</label>
                                    <label style="color:#5f9ea0">{{$current->guests_no}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Date and Time Due:</label>
                                    <label style="color:#5f9ea0">{{Carbon\Carbon::parse($current->r_date)->format('M d, Y - H:i:s')}}H</label>
                                </div>

                                <div class="form-group col-6">
                                    <label>Reservation Type:</label>
                                    <label style="color:#5f9ea0">{{$current->r_type}}</label>
                                </div>
                                @foreach($current->reservation_package->where('reservation_id' , $current->id) as $datas)
                                <div class="form-group col-6  m-0">
                                    <label>Package Order:</label>
                                    <label style="color:#5f9ea0">{{$datas->package_name}} - ₱{{$datas->price}}.00</label>
                                    @foreach($datas->foods as $fdata)
                                    <ul>
                                        <li>
                                            <a class="btn-link text-secondary">{{$fdata}}</a>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Your Gcash Name:</label>
                                        <label style="color:#5f9ea0">{{$current->gcash_name}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Receipt: </label>
                                        <label style="color:#5f9ea0"><i class="fas fa-check-circle text-success"></i><a href="/storage/upload_receipt/{{$current->upload_image}}">Uploaded</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Downpayment:</label>
                                        <label style="color:#5f9ea0">₱{{$current->downpayment}}.00</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Package Amount x No. Guest: </label>
                                        <label style="color:#5f9ea0">{{$datas->price}} x {{$current->guests_no}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Payment:</label>
                                        <label style="color:#5f9ea0">₱{{$current->total_payment}}.00</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        @if($current->status == "canceled")
                                        <td><span class="text-secondary rounded">canceled</span></td>
                                        @elseif($current->status == "pending")
                                            <td><span class="text-danger rounded">pending</span></td>
                                        @elseif($current->status == "approved")
                                            <td><span class="text-info rounded">inprocessing</span></td>
                                        @elseif($current->status == "complete")
                                            <td><span class="text-success rounded">completed</span></td>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($current->status == "canceled")
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Refunded Receipt: </label>
                                        <label style="color:#5f9ea0"><i class="fas fa-check-circle text-success"></i><a href="/storage/upload_receipt/{{$current->upload_image}}">Uploaded by Admin</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Reason:</label>
                                        <label style="color:#5f9ea0">{{$current->reason}}</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('transaction.history')}}" class="btn btn-secondary btn-md">Back</a>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection


