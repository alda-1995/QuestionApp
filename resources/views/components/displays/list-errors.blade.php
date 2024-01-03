@if ($errors->has($name))
<ul>
    @foreach ($errors->get($name) as $errors)
        @foreach ($errors as $error)
            <li>
                <x-displays.text-error error="{{$error}}" />
            </li>
        @endforeach
    @endforeach
</ul>
@endif