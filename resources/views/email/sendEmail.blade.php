@component('mail::message')
# {{$mailData['title']}}

<h4>Salvador, {{\Carbon\Carbon::parse($mailData['date'])->format('d/m/Y')}}</h4>
<h4>{{$mailData['sub-title']}}</h4>

{!! $mailData['mensagem'] !!}

@if($mailData['url'] != null)
@component('mail::button', ['url' => $mailData['url']])
{{$mailData['title-button']}}
@endcomponent
@endif

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
