@component('mail::message')
Hi, {{$data['username']}},
<br>
{{$data['content']}}
Your appointment date for interview is on
<br>
{{$data['date']}}

@component('mail::button', ['url' => $data['link']])
Click here to join.
@endcomponent

Thanks,<br>
JOY-JobsForYou
@endcomponent
