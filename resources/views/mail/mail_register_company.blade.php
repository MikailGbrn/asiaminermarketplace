@component('mail::message')
 <p>Thankyou <b>{{$companyName}}</b> for registering as company </p>
 <p>This company will be automatically active on <b>3x24</b> hours, if more than that please contact the administrator</p>
@component('mail::panel')
<p>Credentials for login as company :</p> 
<p><b>Email :</b> {{$email}}</p>
<p><b>Login Page :</b> https://indominingmarketplace.com/company/login</p>
@endcomponent
 
@endcomponent