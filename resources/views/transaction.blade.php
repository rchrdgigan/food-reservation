@extends('layouts.app')

@section('content')
<div class="container transaction-container mb-5" style="margin-top:90px">
    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12 col-12 transaction-right card mt-4 p-4">
            <h2 class="p-3 text-center">Transaction Payment</h2>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{route('transaction')}}" method="post" enctype="multipart/form-data">
            @csrf
                @foreach($reservation as $data)
                <input type="text" class="form-control" name="venue" hidden value="{{$data[0]}}">
                <input type="text" class="form-control" name="motif" hidden value="{{$data[1]}}">
                <input type="text" class="form-control" name="guest" hidden value="{{$data[2]}}">
                <input type="datetime-local" class="form-control" hidden name="r_date_time" value="{{$data[3]}}">
                <input type="text" class="form-control" name="r_type" hidden value="{{$data[4]}}">
                <input type="text" class="form-control" name="s_req" hidden value="{{$data[5]}}">
                <input type="text" class="form-control" name="package_id" hidden value="{{$data[6]}}">
                <input type="text" class="form-control" name="package_name" hidden value="{{$data[7]}}">
                <input type="text" class="form-control" name="package_price" hidden value="{{$data[8]}}">
                <input type="text" class="form-control" name="total" hidden value="{{$data[9]}}">
                <Label>Package Name: <b> {{$data[7]}}</b></Label><br>
                <Label>Amount Package x Guest : <b> ₱{{$data[8]}}</b> x <b> {{$data[2]}}</b></Label><br>
                <Label>Total Payment : <b> ₱{{$data[9]}}</b></Label> 
                @endforeach

                @foreach($food_array as $food)
                <input type="checkbox" checked class="form-control" name="foods[]" hidden value="{{$food}}">
                @endforeach
                <p><label for="">Half Payment: </label> <input type="text" class="form-control" name="h_payment" id="" required placeholder="Enter Half Payment">
                <a class="text-info">Note: Your half-payment must be ₱{{$halfpayment}} or higher..</a></p>
                <p><label for="">Your G-Cash Name: </label> <input type="text" class="form-control" name="gcash_name" id="" required placeholder="Enter Half Payment"></p>
                <p><label for="">Upload Sceenshot Reciept: </label> <input type="file" class="form-control" required name="upload_receipt" id=""></p>
                <p><label for="">Payment Date and Time: </label> <input type="datetime-local" class="form-control" required name="pay_date" id=""></p>
                
                <input class="special rounded p-2" type="submit" value="Reserve">
            </form>         
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 col-12 transaction-left mt-4">
            <div class="gcash-container">
                <h2 class="card-header text-center mb-4 text-white" style="background-color:#5f9ea0">Our G-Cash Information</h2>
                <h5>G-Cash Name:</h5>
                <p style="text-align: center"><b>{{($gcash == '' || $gcash->gname == NULL) ? 'Not Availabe' : $gcash->gname}}</b></p>
                <h5>G-Cash Account Number:</h5>
                <p style="text-align: center"><b>{{($gcash == '' || $gcash->gnumber == NULL) ? 'Not Availabe' : $gcash->gnumber}}</b></p>
            </div>
            <div class="contact-us">
                <h2 class="card-header text-center mb-4 text-white" style="background-color:#5f9ea0">Contact Us</h2>
                <h5>Contact Number:</h5>
                <p style="text-align: center"><b>{{($business == '' || $business->cpnumber == NULL) ? 'Not Availabe' : $business->cpnumber}}</b></p>
                <h5>E-mail:</h5>
                <p style="text-align: center"><b>{{($business == '' || $business->email == NULL) ? 'Not Availabe' : $business->email}}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection


