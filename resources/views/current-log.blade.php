@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mt-5">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-8 mx-auto">
                    <div class="text-left pt-2">
                            <h3 class="text-uppercase pb-2"><u><b> Current Transaction</b></u></h3>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Venue:</label>
                                    <label style="color:#5f9ea0">f</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Motif:</label>
                                    <label style="color:#5f9ea0">e</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Number of Guest:</label>
                                    <label style="color:#5f9ea0">d</label>
                                </div>
                                <div class="form-group col-6">
                                    <label>Date and Time Due:</label>
                                    <label style="color:#5f9ea0">c</label>
                                </div>

                                <div class="form-group col-6">
                                    <label>Reservation Type:</label>
                                    <label style="color:#5f9ea0">b</label>
                                </div>

                                <div class="form-group col-6">
                                    <label>Package Order:</label>
                                    <label style="color:#5f9ea0">n - m</label>
                                </div>
                            </div>
                           
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Gcash name:</label>
                                        <label style="color:#5f9ea0">d</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Receipt: </label>
                                        <label style="color:#5f9ea0"><i class="fas fa-check-circle text-success"></i><a href="">Uploaded</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Downpayment:</label>
                                        <label style="color:#5f9ea0">z</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Package Amount x No. Guest: </label>
                                        <label style="color:#5f9ea0">p x y</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Payment:</label>
                                        <label style="color:#5f9ea0">a</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <label class="text-danger">pending</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a href="" class="btn btn-danger btn-sm float-left">Cancel Transaction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection


