<form action="/form/test-form" method="post">
    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name') }}">
        <small class="error-message">{{ $errors->first('name') ?? '' }}</small>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="surname" placeholder="surname" value="{{ old('surname') }}">
        <small class="error-message">{{ $errors->first('surname') ?? '' }}</small>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
        <small class="error-message">{{ $errors->first('email') ?? '' }}</small>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="age" placeholder="age" value="{{ old('age') }}">
        <small class="error-message">{{ $errors->first('age') ?? '' }}</small>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="text" placeholder="text">{{ old('text') }}</textarea>
        <small class="error-message">{{ $errors->first('text') ?? '' }}</small>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Send">
    </div>
</form>
