<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            line-height: 1.6;
        }
        .content h2 {
            font-size: 20px;
            margin-top: 0;
        }
        .password-box {
            background-color: #f1f1f1;
            padding: 15px;
            margin: 20px 0;
            border-left: 5px solid #4CAF50;
            font-size: 18px;
            font-weight: bold;
            word-break: break-all;
        }
        .footer {
            background-color: #f4f6f8;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset Successful</h1>
        </div>
        <div class="content">
            <h2>Hello,</h2>
            <p>We have successfully reset your password. Your new password is:</p>
            <div class="password-box">{{ $newPassword }}</div>
            <p>Please log in using this password and change it as soon as possible to ensure the security of your account.</p>
            <p>If you did not request this change, please contact our support team immediately.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
