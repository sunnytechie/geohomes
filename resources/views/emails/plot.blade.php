<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plot Allocation</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
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
    </style>
</head>
<body style="padding: 50px 25px;">
    <div id="header">
        <img height="50" width="150" src="https://geohomesgroup.com/assets/images/logo/geohomeslogo.png" alt="Geohomes">
    </div>
    <div style="margin: 30px; auto"></div>
    <div>{{ $compose['clientName'] }}</div>
    <div>{{ $compose['clientAddress'] }}</div>
    <div>{{ $compose['clientCity'] }}, {{ $compose['clientZip'] }}</div>
    <div>Initial Plot Assignment Letter</div>
    <div style="margin: 30px; auto"></div>

    <p>Dear {{ $compose['clientName'] }},</p>

<p>We are delighted to inform you that your request to purchase property within our prestigious <strong>{{ $compose['projectName'] }}</strong> has been approved. We genuinely appreciate your interest in our endeavor and cordially invite you to join our rapidly expanding community.
</p>
<p>Subject to the conclusion of the payment procedure, we are delighted to temporarily assign Plot <strong>{{ $compose['plotNumber'] }}</strong> within the <strong>{{ $compose['projectAddress'] }}</strong> to you. This letter functions as your initial plot allocation, allowing you to proceed with the processes necessary to secure your desired plot.
</p>
<p>After careful consideration and based on your preference, the following plot details have been provisionally designated to you:
</p>

<p><strong>Your Plot Number is plot - {{ $compose['plotNumber'] }}</strong></p>

<p><strong>Plot Size: Approximately *558.150* SQ. M.</strong></p>

<p><strong>Location</strong>: {{ $compose['projectAddress'] }}, {{ $compose['projectState'] }} Nigeria</p>

<p><strong>Dimensions: Approximately 18.3m * 30.5m.</strong></p>

<p>Please note that these details are subject to change pending the conclusion of the payment procedure. We have made every effort to ensure the accuracy of this document, but minor variations may still occur.
</p>
<p>Attached to this letter is an invoice for the total cost for lease of the parcel, which was generated to facilitate the payment and land acquisition procedure. Please peruse the invoice for the payment schedule and instructions in detail.
</p>
<p>For the next measures to be taken, we respectfully request the following from you:
</p>
<p>Examine the invoice carefully, including the payment schedule and terms and conditions.
</p>
<p>Within 14 days, make the essential payment as outlined on the invoice.
</p>
<p>Notify our sales division when the payment has been initiated.
</p>
<p>Our team will promptly update the status of your plot allocation and direct you through the subsequent steps required for land registration upon receipt of your payment. Our dedicated customer support team is available to resolve any questions or concerns you may have throughout the process.
</p>
<p>Please familiarize yourself extensively with the layout plan, rules and regulations, and any other documentation provided. If you require additional information, please contact our sales department at <strong>0906 297 2785</strong> or <strong>geohomesng@gmail.com</strong>
</p>
<p>We sincerely appreciate your selection of Geohomes as your land developer of choice. We are confident that your choice will prove to be an excellent investment, and we are committed to ensuring your entire contentment.
</p>
<p>Again, congratulations on your initial plot allocation! We ardently anticipate your continued collaboration as we work together to make your land ownership aspirations a reality.
</p>
<p>Best wishes,</p>
<p>GeoHomes</p>

</body>
</html>
