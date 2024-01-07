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
        <img height="50" width="50" src="https://fbiltd.org/assets/images/fbi/fbilogo.jpg" alt="FBGILTD">    </div>
    <div style="margin: 30px; auto"></div>
                <div>@if($transaction->client) {{ $transaction->client->name }} @else {{ Auth::user()->name }} @endif</div>
                <div>@if($transaction->client) {{ $transaction->client->address }} @else {{ Auth::user()->address }} @endif</div>
                <div>@if($transaction->client) {{ $transaction->client->state }} @else {{ Auth::user()->city }} @endif, @if($transaction->client) {{ $transaction->client->zip }} @else {{ Auth::user()->zip }} @endif</div>
                <div>Initial Plot Assignment Letter</div>
                <div style="margin: 30px; auto"></div>

                <p>Dear @if($transaction->client) {{ $transaction->client->name }} @else {{ Auth::user()->name }} @endif,</p>

                <p>We are pleased to congratulate you on the conclusion of the payment for the 99-year lease of your property in our prestigious <strong>{{ $transaction->project->title }}</strong> layout. Throughout this process, we sincerely appreciate your trust and confidence in our company.</p>

                <p>We are pleased to officially assign you the following property, which is now yours in its entirety:</p>

                <p><strong>Your Plot Number(s): {{ $transaction->plotnames }}</strong></p>

                <p><strong>Plot Size: Approximately *558.150* SQ. M.</strong></p>

                <p><strong>Location</strong>: {{ $transaction->project->address }}, {{ $transaction->project->state }} Nigeria</p>

                <p><strong>Dimensions: Approximately 18.3m * 30.5m.</strong></p>

                <p>with the terms and conditions of the sale. Attached for your review and safekeeping are the pertinent land ownership documents, including the deed and lease agreement.</p>

                <p>As the delighted proprietor of this allotment, you are entitled to all the privileges and conveniences provided by our prestigious <strong>{{ $transaction->project->title }}</strong> layout.</p>

                <p>Please peruse the attached documents and verify that all of the information is accurate. If you have any questions or need additional information, our customer service team is promptly available to assist you. Please contact us at <strong>0906 297 2785</strong> or <strong>FBILTDng@gmail.com</strong>.</p>

                <p>We would like to express our sincere appreciation for selecting [Your Company] as your preferred land developer. It has been a privilege to be a part of your path to land ownership. We are confident that your investment will provide a solid foundation for your future endeavors and generate substantial returns.</p>

                <p>In addition, we would like to extend our most heartfelt congratulations and best wishes to you and your family. May your allotment in <strong>{{ $transaction->project->title }}</strong> bring you generations of happiness, prosperity, and numerous memories.</p>

                <p>Again, thank you for your valued partnership. We look forward to seeing your aspirations materialize and to continuing to serve you.</p>

                <p>Sincerely,</p>
                <br>
                <p>FBILTD</p>


                {{-- <p>Surv. Uchechukwu Godwin Nnam</p>
                <p>CEO FBILTD</p> --}}

</body>
</html>
