@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="card col-12 col-md-12 col-lg-12 order-md-2">
            <div class="card-header bg-primary">
                <h5 class="card-title">Canceled Information</h5>
            </div>
            <div class="card-body">
            @foreach($cancel_list as $data)
                <div class="row mb-3">
                    <h3 class="text-primary"><i class="fas fa-user"></i> {{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</h3>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showProfileModal">
                            <i class="fas fa-eye"></i> View User
                        </button>
                    </div>
                </div>
                <div class="text-muted">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Venue</b> <a id="venue" class="float-right">{{$data->venue}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Motif</b> <a id="motif" class="float-right">{{$data->motif}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Guests No.</b> <a id="guests_no" class="float-right">{{$data->guests_no}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Reservation Date</b> <a id="r_date" class="float-right">{{$data->r_date}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Special Request</b> <a id="special_req" class="float-right">{{$data->special_req}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Reservation Type</b> <a id="r_type" class="float-right">{{$data->r_type}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GCash Name</b> <a id="gcash_name" class="float-right">{{$data->gcash_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Uploaded Receipt</b>
                            <a href="/storage/upload_receipt/{{$data->upload_image}}" class="float-right" data-toggle="lightbox" data-title="sample 1 - white">
                                <img src="/storage/upload_receipt/{{$data->upload_image}}" height="50px" class="mb-2" alt="white sample">
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Reason</b> <a id="gcash_name" class="float-right">{{$data->reason}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Uploaded Refunded Receipt</b>
                            <a href="/storage/refunded_receipt/{{$data->rf_upload_image}}" class="float-right" data-toggle="lightbox" data-title="sample 1 - white">
                                <img src="/storage/refunded_receipt/{{$data->rf_upload_image}}" height="50px" class="mb-2" alt="white sample">
                            </a>
                        </li>
                    </ul>
                </div>
                @foreach($data->reservation_package->where('reservation_id' , $data->id) as $datas)
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mt-2 text-muted">{{$datas->package_name}} - ₱{{$datas->price}}.00</h5>
                        @foreach($datas->foods as $fdata)
                        <ul>
                            <li>
                                <a class="btn-link text-secondary">{{$fdata}}</a>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="float-right">
                        <h5 class="mt-2 text-muted">Total Payment</h5>
                        <p id="trans_t_payment" hidden>{{$data->total_payment}}</p>
                        <p id="ttp"></p>
                        <h5 class="mt-2 text-muted">Downpayment</h5>
                        <p id="trans_d_payment" hidden>{{$data->downpayment}}</p>
                        <p id="tdp"></p>
                        <h5 class="mt-2 text-muted">Balance</h5>
                        <p>Not Available</p>
                        </div>
                    </div>
                </div> 
                @endforeach  
            @endforeach    
            </div>
        </div>
    </div>
    
</div>

<!-- Modal Show Profile -->
<div class="modal fade" id="showProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Client Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/storage/users_image/{{$data->image}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$data->first_name}} {{$data->middle_name}} {{$data->last_name}} ({{$data->gender}})</h3>
                            
                            <p class="text-muted m-0 text-center">Address : {{$data->house_street}}, {{$data->baranggay}}, {{$data->municipality}}</p>
                            <p class="text-muted m-0 text-center">Email : {{$data->email}}</p>
                            <p class="text-muted m-0 text-center">Birthday : {{Carbon\Carbon::parse($data->birth_day)->format('M d, Y')}}</p>
                            <p class="text-muted m-0 text-center">Contact : {{$data->contact}}</p>

                            <ul class="list-group list-group-unbordered mt-3 mb-3">
                            <li class="list-group-item">
                                <b>Total of completed reservation</b> <a class="float-right">{{$countCompleted}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total of cancellation</b> <a class="float-right">{{$countCanceled}}</a>
                            </li>
                            @if($dateCompleted == NULL)
                            @else
                            <li class="list-group-item">
                                <b>Date of past reservation</b> <a class="float-right"> {{Carbon\Carbon::parse($dateCompleted->r_date)->format('M d, Y')}}</a>
                            </li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
