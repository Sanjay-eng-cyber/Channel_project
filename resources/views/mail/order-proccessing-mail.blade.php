@component('mail::message')
Hello {{ $userName }}, Your order for {{ $productName }} is in process. The order will be delivered soon.
For any queries please contact on {{ $adminMail }}.
@endcomponent
