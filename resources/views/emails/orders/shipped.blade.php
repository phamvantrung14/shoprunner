@component('mail::message')
    <div style="height: 55px;background: #2F333A; padding: 10px">
        <img src="{{ $pathToFile }}" height="55px" alt="">
    </div>
    @component('mail::table')
        | Laravel       | Table         | Example  |
        | ------------- |:-------------:| --------:|
        @foreach($data as $value)

        | <img src="{{ asset($value->options->avatar)}}" width="100px" alt="">    | {{$value->name}} | {{$value->qty}}      |
        @endforeach
    @endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
