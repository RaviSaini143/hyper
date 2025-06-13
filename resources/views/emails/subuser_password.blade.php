<!DOCTYPE html>
<html>
<head>
    <title>Your Subuser Account Password</title>
</head>
<body>
    <p>Hello {{ $subUser->name }},</p>

    <p>Your subuser account has been created. Here are your login credentials:</p>

    <p><strong>Email:</strong> {{ $subUser->email }}</p>
    <p><strong>Password:</strong> {{ $plainPassword }}</p>

    <p>Please log in and change your password as soon as possible.</p>
    <p>Thank you!</p>
</body>
</html>
