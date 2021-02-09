@component('mail::message')
<p>You Have Recieved a Quotation For This Product:</p>
@component('mail::panel')
    <p><b>{{$product->name}}</b></p>
    <p><span>Request Detail:</span>{{$description}}</p>
    <p><span>They Would Like to:</span>{{$additional}}</p>
   	<p>Please Check Your Statistic Page for More Information</p>
@endcomponent
   
 
@endcomponent