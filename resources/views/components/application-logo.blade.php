@if(file_exists('images/logo.png'))
<img src="{{asset('images/logo.png')}}" {{ $attributes }}>
@else
<img src="{{asset('images/logodefault.png')}}" {{ $attributes }}>
@endif
