@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="card col-12 col-md-12 col-lg-12 order-md-2">
            <div class="card-header bg-primary">
                <h5 class="card-title">Reservation Information</h5>
            </div>
            <div class="card-body">
            @foreach($approved as $data)
                <div class="row mb-3">
                    <h3 class="text-primary"><i class="fas fa-user"></i> {{$data->name}}</h3>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-primary">
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
                        <p id="bal"></p>
                        </div>
                    </div>
                </div> 
                <form action="{{route('completed', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="float-left mt-5 mb-3">
                        <a href="{{route('inprocess.transaction')}}" class="btn btn-sm btn-danger p-3">
                        <i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="float-right mt-5 mb-3">
                        <button class="btn btn-sm btn-success p-3" type="submit">
                        Done <i class="fas fa-check"></i></button>
                    </div>  
                </form>  
                @endforeach  
            @endforeach    
            </div>
        </div>
    </div>
    
</div>

@endsection
