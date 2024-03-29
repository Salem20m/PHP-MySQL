<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('employee.index')}}">Delightful Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links text-center">
        <li class="{{request()->is('employee') ? 'active' : ''}}"><a href="{{route('employee.index')}}">Orders Placed</a></li>
        <li class="{{request()->is('fee') ? 'active' : ''}}"><a href="{{route('employee.fee')}}">Tax-Fee</a></li>
        <li class="{{request()->is('employee/create') ? 'active' : ''}}"><a href="{{route('employee.create')}}">Register Employee</a></li>
        <ul class="nav  navbar-right">
            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
    </ul>

    <!-- /.navbar-top-links -->
</nav>
