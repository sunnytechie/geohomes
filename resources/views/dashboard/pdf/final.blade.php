@extends('layouts.admin')
<title>Final Allocation Paper</title>
@section('content')
<div class="mt-5"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 shadow">
            <div class="content">
                <h4>Final Allocation Paper</h4>
                <div>{{ Auth::user()->address ?? "not found" }}</div>
                <div>{{ Auth::user()->city ?? "not found" }}, {{ Auth::user()->zip ?? "not found" }}</div>
                <div>Initial Plot Assignment Letter</div>
                <div style="margin: 30px; auto"></div>

                <p>Dear {{ Auth::user()->name ?? "not found" }},</p>

                <p>We are pleased to congratulate you on the conclusion of the payment for the 99-year lease of your property in our prestigious <strong>{{ $transaction->project->title }}</strong> layout. Throughout this process, we sincerely appreciate your trust and confidence in our company.</p>

                <p>We are pleased to officially assign you the following property, which is now yours in its entirety:</p>

                <p><strong>Your Plot Number(s): {{ $transaction->plotnames }}</strong></p>

                <p><strong>Plot Size: Approximately *558.150* SQ. M.</strong></p>

                <p><strong>Location</strong>: {{ $transaction->project->address }}, {{ $transaction->project->state }} Nigeria</p>

                <p><strong>Dimensions: Approximately 18.3m * 30.5m.</strong></p>

                <p>with the terms and conditions of the sale. Attached for your review and safekeeping are the pertinent land ownership documents, including the deed and lease agreement.</p>

                <p>As the delighted proprietor of this allotment, you are entitled to all the privileges and conveniences provided by our prestigious <strong>{{ $transaction->project->title }}</strong> layout.</p>

                <p>Please peruse the attached documents and verify that all of the information is accurate. If you have any questions or need additional information, our customer service team is promptly available to assist you. Please contact us at <strong>0906 297 2785</strong> or <strong>geohomesng@gmail.com</strong>.</p>

                <p>We would like to express our sincere appreciation for selecting [Your Company] as your preferred land developer. It has been a privilege to be a part of your path to land ownership. We are confident that your investment will provide a solid foundation for your future endeavors and generate substantial returns.</p>

                <p>In addition, we would like to extend our most heartfelt congratulations and best wishes to you and your family. May your allotment in <strong>{{ $transaction->project->title }}</strong> bring you generations of happiness, prosperity, and numerous memories.</p>

                <p>Again, thank you for your valued partnership. We look forward to seeing your aspirations materialize and to continuing to serve you.</p>

                <p>Sincerely,</p>
                <br>


                <p>Surv. Uchechukwu Godwin Nnam</p>
                <p>CEO Geohomes Group</p>
            </div>
            <div class="py-4">
                <form action="{{ route('downloadFinalPdf', $transaction->id) }}" method="POST">
                    @csrf
                <button class="btn btn-default" style="background: #00A75A; color: #fff">Download Final Paper</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
