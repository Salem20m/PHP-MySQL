<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    @include('styles')
    <link rel="stylesheet" href="{{asset('dist/Chart.css')}}">


</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('events.index')}}">Event Platform</a>
    <span class="navbar-organizer w-100">{{$organizer->name}}</span>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" id="logout" href="{{route('logout')}}">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('events.index')}}">Manage Events</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$event->name}}</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('events.show', $event->id)}}">Overview</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item"><a class="nav-link active" href="{{route('reports.show',$event->id)}}">Room capacity</a></li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="border-bottom mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2">{{$event->name}}</h1>
                </div>
                <span class="h6">{{$event->date}}</span>
            </div>

            <div class="mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h2 class="h4">Room Capacity</h2>
                </div>
            </div>

            {{--CHART--}}
            <canvas id="myChart" width="1000" height="400"></canvas>

            {{--<script type="text/javascript" src="{{asset('dist/Chart.bundle.js')}}"></script>--}}
            <script type="text/javascript" src="{{asset('dist/Chart.js')}}"></script>
            <script>

                var ctx = document.getElementById('myChart').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        labels: {!! $sessionTitles !!},
                        datasets: [
                            {
                                label: 'Atttendees',

                                data: {!! $sessionAttendees !!},

                                backgroundColor: {!! $sessionColors !!},

                                borderWidth: 1
                            },

                            {
                                label: 'Capacity',

                                data: {!! $sessionCapacities !!},

                                backgroundColor: 'rgba(55, 33, 188, 0.2)',


                                borderWidth: 1
                            }


                        ]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxRotation: 45,
                                    minRotation: 45
                                }
                            }]
                        }
                    }
                });
            </script>


        </main>
    </div>
</div>

</body>
</html>
