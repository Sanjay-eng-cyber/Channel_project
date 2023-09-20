@component('mail::message')
Hello {{ $userName }}, Thank You for shopping at Channel. Your order for {{ $product }} has been received successfully. We’ll soon let you know when it’s on the way.
For any queries please contact on {{ $adminMail }}.
@endcomponent
