@if ($errors->has($name))
    <div class="error_message">{{$errors->first($name)}}</div>
@endif