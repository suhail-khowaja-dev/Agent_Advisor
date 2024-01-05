<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed</title>

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
        margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover;background-position: center; background-image: url(<?php echo e($message->embed(asset('frontend/images/1x/backgroundImge.png'))); ?>);">
        <tr>
            <th>
                <img src="<?php echo e($message->embed(asset('frontend/images/1x/profileimage.png'))); ?>" alt=""
                    style="width: 20%;margin-top: 20px;height: 100%;object-fit: cover;">
            </th>
        </tr>
        <tr>

            <th>
                <h1 style="font-family: Poppins-Bold;letter-spacing: 4px;
                line-height: 66px;
            color:#fff;padding-top: 0px;">
                    Hello !<br><?php echo e($data->get_agent['name'] ?? ''); ?> has Declined Job Request !</h1>
            </th>
        </tr>
        
        <tr>
            <th>
                <h2
                    style="font-family: Poppins-Bold;letter-spacing: 4px;
                line-height: 66px;
            color:#fff;padding-top: 0px;">
                    Client Details !</h2>
            </th>
        </tr>

            <th style="letter-spacing: 4px;
        color:#fff;padding-top: 40px;width: 40%;
        ">
                <p style="text-decoration:none;text-transform: capitalize;">Name:<?php echo e($data['name']); ?></p>
                <p style="text-decoration:none !important;">Email:
                    <a href=""style="text-decoration:none !important;color:#fff;"><?php echo e($data['email']); ?></a>
                </p>
                <p style="text-decoration:none;">Price:$<?php echo e($data['price']); ?></p>

            </th>
        </tr>

        <tr>
            <th>
                <p style=" font-family: Poppins-SemiBold;color: #fff;padding-top: 40px;">Agent <?php echo e($data->get_agent['name'] ?? ''); ?> has Declined Job Request.
                </p>
            </th>
        </tr>
    </table>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/declinemail/decline_agent.blade.php ENDPATH**/ ?>