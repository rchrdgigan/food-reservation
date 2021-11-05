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
            class="btn btn-primary mb-2" 
            data-toggle="modal" 
            data-target="#addUserModal">
            <i class="fas fa-plus"></i>
            Add User Account
        </button>
        
        <div class="row">
            @foreach($admin->where('id','<>',1) as $data)
            <div class="col-md-4">
                <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{$data->name}}</h3>
                    <div class="card-tools">
                    
                        <form action="{{route('del.user',$data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                        
                            <button type="button" 
                                    class="btn btn-tool"
                                    id="{{$data->id}}"
                                    name="{{$data->name}}"
                                    email="{{$data->email}}"
                                    data-toggle="modal" 
                                    data-target="#editUserModal">
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
                    <table class="table table-striped table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr> 
                            <tr>
                                <td>{{$data->email}}</td>
                                <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y - H:i:s')}}H</td>
                                <td>{{Carbon\Carbon::parse($data->updated_at)->format('M d, Y - H:i:s')}}H</td>
                            </tr> 
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

  <!-- Modal ADD USER -->
  <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">Add User Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('create.user')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Full Name" required="">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter Email" required="">
                        </div> 
                        
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Input your password" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Re-input your password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal EDIT FOOD PACKAGE -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title" id="exampleModalLabel">Update Food Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.user')}}" method="post" id="editForm" enctype="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="card-body">
                        <input type="text" name="user_id" id="user_id" hidden>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Full Name" required="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter Email" required="">
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
