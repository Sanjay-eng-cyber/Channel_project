@component('mail::message')
Hello {{ $userName }}, Your order for {{ $product }} is in process. The order will be delivered soon.
For any queries please contact on {{ $adminMail }}.
@endcomponent
