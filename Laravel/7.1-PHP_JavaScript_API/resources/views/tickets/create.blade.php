<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

@include('styles')
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="events/index.html">Event Platform</a>
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
                    <li class="nav-item"><a class="nav-link" href="{{route('reports.show',$event->id)}}">Room capacity</a></li>
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
                    <h2 class="h4">Create new ticket</h2>
                </div>
            </div>

            <form class="needs-validation" novalidate action="{{route('ticket.store', $event->id)}}" method="post">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputName">Name</label>
                        <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="inputName" name="name" placeholder=""
                               value="{{old('name')}}">
                        <div class="invalid-feedback">
                            Name is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputCost">Cost</label>
                        <input type="number" class="form-control {{$errors->has('cost') ? 'is-invalid' : ''}}" id="inputCost" name="cost" placeholder=""
                               value="{{old('cost' ?? 0)}}">
                        <div class="invalid-feedback">
                            {{$errors->first('cost')}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="selectSpecialValidity">Special Validity</label>
                        <select class="form-control" id="selectSpecialValidity" name="special_validity">
                            <option value="" selected>None</option>
                            <option value="amount" {{(old('special_validity') == 'amount') ? 'selected' : ''}}>Limited amount</option>
                            <option value="date" {{(old('special_validity') == 'date') ? 'selected' : ''}}>Purchaseable till date</option>
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputAmount">Maximum amount of tickets to be sold</label>
                        <input type="number" class="form-control {{$errors->has('amount') ? 'is-invalid' : ''}}"
                               id="inputAmount" name="amount" placeholder="" value="{{old('amount' ?? 0)}}">
                        <div class="invalid-feedback">
                            {{$errors->first('amount')}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputValidTill">Tickets can be sold until</label>
                        <input type="text"
                               class="form-control {{$errors->has('valid_until') ? 'is-invalid' : ''}}"
                               id="inputValidTill"
                               name="valid_until"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="{{old('valid_until')}}">
                        <div class="invalid-feedback">
                            {{$errors->first('valid_until')}}
                        </div>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary" type="submit">Save ticket</button>
                <a href="{{route('events.show', $event->id)}}" class="btn btn-link">Cancel</a>
            </form>

        </main>
    </div>
</div>

</body>
</html>
