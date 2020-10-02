
@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
{{ $message}}
@component('mail::button', ['url' => $link])
Go to your inbox
@endcomponent

Sincerely,
@endcomponent
