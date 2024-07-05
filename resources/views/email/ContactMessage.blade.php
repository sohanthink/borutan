<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Request</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #EDF2F7;
            font-family: Arial, sans-serif;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
            color: #ffffff;
        }

        .header img {
            max-width: 100px;
            width: 100px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            margin: 0 0 10px;
            line-height: 1.6;
            color: #333333;
        }

        .content p a {
            word-break: break-all;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .button {
            background-color: #9628FD;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .divider {
            border-top: 1px solid #dddddd;
            margin: 20px 0;
        }

        .footer {
            padding: 10px;
            text-align: center;
            background-color: #f4f4f4;
            color: #777777;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ $message->embed(public_path('storage/' . setting('site_logo'))) }}">
        </div>
        <div class="content">
            <p>Hej Admin,</p>
            <p>Du har mottagit ett nytt meddelande från besökaren.</p>
            <p><strong>Namn:</strong> {{ $contact['name'] }}</p>
            <p><strong>Email:</strong> {{ $contact['email'] }}</p>
            <p><strong>Ämne:</strong> {{ $contact['subject'] }}</p>
            <p><strong>Meddelande:</strong></p>
            <p>{{ $contact['message'] }}</p>
            <p>Tack för att du valde Borutan!</p>
        </div>
        <div class="divider"></div>
        <div class="footer">
            <p>&copy; 2023 Borutan. Alla rättigheter förbehållna.</p>
        </div>
    </div>
</body>

</html>
