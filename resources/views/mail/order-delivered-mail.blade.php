@component('mail::message')
Hello {{ $userName }}, Your order for {{ $product }} has been delivered successfully. Please feel free to continue shopping with us.
For any queries please contact on {{ $adminMail }}.
@endcomponent
