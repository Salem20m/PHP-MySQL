<form class="needs-validation" novalidate action="{{($method=='POST') ? route('sessions.store', [$event->id])
                                                                        : route('sessions.update',[$event->id, $session->id])}}"
      method="post">
    @method($method)
    @csrf
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="selectType">Type</label>
            <select class="form-control" id="selectType" name="type">
                <option value="talk" {{(isset($session) and $session->type == 'talk') ? 'selected' : ''}}>Talk</option>
                <option value="workshop" {{(isset($session) and $session->type == 'workshop') ? 'selected' : ''}}>Workshop</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputTitle">Title</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
            <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="inputTitle" name="title" placeholder=""
                   value="{{$session->title ?? old('title') ?? ''}}">
            <div class="invalid-feedback">
                Title is required.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputSpeaker">Speaker</label>
            <input type="text" class="form-control {{$errors->has('speaker') ? 'is-invalid' : ''}}" id="inputSpeaker" name="speaker" placeholder=""
                   value="{{$session->speaker ?? old('speaker') ?? ''}}">
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="selectRoom">Room</label>
            <select class="form-control" id="selectRoom" name="room">
                @foreach($event->rooms as $room)
                    <option value="{{$room->id}}" {{(isset($session) and $session->room_id == $room->id) ? 'selected' : ''}}>
                        {{$room->name}}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Room is required.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputCost">Cost</label>
            <input type="number" class="form-control" id="inputCost" name="cost" placeholder=""
                    value="{{$session->cost ?? old('cost') ?? ''}}">
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <label for="inputStart">Start</label>
            <input type="text"
                   class="form-control"
                   id="inputStart"
                   name="start"
                   placeholder="yyyy-mm-dd HH:MM"
                   value="{{$session->start ?? old('start') ?? ''}}">
        </div>
        <div class="col-12 col-lg-6 mb-3">
            <label for="inputEnd">End</label>
            <input type="text"
                   class="form-control"
                   id="inputEnd"
                   name="end"
                   placeholder="yyyy-mm-dd HH:MM"
                   value="{{$session->end ?? old('end') ?? ''}}">
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="textareaDescription">Description</label>
            <textarea class="form-control" id="textareaDescription" name="description" placeholder=""
                      rows="5">{{$session->description ?? old('description') ?? ''}}</textarea>
        </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save session</button>
    <a href="events/detail.html" class="btn btn-link">Cancel</a>
</form>
