@extends('layouts.app')

@section('content')
<div class="container mt-4">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white" style="background-color:#5f9ea0"><i class="fas fa-user"></i> Profile Picture</div>
                <div class="card-body box-profile">
                <div class="container">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="/storage/users_image/{{auth()->user()->image}}" class="picture-src" id="wizardPicturePreview" title="">
                            <input type="file" name="image" id="wizard-picture" class="">
                        </div>
                        <h6 class="">Choose Picture</h6>
                    </div>
                </div>
                
                <h4 class="profile-username text-center mb-5">{{auth()->user()->first_name}} {{auth()->user()->middle_name}} {{auth()->user()->last_name}}</h4>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Email : </b><span>{{auth()->user()->email}}</span>
                    </li>
                    <li class="list-group-item">
                    <b>Address : </b><span>{{Auth::user()->house_street}}, {{Auth::user()->baranggay}}, {{Auth::user()->municipality}}</span>
                    </li>
                </ul>

                
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color:#5f9ea0"><i class="fas fa-id-card"></i> Profile Information</div>
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="fname">First Name :</label>
                            <input id="fname" value="{{auth()->user()->first_name}}" name="first_name" type="text" class="@error('fname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>
                        </div>
                           
                        <div class="form-group col-4">
                            <label for="lname">Last Name :</label>
                            <input id="lname" value="{{auth()->user()->middle_name}}" name="last_name" type="text" class="@error('lname') is-invalid @enderror form-control" 
                                    placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="mname">Middle Name :</label>
                            <input id="mname" value="{{auth()->user()->last_name}}" name="middle_name" type="text" class="@error('mname') is-invalid @enderror form-control" 
                                    placeholder="Enter Middle Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="gender">Gender :</label>
                            <div class="input-group">
                                <select class="custom-select" name="gender" id="inputGroupSelect01" required>
                                    <option {{(auth()->user()->gender == "Male") ? "selected" : ""}} value="Male">Male</option>
                                    <option {{(auth()->user()->gender == "Female") ? "selected" : ""}} value="Female">Female</option>
                                </select>
                            </div>

                         </div>
                        <div class="form-group col-6">
                            <label for="email">Email :</label>
                            <input id="email" value="{{auth()->user()->email}}" name="email"  type="email" class="@error('email') is-invalid @enderror form-control" 
                                    placeholder="Enter Email Ex: user@domain.com" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="bdate">Birth Date :</label>
                            <input id="bdate" name="birthdate" value="{{Carbon\Carbon::parse(auth()->user()->birthdate)->format('Y-m-d')}}" type="date" class="@error('bdate') is-invalid @enderror form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="municipality">Municipality :</label>
                            <input id="municipality" name="municipality" value="{{auth()->user()->municipality}}" type="text" class="@error('municipality') is-invalid @enderror form-control" 
                                    placeholder="Enter municipality" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="brgy">Brgy. :</label>
                            <input id="brgy" name="baranggay" value="{{auth()->user()->baranggay}}" type="text" class="@error('baranggay') is-invalid @enderror form-control" 
                                    placeholder="Enter baranggay." required>
                        </div>
                        <div class="form-group col-6">
                            <label for="house_street">Street :</label>
                            <input id="house_street" name="house_street" value="{{auth()->user()->house_street}}" type="text" class="@error('house_street') is-invalid @enderror form-control" 
                                    placeholder="Enter house_street" required>
                        </div>
                    </div>
                    <button class="btn mt-2 float-right btn-sm text-white" style="background-color:#5f9ea0" type="submit"><b>Update Information</b></button>
                </div>
            </div>
        </div>           
    </div>
</div>

@endsection
