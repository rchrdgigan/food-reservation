@extends('layouts.app')

@section('content')
<form action="{{route('add.reservation')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card mt-5">
        <h4 class="card-header text-center">Reservation Form</h4>
        <div class="outer-form-container">
            <div class="form-container card-body mx-auto">
                <p>
                    <label for="venue">Venue</label>
                    <textarea class="form-control p-2" id="venue" name="venue" type="text" placeholder="Enter Venue" required=""></textarea>
                </p>
                <p>
                    <label for="motif">Motif</label>
                    <input class="form-control p-2" id="motif" name="motif" type="text" placeholder="Enter Motif" required=""/>
                </p>
                <p>
                    <label for="guest">Number of Guest</label>
                    <input class="form-control p-2" id="guest" name="guest" type="number" placeholder="Enter Number of Guests" required=""/>
                </p>
                <p>
                    <label for="r_date_time">Date and Time of Reservation</label>
                    <input  class="form-control p-2" id="r_date_time" name="r_date_time" type="datetime-local" required="">
                </p>
                <p>
                    <label  for="r_type">Type Of Reservation</label>
                    <select name="r_type" id="r_type"  class="form-control p-2" required="">
                        <option>--- Type Of Reservation ---</option>
                        <option value="Birthday">Birthday</option>
                        <option value="Wedding">Wedding</option>
                        <option value="Christening">Christening</option>
                        <option value="Seminar">Seminar</option>
                    </select>    
                </p>
                <p>
                    <label for="s_req">Special Request (Optional)</label>
                    <input class="form-control p-2" type="text" name="s_req" id="s_req" placeholder="Enter Special Request" />
                </p>
            </div>
        </div>
    </div>

    <div class="card mt-3 mb-5">
        <h4 class="card-header">Package Order</h4>
        <div class="package-container">
            <div class="container">
                <div class="row">
                @foreach ($package as $pkg)
                    <div class="col-xl-4 col-md-6  col-sm-6 col-12">
                        <div class="package-card card">
                            <div class="title">
                                <h5><input type="radio" required name="package" value="{{$pkg->id}}"> {{$pkg->package_name . " - " . $pkg->price}} pesos</h5>
                            </div>
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
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    @foreach ($package->take(1) as $pkg)
    
    <div class="button-container">
        <input type="submit" class="rounded mb-5 btn-lg" value="Next">
    </div>
    @endforeach
</form>

</div>

@endsection
