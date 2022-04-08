<form class="needs-validation" action="{{$route}}" method="post">
    @csrf
    @method($method)

    {{--{{dump($errors)}}--}}
    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputName">Name</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->     <!-- old() method to recover the input after validation fail -->
            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="inputName" name="name" placeholder="" value="{{old('name')?? $event->name ?? ''}}" required>
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputSlug">Slug</label>
            <input type="text" class="form-control {{$errors->has('slug') ? 'is-invalid' : ''}}" id="inputSlug" name="slug" placeholder="" value="{{old('slug')?? $event->slug ?? ''}}" required>
            <div class="invalid-feedback">
                {{ $errors->first("slug") }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputDate">Date</label>
            <input type="text"
                   class="form-control {{$errors->has('date') ? 'is-invalid' : ''}}"
                   id="inputDate"
                   name="date"
                   placeholder="yyyy-mm-dd"
                   value="{{old('date') ?? $event->date ?? ''}}" required>
            <div class="invalid-feedback">
                {{$errors->first('date')}}
            </div>
        </div>
    </div>
    {{--                @foreach($errors->all() as $error)--}}
    {{--                    <p style="color: red">{{ $error ?? 'Hey' }}</p>--}}
    {{--                @endforeach--}}
    <hr class="mb-4">

    <button class="btn btn-primary" type="submit">{{ isset($event) ? "Edit" : "Save" }} event</button>
    <a href="{{route('events.index')}}" class="btn btn-link">Cancel</a>
</form>
