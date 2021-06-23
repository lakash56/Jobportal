@component('mail::message')
Hi, {{$data['friend_name']}},
<br>
{{$data['your_name']}}({{$data['your_email']}})
Has refered you this job.

@component('mail::button', ['url' => $data['job_url']])
Click here to view the job.
@endcomponent

Thanks,<br>
JOY-JobsForYou
@endcomponent
