@extends('layouts.admin')

@section('content')

<div class="container-fluid">
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
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Business Information</h3>
                    <div class="card-tools">
                        <form action="" method="post">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" 
                                    class="btn btn-tool"
                                    id = "{{($business == '') ? '': $business->id}}"
                                    btitle = "{{($business == '') ? '': $business->btitle}}" 
                                    cpnumber = "{{($business == '') ? '': $business->cpnumber}}" 
                                    email = "{{($business == '') ? '': $business->email}}" 
                                    address = "{{($business == '') ? '': $business->address}}" 
                                    data-toggle="modal" 
                                    data-target="#editBusinessModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group text-center">
                        <label for=""><i class="fas fa-image"></i> Business Logo</label>
                        <div class="input-group">
                            <div class="input-group-append mx-auto">
                                <img src="/storage/business_logo/{{($business == '') ? 'no-image.png' : $business->image}}" width="100" hight="100" class="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-briefcase"></i> Business Title</label>
                        <p>{{($business == '' || $business->btitle == NULL) ? 'None': $business->btitle}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-briefcase"></i> Phone Number</label>
                        <p>{{($business == '' || $business->cpnumber == NULL) ? 'None': $business->cpnumber}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-envelope"></i> Email Address</label>
                        <p>{{($business == '' || $business->email == NULL) ? 'None': $business->email}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-map-marked"></i> Address</label>
                        <p>{{($business == '' || $business->address == NULL) ? 'None': $business->address}}</p>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
            </div> 

            <div class="col-md-4">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> Links Information</h3>
                    <div class="card-tools">
                        <form action="" method="post">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" 
                                    class="btn btn-tool"
                                    id = "{{($link == '') ? '': $link->id}}"
                                    facebook = "{{($link == '') ? '': $link->facebook}}" 
                                    twitter = "{{($link == '') ? '': $link->twitter}}" 
                                    instagram = "{{($link == '') ? '': $link->instagram}}" 
                                    youtube = "{{($link == '') ? '': $link->youtube}}" 
                                    data-toggle="modal" 
                                    data-target="#editLinksModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><i class="fab fa-facebook"></i> Facebook Link</label>
                        <p>{{($link == '' || $link->facebook == NULL) ? 'None': $link->facebook}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fab fa-twitter"></i> Twitter Link</label>
                        <p>{{($link == '' || $link->twitter == NULL) ? 'None': $link->twitter}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fab fa-instagram"></i> Instagram Link</label>
                        <p>{{($link == '' || $link->instagram == NULL) ? 'None': $link->instagram}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fab fa-youtube"></i> Youtube Link</label>
                        <p>{{($link == '' || $link->youtube == NULL) ? 'None': $link->youtube}}</p>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
            </div> 

            <div class="col-md-4">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"> G-Cash Information</h3>
                    <div class="card-tools">
                        <form action="" method="post">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" 
                                    class="btn btn-tool"
                                    id = "{{($gcash == '') ? '': $gcash->id}}"
                                    gname = "{{($gcash == '') ? '': $gcash->gname}}" 
                                    gnumber = "{{($gcash == '') ? '': $gcash->gnumber}}" 
                                    data-toggle="modal" 
                                    data-target="#editGcashModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><i class="fas fa-signature"></i> GCash Name</label>
                        <p>{{($gcash == '' || $gcash->gname == NULL) ? 'None': $gcash->gname}}</p>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-list-ol"></i> GCash Number</label>
                        <p>{{($gcash == '' || $gcash->gnumber == NULL) ? 'None': $gcash->gnumber}}</p>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
            </div> 

        </div>   
    </div>
  </div>
</div>

<!-- Modal EDIT BUSINESS -->
<div class="modal fade" id="editBusinessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Business Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('setting.information')}}" method="post" id="editBusinessForm" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <input hidden="" name="business_id" id="business_id">
                        <div class="form-group">
                            <label for=""><i class="fas fa-image"></i> Business Logo</label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="image">
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="btitle"><i class="fas fa-briefcase"></i> Business Title</label>
                            <input type="text" name="btitle" class="form-control" id="btitle" placeholder="Enter Business Title">
                        </div>
                        <div class="form-group">
                            <label for="cpnumber"><i class="fas fa-briefcase"></i> Cellphone Number</label>
                            <input type="text" maxlength="11" name="cpnumber" class="form-control" id="cpnumber" placeholder="Enter Cellphone Number">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Business Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Business Email Address">
                        </div>
                        <div class="form-group">
                            <label for="address"><i class="fas fa-map-marked"></i> Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter Business Address">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT LINK -->
<div class="modal fade" id="editLinksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Business Links</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('setting.links')}}" method="post" id="editLinksForm" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <input hidden="" name="link_id" id="link_id">
                        <div class="form-group">
                            <label for="facebook"><i class="fab fa-facebook"></i> Facebook Link</label>
                            <input type="url" name="facebook" class="form-control" id="facebook" placeholder="Enter Facebook Link">
                        </div>
                        <div class="form-group">
                            <label for="twitter"><i class="fab fa-twitter"></i> Twitter Link</label>
                            <input type="url" name="twitter" class="form-control" id="twitter" placeholder="Enter Instagram Link">
                        </div>
                        <div class="form-group">
                            <label for="instagram"><i class="fab fa-instagram"></i> Instagram Link</label>
                            <input type="url" name="instagram" class="form-control" id="instagram" placeholder="Enter Instagram Link">
                        </div>
                        <div class="form-group">
                            <label for="youtube"><i class="fab fa-youtube"></i> Youtube Link</label>
                            <input type="url" name="youtube" class="form-control" id="youtube" placeholder="Enter Youtube Link">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT GCASH -->
<div class="modal fade" id="editGcashModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit GCash Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('setting.gcash')}}" method="post" id="editGcashForm" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <input hidden name="id" id="id">
                        <div class="form-group">
                            <label for="gname"><i class="fas fa-signature"></i> GCash Name</label>
                            <input type="text" name="gname" class="form-control" id="gname" placeholder="Enter GCash Name">
                        </div>
                        <div class="form-group">
                            <label for="gnumber"><i class="fas fa-list-ol"></i> GCash Number</label>
                            <input type="text" maxlength="11" name="gnumber" class="form-control" id="gnumber" placeholder="Enter GCash Number">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
