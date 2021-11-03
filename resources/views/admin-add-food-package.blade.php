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
        <button type="submit" 
            class="btn btn-warning mb-2" 
            data-toggle="modal" 
            data-target="#addFoodPackageModal">
            <i class="fas fa-plus"></i>
            Add Food Package
        </button>

        <div class="row">
            @foreach ($package as $pkg)
            <div class="col-md-4">
                <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{$pkg->package_name . " - " . $pkg->price}} pesos</h3>
                    <div class="card-tools">
                    
                        <form action="{{route('delete.foodpackage', $pkg->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        
                            <button type="button" 
                                    class="btn btn-tool"
                                    id = "{{$pkg->id}}" 
                                    package-name = "{{$pkg->package_name}}" 
                                    price = "{{$pkg->price}}"
                                    data-toggle="modal" 
                                    data-target="#editFoodPackageModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            
                            <button type="submit" class="btn btn-tool">
                                <i class="fas fa-trash"></i>
                            </button>
                            
                        </form>

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        @foreach($pkg->assign_food_package as $sub_data)
                            <tr>
                                <td>{{$sub_data->food_title}}</td>
                            </tr> 
                        @endforeach
                        </tbody>
                    </table> 
                </div>
                <!-- /.card-body -->
                </div>
            </div> 
            @endforeach
            <!-- ------------------------------- -->
        </div>   
    </div>
  </div>
</div>

  <!-- Modal ADD FOOD -->
  <div class="modal fade" id="addFoodPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Add Food Pakage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.foodpackage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="food_package">Food Package Title</label>
                            <input type="text" name="package_name" class="form-control" id="foodPackage" placeholder="Ex: Package 1 , 2, 3 etc." required="">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAuthor">Price</label>
                            <input type="number" name="price" class="form-control" id="InputPrice" placeholder="Enter Price" required="">
                        </div> 
                        
                        <div class="form-group">
                            <label for="foodTitle">Select Food :</label>
                            <select style="width:100%" class="js-select-multiple form-control" name="food[]" multiple="multiple" required="">
                            @foreach($foods as $data)
                                <option value="{{$data->id}}">{{$data->food_title}}</option>
                            @endforeach
                            </select>
                        </div> 
                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT FOOD PACKAGE -->
<div class="modal fade" id="editFoodPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel">Update Food Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.foodpackage')}}" method="post" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <input hidden="" name="packageID" id="package_id">
                        <div class="form-group">
                            <label for="UpadateFoodPackage">Food Package Title</label>
                            <input type="text" name="package_name" class="form-control" id="UpadateFoodPackage" placeholder="Ex: Package 1 , 2, 3 etc." required="">
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAuthor">Price</label>
                            <input type="number" name="price" class="form-control" id="UpdatePrice" placeholder="Enter Price" required="">
                        </div>  
                        
                        <div class="form-group">
                            <label for="foodTitle">Select Food :</label>
                            <select style="width:100%" class="js-select-multiple form-control" name="food[]" multiple="multiple" required="">
                            @foreach($foods as $data)
                                <option value="{{$data->id}}">{{$data->food_title}}</option>
                            @endforeach
                            </select>
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
