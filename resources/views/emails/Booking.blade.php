<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Mail</title>
    <style>
        /* Define styles for the template */
        body {
          font-family: Arial, sans-serif;
          background-color: #ffffff;
          margin: 0;
          padding: 0;
        }

        #header {
          text-align: center;
          padding: 20px 0;
          margin-top: 10px;
        }

        #header img {
          max-width: 100%;
          height: auto;
        }

        #content {
          background-color: #ffffff;
          padding: 20px;
          text-align: center;
        }

        #content .text-1, .text-2 {
          color: #654321;
          font-weight: 600;
          font-size: 18px;
        }

        .text-2 {
          font-size: 24px;
          margin-top: 15px;
        }

        #footer {
          margin: 40px auto;
          padding: 10px;
          text-align: center;
        }


        .icons {
          margin-bottom: 20px;
        }

        .icons a {
          color: #0080E6;
          font-weight: 600;
          display: inline-block;
          margin: auto 3px;
          font-size: 16px;
        }

        .text-3 {
          margin-top: 50px;
        }

        .text-4 {
          margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="header">
        <img height="50" width="50" src="https://fbiltd.org/assets/images/fbi/fbilogo.jpg" alt="FBGILTD">
    </div>

    <div id="content">
        <div class="text-1">Building materials customer booking</div>
        <div class="text-3">
            You have a new booking on building materials. Kindly respond as soon as possible.
        </div>
        <div class="text-4">
          <div><strong>Details of message</strong></div>
          <div>Building Material: {{ $compose['title'] }}</div>
          <div>Quantity: {{ $compose['qtty'] }}</div>
          <div>Location: {{ $compose['location'] }}</div>
          <div>Address: {{ $compose['address'] }}</div>
          <div>Phone: {{ $compose['phone'] }}</div>
          <div>Messege: {{ $compose['msg'] }}</div>
        </div>
    </div>

    <div id="footer">
        <div class="link">
          <a href="https://www.fbiltd.org">www.fbiltd.org</a>
        </div>
    </div>
</body>
</html>
