<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Survey email</title>
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
        color: #00A75A;
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
        margin-top: 40px;
      }
    </style>
  </head>
  <body>
    <div id="header">
      <img height="50" width="150" src="https://geohomesgroup.com/assets/images/logo/geohomeslogo.png" alt="Geohomes">
    </div>

    <div class="content">
        Hello {{ $compose['name'] }}, <br>
        <p>Your legal documents for land payment from Geohomes are ready.</p>
        <p>Kindly apply for survey here: <a href="https://geoprecisegroup.com/login">www.geoprecisegroup.com/login</a></p>

        <br>
        <p>Best wishes,</p>
        <p>GeoHomes</p>
    </div>


  </body>
  </html
