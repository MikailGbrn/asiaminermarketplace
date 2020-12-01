@component('mail::message')
@component('mail::panel')
    @if ($subscription == 0)
    <p>oopss, your company subscription back to <b>free plan</b> again</p>
    @else
    <p>Congratulation ! Your company subscription is  <b>{{$subscription==1 ? 'Silver' : 'Gold'}}</b> and will be valid from <b> {{$start}} </b> to <b> {{$end}} </b></p>
    @endif
    <p>Please contact the administrator, if you want to <b>Upgrade</b> or <b>Downgrade</b> subscription</p>
@endcomponent
   
 
@endcomponent