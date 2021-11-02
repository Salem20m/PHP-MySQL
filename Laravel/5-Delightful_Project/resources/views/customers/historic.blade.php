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
                                    <th class="text-center">Request number</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Value of the order</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0001</td>
                                    <td>00/00/0000</td>
                                    <td>AED 100.00</td>
                                    <td>Approved</td>
                                    <td><a href="{{route('order.index')}}">See Details</a></td>
                                </tr>
                                <tr>
                                    <td>0002</td>
                                    <td>00/00/0000</td>
                                    <td>AED 100.00</td>
                                    <td>Approved</td>
                                    <td><a href="#">See Details</a></td>
                                </tr>
                                <tr>
                                    <td>0003</td>
                                    <td>00/00/0000</td>
                                    <td>AED 100.00</td>
                                    <td>In production</td>
                                    <td><a href="#">See Details</a></td>
                                </tr>
                                <tr>
                                    <td>0004</td>
                                    <td>00/00/0000</td>
                                    <td>AED 100.00</td>
                                    <td>In production</td>
                                    <td><a href="#">See Details</a></td>
                                </tr>
                                <tr>
                                    <td>0005</td>
                                    <td>00/00/0000</td>
                                    <td>AED 100.00</td>
                                    <td>Finalized</td>
                                    <td><a href="#">See Details</a></td>
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
    <!-- /.row -->
@endsection
