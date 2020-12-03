@component('mail::message')
@component('mail::panel')
    <p>Your company subscription will end at <b>{{date( 'F j, Y',strtotime( $endDate ))}}</b> </p>
    <p>Please contact the administrator, if you want to <b>Upgrade</b> or <b>Downgrade</b> subscription</p>
@endcomponent
   
 
@endcomponent