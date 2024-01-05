<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-us</title>


    <style>
        @font-face {
            font-family: Poppins-SemiBold;
            src: url(./assets/font/Poppins-SemiBold.ttf);
        }
        @font-face {
            font-family: Poppins-Bold;
            src: url(./assets/font/Poppins-Bold.ttf);
        }
    </style>
</head>
<body>

    <table
    style="height:100%;
    background-color:#030344;
    width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover; background-position: center; background-image: url({{$message->embed(asset('frontend/images/1x/backgroundImge.png'))}});">
       <tr>
           <th>
            <img src="{{$message->embed(asset('frontend/images/1x/profileimage.png'))}}" alt="" style="width: 25%;margin-top: 20px;height: 100%;object-fit: cover;">
           </th>
       </tr>
       <tr>
        <th ><h1 style="font-family: Poppins-Bold;letter-spacing: 4px;color: #fff;padding-top: 40px;">Thank You For Contacting Us!</h1></th>
    </tr>
        <tr >

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('frontend/images/1x/contact.png'))}}" alt="" style="width:25%;border-radius: 20%;height: 100%;object-fit: cover;"></th>
        </tr>

        <tr>
            <th><p style=" font-family: Poppins-SemiBold;color: #fff;padding-top: 40px;">We received it indeed! We've share it with the entire team, they were all very touched.
            <br>
            Thank you so much! We were planning on answering you soon.
        </p></th>
        </tr>
    </table>

</body>
</html>
