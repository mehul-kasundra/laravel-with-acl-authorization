<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <div style="margin-left: 15px;">
        <h3>{{ AppHelper::getConfigValue('COMPANY_NAME') }}</h3>
       <p> Please click below message to verify your email.</p>
        <a href="{{ route('verify.user', $user->register_token) . '?email=' . $user->email }}" target="_blank" />
            Click Here to register email
        </a>

    </div>
</body>

</html>
