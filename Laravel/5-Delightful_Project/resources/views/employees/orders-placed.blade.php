@extends('layout')

@section('navigation')
    @include('employees.navigation')
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-header">Orders placed</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" class="form-inline">
                                <div class="form-group">
                                    <label>Filter by: </label>
                                    <select class="form-control">
                                        <option>Select status</option>
                                        <option value="Awaiting Approval">Awaiting Approval</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Disapproved">Disapproved</option>
                                        <option value="In Production">In Production</option>
                                        <option value="Left For Delivery">Left For Delivery</option>
                                        <option value="Finalized">Finalized</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </form>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
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
                                        <th class="text-center">Order number</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Client</th>
                                        <th class="text-center">Value of the order</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order['order_id']}}</td>
                                        <td>{{$order['date']}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>AED {{$order->value}}</td>
                                        <td>{{$order['status']}}</td>

                                        <td><a href="{{route('order.show', $order['order_id'])}}">See Details</a></td>
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
        <!-- /.row -->

@endsection
