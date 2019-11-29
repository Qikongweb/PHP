@component('mail::message')
#You created a user successfully

Your user name: {{ $data['name'] }}
Your email: {{ $data['email'] }}

You can visit home page through this button.

@component('mail::button', ['url' => url('/feed/')])
Home Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
