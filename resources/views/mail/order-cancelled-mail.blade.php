<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order|Cancelled</title>
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
        }

    </style>
</head>
<body>

    <div style="max-width: 600px; text-align: center; margin: auto;background-color: #fff;">

        <div style="border-radius:15px;border:2px solid rgba(16, 130, 6, 1);box-shadow: 8px 9px 8px 0px rgba(0, 0, 0, 0.25);">
            <div style="max-width: 320px;margin: 0 auto;padding-top:40px;">

                <img src="{{ asset('frontend/images/mail-img/cancel.png') }}" style="max-width: 100%;"
                    alt="">
            </div>
            <h2 style="color:rgba(208, 42, 42, 1);font-weight:500">Order Cancelled</h2>
            <p style="text-align: center;color:#6a7b83;font-weight:;padding-left:20px;padding-right:20px;">
                Hello <strong> USER </strong>,
                Your order for <strong>Product Name</strong> Has<br/>
                 Been Cancelled. Please Feel Free To <br/> Continue Shopping With Us.
            </p>

            <p style="color:#6a7b83;font-weight:500;opacity:50%">
                For Any Queries Please Contact On Email
            </p>
            <div style="max-width:67px;margin: 0 auto;padding-top:15px;padding-bottom:15px;">

                <img src="{{ asset('frontend/images/mail-img/logo.png') }}" style="max-width: 100%;"
                    alt="">
            </div>


        </div>
    </div>

</body>
</html>
