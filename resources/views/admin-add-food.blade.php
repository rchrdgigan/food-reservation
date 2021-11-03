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
            data-target="#addFoodModal">
            <i class="fas fa-plus"></i>
            Add Food Item
        </button>
        <div class="card">
            <div class="card-header bg-primary">
            <h3 class="card-title">List of Foods</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="food_item" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th hidden="">No.</th>
                    <th>Food Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($foods as $data)
                <tr>
                    <td hidden="">{{$data->id}}</td>
                    <td>{{$data->food_title}}</td>
                    <td>{{$data->description}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->categories}}</td>
                    <td><img src="/storage/foods_image/{{$data->image}}" width="100" hight="100" class="img-circle"></td>
                    <td>
                    <form action="{{route('delete.food', $data->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <a class="btn btn-primary m-1 .btn-sm"
                            type="button" 
                            id="{{$data->id}}" 
                            food-title="{{$data->food_title}}" 
                            description="{{$data->description}}" 
                            price="{{$data->price}}" 
                            categories="{{$data->categories}}" 
                            image="/storage/foods_image/{{$data->image}}" 
                            class="btn btn-primary" 
                            data-toggle="modal" 
                            data-target="#showFoodModal">
                            Show
                            <i class="fas fa-eye"></i>
                        </a> 
                        <button type="submit" class="btn btn-danger m-1 .btn-sm">
                            Delete
                            <i class="fas fa-trash"></i>
                        </button>
                        <a class="btn btn-success m-1 .btn-sm"
                            type="button" 
                            id="{{$data->id}}" 
                            food-title="{{$data->food_title}}" 
                            description="{{$data->description}}" 
                            price="{{$data->price}}" 
                            categories="{{$data->categories}}"
                            image="{{$data->image}}"
                            class="btn btn-primary" 
                            data-toggle="modal" 
                            data-target="#editFoodModal">
                            Edit
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
</div>

  <!-- Modal ADD FOOD -->
  <div class="modal fade" id="addFoodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Add Food Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.food')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="foodTitle">Food Title</label>
                            <input type="text" name="food_title" class="form-control" id="foodTitle" placeholder="Ex: Adobo" required="">
                        </div>
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <textarea type="text" name="description" class="form-control" id="InputDescription" placeholder="Enter Description" maxlength="200" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="InputAuthor">Price</label>
                            <input type="number" name="price" class="form-control" id="InputPrice" placeholder="Enter Price" required="">
                        </div>                        
                        <div class="form-group">
                            <label for="InputCategories">Categories</label>
                            <select name="categories" id="InputCategories" class="form-control">
                                <option value="Beverage">Beverage</option>
                                <option value="Desert">Desert</option>
                                <option value="Main Dish">Main Dish</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <input class="form-control" type="file" name="image">
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
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
<!-- Modal EDIT FOOD -->
<div class="modal fade" id="editFoodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel">Update Food Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.food')}}" method="post" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <input hidden="" name="foodID" id="food_id">
                        <div class="form-group">
                            <label for="UpadateFoodTitle">Food Title</label>
                            <input type="text" name="food_title" class="form-control" id="UpadateFoodTitle" placeholder="Ex: Adobo" required="">
                        </div>
                        <div class="form-group">
                            <label for="UpdateDescription">Description</label>
                            <textarea type="text" name="description" class="form-control" id="UpdateDescription" placeholder="Enter Description" maxlength="200" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="InputAuthor">Price</label>
                            <input type="number" name="price" class="form-control" id="UpdatePrice" placeholder="Enter Price" required="">
                        </div>                        
                        <div class="form-group">
                            <label for="InputCategories">Categories</label>
                            <select name="categories" id="UpdateCategories" class="form-control">
                                <option value="Beverage">Beverage</option>
                                <option value="Desert">Desert</option>
                                <option value="Main Dish">Main Dish</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <input class="form-control" type="file" name="image">
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
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
<!-- Modal SHOW FOOD -->
<div class="modal fade" id="showFoodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-information">
            <h5 class="modal-title" id="exampleModalLabel">Food Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container p-3">
                    <form id="showForm">
                        
                        <div class="d-flex justify-content-center">
                            <img id="image" width="300" class="img-circle elevation-5" />
                        </div>

                        <div class="mt-2 p-2 d-flex justify-content-center">
                            <h3 id="food_title"></h3>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="p-2"><label>Price :</label></div>
                            <div class="p-2"><p id="price"></p></div>
                        </div>

                        <div class="d-flex flex-column">
                            <label>Description</label>
                            <p id="description"></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
