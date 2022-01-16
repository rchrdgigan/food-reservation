@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:90px">
    <div class="row  mt-5">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-8 p-5 mx-auto">
                        <div class="text-center">
                            <h1 class="text-success text-uppercase"><b>successfully reserved!</b></h1>
                            <h3 class="text-success text-uppercase"><b>your reservation id:{{str_pad($reservation->id, 6, '0', STR_PAD_LEFT)}}</b></h3>
                            <p>We received your reservation and it will begin processing it soon.<br> Please contact the admin to approve your request. Thank you!</p>
                            <a href="{{route('current.history')}}" class="btn mt-2 ml-2 btn-sm text-white" style="background-color:#5f9ea0">See your Transaction</a>
                            <a href="/" class="btn mt-2 btn-sm text-white" style="background-color:#5f9ea0">Back to home page</a>
                            <hr>
                            <hr>
                        </div>
                        <div class="text-left pt-2">
                            <h3 class="text-secondary text-uppercase pb-2"><u><b> Transaction Summary</b></u></h3>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Venue:</label>
                                    <label style="color:#5f9ea0">{{$reservation->venue}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Motif:</label>
                                    <label style="color:#5f9ea0">{{$reservation->motif}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Number of Guest:</label>
                                    <label style="color:#5f9ea0">{{$reservation->guests_no}}</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Date and Time Due:</label>
                                    <label style="color:#5f9ea0">{{$reservation->r_date}}</label>
                                </div>

                                <div class="form-group col-6">
                                    <label>Reservation Type:</label>
                                    <label style="color:#5f9ea0">{{$reservation->r_type}}</label>
                                </div>

                                <div class="form-group col-6">
                                    <label>Package Order:</label>
                                    <label style="color:#5f9ea0">{{$reservation_package->package_name}} - {{$reservation_package->price}}</label>
                                </div>
                            </div>
                           
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Gcash name:</label>
                                        <label style="color:#5f9ea0">{{$reservation->gcash_name}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Receipt: </label>
                                        <label style="color:#5f9ea0"><i class="fas fa-check-circle text-success"></i><a href="">Uploaded</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Downpayment:</label>
                                        <label style="color:#5f9ea0">{{$reservation->downpayment}}</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Package Amount x No. Guest: </label>
                                        <label style="color:#5f9ea0">{{$reservation_package->price}} x {{$reservation->guests_no}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Payment:</label>
                                        <label style="color:#5f9ea0">{{$reservation->total_payment}}</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection


