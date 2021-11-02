@extends('layout')

@section('navigation')
    @include('employees.navigation')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header">Delivery fee: AED {{$fee['fee']}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="{{route('employee.fee.store')}}">
                                <div class="form-group">
                                    @csrf
                                    <label>Fee</label>
                                    <input class="form-control"
                                    name="fee" placeholder="Change the delivery rate" type="text">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </form>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
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
@endsection

