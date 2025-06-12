<!DOCTYPE html>
<html>
<head>
    <title>Profile Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #4a90e2;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        .highlight {
            font-weight: bold;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Your Profile Has Been Updated!</h2>
        </div>
        <div class="content">
            <p>Hi {{ $name }},</p>
            <p>Your profile details have been updated successfully. Here are your updated details:</p>
            <p><strong>Name:</strong> <span class="highlight">{{ $name }}</span></p>
            <p><strong>Email:</strong> <span class="highlight">{{ $email }}</span></p>
          
            <p>If you did not request this change, please contact our support team immediately.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
