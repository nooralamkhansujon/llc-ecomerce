@component('mail::message')
# Welcome {{$user->name}} to our ecommerce system

<p class="lead">
   Please click the following link to activate your account
</p>

The introduction to the notification.
<a class="btn btn-lg btn-primary" href="{{route('activate',$user->email_verification_token)}}">
click Here
</a>

Thank you,<br>
 for using our application!
{{ config('app.name') }}

@endcomponent
