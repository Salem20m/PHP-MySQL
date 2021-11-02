@extends('layout')

@section('navigation')
    @include('customers.navigation')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header">Place Order</h1>
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

                            <form role="form" method="POST" action="{{ route('order.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Order Items</label>
                                    @foreach($items as $item)
                                    <div class="checkbox">
                                        <label class="col-md-6">
                                            <input type="checkbox" name="items[]" value="{{$item['item_id']}}">
                                            {{$item['name']}} (AED {{$item['price']}})
                                        </label>
                                        <div class="col-md-6">
                                            <select name="item-{{ $item['item_id'] }}">
                                                <option>Qtt</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="local" value="0">Pick up at the restaurant
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input class="del" type="radio" name="local" value="1" checked>Home delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Delivery / pick-up time</label>
                                    <input class="form-control" placeholder="Enter time" name="time">
                                </div>
                                <div class="address">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="aa form-control" placeholder="Enter your address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input class="aa form-control" placeholder="Enter the number" name="number" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Neighborhood</label>
                                        <input class="aa form-control" placeholder="Enter your neighborhood" name="freej" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="aa form-control" placeholder="Enter your city" name="city" type="text" value="">
                                    </div>
                                <div>
                                <button type="submit" class="btn btn-primary pull-right">Finish</button>
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

    <script>
        let radios = document.querySelectorAll('input[type=radio]');
        let fields = document.querySelector('.address');

        for (let i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', function() {
                if(!radios[1].checked) {
                    fields.style.display = 'none';
                } else {
                    fields.style.display = 'block';
                }
            });
        }

    </script>
@endsection
