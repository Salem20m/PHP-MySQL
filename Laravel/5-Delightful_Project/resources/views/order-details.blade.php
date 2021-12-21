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
            <h1 class="page-header">Order details </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-8 col-md-offset-2">
            <p>Number: {{$order->order_id}}</p>
            <p>Date: {{$order->date}}</p>
            <p>Total Value: AED {{$order->value}}</p>

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
                            <input type="checkbox" name="local" value=""
                                   @if($order->delivery)
                                   checked
                                   @endif
                                   disabled>
                            Home delivery
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
    @if($order->delivery)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Delivery address</h3>
                </div>
                <div class="panel-body">
                    {{$order->items()->first()->pivot->address}}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    @endif
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
                                    <th class="text-center">Item</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->pivot->quantity}}</td>
                                    <td>AED {{number_format($item->pivot->quantity * $item->price, 2)}}</td>
                                </tr>
                            @endforeach

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
            <p class="col-md-12">Delivery fee: AED {{$order->fee}}</p>
            <p class="col-md-12">Total order amount: AED {{$order->value}}</p>
        </div>
    </div>
    <!-- /.row -->
@endsection
