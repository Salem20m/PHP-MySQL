<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('customer.index')}}">Delightful Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links text-center">
        <li class="{{request()->is('customer') ? 'active' : ''}}"><a href="{{route('customer.index')}}">Order</a></li>
        <li class="{{request()->is('customer/historic') ? 'active' : ''}}"><a href="{{route('customer.historic')}}">Historic</a></li>
        <ul class="nav  navbar-right">
            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
    </ul>

    <!-- /.navbar-top-links -->
</nav>
