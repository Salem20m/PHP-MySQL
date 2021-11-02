@extends('layout')

@section('navigation')

	@if(Auth::user()->customer)
	    @include('customers.navigation')
    @else
		@include('employees.navigation')
    @endif

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header">Order details 00001</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-8 col-md-offset-2">
            <p>Number: 00001</p>
            <p>Date: 00/00/0000</p>
            <p>Total Value: AED 5.50</p>

            <form role="form" class="form-inline">
                <div class="form-group ">
                    <label>Status</label>
                    <select>
                        <option value="approved">Approved</option>
                        <option value="disapproved">Disapproved</option>
                        <option value="production">In production</option>
                        <option value="delivery">Out for delivery</option>
                        <option value="finished">Finished</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-xs">Change Status</button>
                <br />
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="local" value="" checked disabled> Home delivery
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Delivery address</h3>
                </div>
                <div class="panel-body">
                    Address: Lorem Ipsum St, 1234, Neighborhood, City
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- /.panel-body -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Portions</th>
                                    <th class="text-center">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>French Fries</td>
                                    <td>AED 1.50</td>
                                </tr>
                                <tr>
                                    <td>Steak</td>
                                    <td>AED 4.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="col-md-12">Delivery fee: AED 5.00</p>
            <p class="col-md-12">Total order amount: AED 10.50</p>
        </div>
    </div>
    <!-- /.row -->
@endsection
