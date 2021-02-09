@component('mail::message')
    <p>Whoops, we're sorry but your {{$content}} named as below:</p>
@component('mail::panel')
    <p>
    	@if($content == "Product")
    	<h3><b>{{$productname}}</b></h3>
    	@else
    	<h3><b>Product Name</b></h3>
    	@endif
    </p>
@endcomponent
    <p>Has been removed by the administrator due to inapropriate content. Please contact admin for more detail.</p>
   
 
@endcomponent