<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

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
        style="height:100%;width:60%;
        background-color:#030344;
        margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover;background-position: center; background-image: url({{$message->embed(asset('frontend/images/1x/backgroundImge.png'))}});">
        <tr>
            <th>
                <img src="{{$message->embed(asset('frontend/images/1x/profileimage.png'))}}" alt=""
                    style="width: 20%;margin-top: 20px;height: 100%;object-fit: cover;">
            </th>
        </tr>
        <tr>

            <th>
                <h1 style="letter-spacing: 4px;
                line-height: 66px;
            color:#fff;padding-top: 20px;">
                    Hello {{$data['name']}} !<br>
                    Please Click Following Button To Reset Password!</h1>
            </th>
        </tr>
        <tr>

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('frontend/images/1x/passwordIcon.png'))}}" alt=""
                    style="width:10%;border-radius: 20%;height: 50%;object-fit: cover;"></th>
        </tr>
        <tr>

            <th style="letter-spacing: 4px;
        color:#fff;padding-top: 40px;width: 40%;
        ">
                <p style="text-decoration:none;">Name:{{$data['name']}}</p>
                <p style="text-decoration:none !important;">Email:
                    <a href=""style="text-decoration:none !important;color:#fff;">{{ $data['email'] }}</a>
                </p>
                <button style="background-color:#fff;text-decoration:none !important; color: #000; font-weight: 600;padding:8px 14px ;"><a style="text-decoration:none !important;" href="{{ url('reset-password/'.$token)}}">Click For Password Reset</a></button>
            </th>
        </tr>
        <tr>
            <th>
                <p style=" color: #fff;padding-top: 20px;">Please Click Button for Password Reset!</p>
            </th>
        </tr>
    </table>

</body>

</html>
