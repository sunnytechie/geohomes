<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Allocation</title>
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
    <div>{{ $compose['clientName'] ?? "not found" }}</div>
    <div>{{ $compose['clientAddress'] ?? "not found" }}</div>
    <div>{{ $compose['clientCity'] ?? "not found" }}, {{ $compose['clientZip'] ?? "not found" }}</div>
    <div>Initial Plot Assignment Letter</div>
    <div style="margin: 30px; auto"></div>

    <p>Dear {{ $compose['clientName'] ?? "not found" }},</p>

    <p>We are pleased to congratulate you on the conclusion of the payment for the 99-year lease of your property in our prestigious {{ $compose['projectName'] }} layout. Throughout this process, we sincerely appreciate your trust and confidence in our company.</p>

    <p>We are pleased to officially assign you the following property, which is now yours in its entirety:</p>

    <p><strong>Your Plot Number(s) are stated on the initial paper.</strong></p>

    <p><strong>Plot Size: Approximately *558.150* SQ. M.</strong></p>

    <p><strong>Location</strong>: {{ $compose['projectAddress'] }}, {{ $compose['projectState'] }} Nigeria</p>

    <p><strong>Dimensions: Approximately 18.3m * 30.5m.</strong></p>

    <p>with the terms and conditions of the sale. Attached for your review and safekeeping are the pertinent land ownership documents, including the deed and lease agreement.</p>

    <p>As the delighted proprietor of this allotment, you are entitled to all the privileges and conveniences provided by our prestigious {{ $compose['projectName'] }} layout.</p>

    <p>Please peruse the attached documents and verify that all of the information is accurate. If you have any questions or need additional information, our customer service team is promptly available to assist you. Please contact us at <strong>0906 297 2785</strong> or <strong>geohomesng@gmail.com</strong>.</p>

    <p>We would like to express our sincere appreciation for selecting [Your Company] as your preferred land developer. It has been a privilege to be a part of your path to land ownership. We are confident that your investment will provide a solid foundation for your future endeavors and generate substantial returns.</p>

    <p>In addition, we would like to extend our most heartfelt congratulations and best wishes to you and your family. May your allotment in {{ $compose['projectName'] }} bring you generations of happiness, prosperity, and numerous memories.</p>

    <p>Again, thank you for your valued partnership. We look forward to seeing your aspirations materialize and to continuing to serve you.</p>

    <p>Sincerely,</p>
    <br>

    <p>Surveyor</p>
    <p>Uchechukwu Godwin Nnam</p>
    <p>CEO Geohomes Group</p>

</body>
</html>
