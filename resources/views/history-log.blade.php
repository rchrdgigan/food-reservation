@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mt-5">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="page-title text-center"><i class="fas fa-history"></i> My History Log</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-8 mx-auto">
                        <table class="table table-hover table-bordered table-responsive table-sm">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Reservation Type</th>
                                <th scope="col">Trasaction Number</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Total Payment</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Birthday</td>
                                    <td>00008</td>
                                    <td>2021/11/30</td>
                                    <td>6,000 pesos</td>
                                    <td><span class="text-danger">pending</span></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">View</a>
                                        <a href="" class="btn btn-danger btn-sm">Cancel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Birthday</td>
                                    <td>00009</td>
                                    <td>2021/11/30</td>
                                    <td>6,000 pesos</td>
                                    <td><span class="text-info">processing</span></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Birthday</td>
                                    <td>00010</td>
                                    <td>2021/11/30</td>
                                    <td>6,000 pesos</td>
                                    <td><span class="text-success">complete</span></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection


