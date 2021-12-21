@extends('layout')

@section('navigation')
    @include('customers.navigation')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header">Order history</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Order number</th>
                                    <th class="text-center">Date</th>
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
