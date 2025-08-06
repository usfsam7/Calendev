<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Calendex!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #0d6efd;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }

        .btn {
            display: inline-block;
            background: #0d6efd;
            color: #fff;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Calendex, {{ $user->name }}!</h1>

        <p>We're excited to have you on board. Calendex helps you stay organized, manage your events, and never miss a deadline again.</p>

        <p>You can start creating and tracking your events now by logging in to your dashboard.</p>

        <a href="{{ url('/') }}" class="btn">Go to Calendex</a>

        <p class="footer">If you have any questions, feel free to reply to this email. We're here to help!</p>
    </div>
</body>
</html>
