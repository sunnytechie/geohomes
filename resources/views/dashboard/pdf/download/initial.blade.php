<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Initial Plot Allocation</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        @media print {
            .page-break {
                page-break-after: always;
            }
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

    <div class="content" id="pdfContent" style="padding: 10px;">
        <div style="margin: 20px"></div>
        <div style="display:flex; width:100%">
            <div style="width: 60%">GSL/L/{{ date('Y') }}/{{ $transaction->id }} </div>    <div style="text-align: right; width: 35%">{{ date('j M, Y') }}</div>
        </div>

        <div style="margin: 20px"></div>
        <strong>{{ $transaction->user->name }}</strong>
        <div>{{ $transaction->user->zip }}</div>
        <div>{{ $transaction->user->address }}</div>
        <div>{{ $transaction->user->city }}</div>
        <div>{{ $transaction->user->country }}</div>

        <div style="margin: 20px"></div>
        <div style="text-align: center"><u><strong>OFFER LETTER</strong></u></div>
        <div style="margin: 20px"></div>

        <div style="margin: 20px"></div>
        <p>With reference to your application for a land at <b>{{ $transaction->project->title }}</b>, we wish to grant you the following provisional allocation for the property herein described. This serves as a formal acceptance of your application, subject however to <strong>NOTICE:</strong></p>

        <div style="margin: 20px"></div>
        <strong>PROPERTY</strong>
        <div style="display:flex; width:100%">
            <div style="width: 20%"><i><strong>Location:</strong></i></div>    <div style="width: 80%">{{ $transaction->project->address }}, {{ $transaction->project->state }}, {{ $transaction->project->country }}</div>
        </div>
        <div style="display:flex; width:100%">
            <div style="width: 20%"><i><strong>Plot No:</strong></i></div>    <div style="width: 80%">{{ $transaction->plotnames }}</div>
        </div>
        <div style="display:flex; width:100%">
            <div style="width: 20%"><i><strong>Plot Use:</strong></i></div>    <div style="width: 80%">Residential</div>
        </div>
        <div style="display:flex; width:100%">
            <div style="width: 20%"><i><strong>Space Size:</strong></i></div>    <div style="width: 80%">500 Sq.m. (Approximately)</div>
        </div>
        <div style="display:flex; width:100%">
            <div style="width: 20%"><i><strong>Property Worth:</strong></i></div>    <div style="width: 80%">₦ {{ number_format($transaction->project->price, 2) }}</div>
        </div>

        <div style="margin: 20px"></div>
        <div><u><b>TERMS & CONDITIONS</b></u></div>
        <div style="margin: 20px"></div>


            <ol type="a">
                <li>This Offer Letter is only valid for 15 days from the date of this Offer.</li>
                <li>This is not a Deed of Conveyance / Deed of Assignment / Deed of Sub–Lease document, but a notification of allocation of Plot/building space indicating our acceptance of your application. The Developer will have to issue a Letter of Allocation after the payment for property have been made and then an execution of a Deed of Sub–Lease or Deed of Assignment afterwards.</li>
                <li>This Offer Letter may however be revoked at any time before the Final Allocation, if there is a misrepresentation of facts or default in full payment of the Land Premium or any act calculated to mislead the Developer or put the entire project in jeopardy. </li>
                <li>That you have agreed that the premium being paid for the land is not financed from illegal sources or funds derived from money laundering, Drugs or other financial crimes covered by the EFCC, ICPC, NDLEA or other Law Enforcement Bodies Acts.</li>
                <li>That you have agreed to bear, pay and discharge all levies, ground rents, documentation fees, which may be imposed on the property by the Management of the Estate, Ministry of Lands and Urban Development in future e.g. Ground Rent, C.of.O charges, etc.</li>
                <li>That you have agreed not to sublet, assign, transfer or part with possession of the land wholly or in part without the written consent of the management of <b>Geohomes Services Limited</b> or her Proxy and such consent shall not be unreasonably withheld.</li>
                <li>That you have agreed to pay <strong>Geohomes Services Limited</strong> or any company which shall be appointed by Geohomes Services Limited to carry out the duties of the facility management of the Estate, Ten percent (10%) of the valuable consideration in event of a subsequent assignment, subletting, transfer or parting of interest in the said property, as a first charge on the consideration and as a condition precedent to entering, execution and perfection of it.</li>
                <li>Offer Letter/Provisional allocation is subject to a final allocation upon full payment of the premium for the land, which must be fully paid within the stipulated period, starting from the date on this allocation or risk revocation and refund of money paid less ten percent (10%) handling charge. This refund comes within 90 working days, starting from the date on your request letter.</li>
                <li>That you are to seek approval Ministry of Lands and Urban Development  through the Developer and ensure you obtain the Building Approval of your Proposed Building on your Property, which includes the Estate Fence designs, railings and Building. Otherwise, such fence work or building will be removed by the Developer.</li>
                <li>Further to clause (g), should you default in payment and keeping to this contract terms, <b>GeoHomes Services Limited</b> reserves the right to terminate the contract of this agreement and make refund of money paid within the same duration payment was made to it less Ten percent (10%) administrative/handling charge, within 90 working days starting from the date on your request letter.</li>
                <li>Further to clause (e), you are to complete payment of your allocated plot of land  {{ $transaction->project->price }} within 15 days starting from the date on this allocation or risk revocation and refund of money paid less Ten percent (10%) Administrative/handling charge, within 90 working days starting from the date on your request letter. </li>
                <li>Also, you should mobilize to site within (6) months from the date of communication/notification of your final allocation or risk forfeiture and refund made upon demand of the total amount paid less Ten percent (10%) administrative/handling charges, within 90 working days starting from the date on your revocation letter.</li>
                <li>More so, Geohomes Services Limited may decide not to revoke a defaulters’ plot or building, however, in other not to obstruct development, you may be considered a reallocation to another plot or building within the estate or the next phase of same estate or to a different estate entirely. But whereby you refuse the newly allocated plot, Geohomes Services Limited shall refund upon a written request of amount paid less Ten percent (10%) administrative/handling charges. This clause is also applicable to the new allotted building or plot if subscriber continues to default.</li>
                <li>Note that Geohomes Services Limited reserves the right to readjust Estate Plan to enhance Estate functionality. Therefore, Subscriber’s Proprietary rights within the Estate shall be limited to the Plot/building space bought by each respective Subscriber only. </li>
                <li>That you have agreed to enter into a formal agreement with <b>Geohomes Services Limited</b> or any company which shall be appointed by it to carry out the duties of facility management of the Estate and pay all charges for the day to day maintenance of the Estate.</li>
                <li>You are to note that payments made is not refundable. However, in the event of an intention to sell, which is applicable to those that have made complete payment, upon a written letter of authority, <b>Geohomes Services Limited</b> will be willing to sell on your behalf at an agreed price as determined by you less ten percent (10%) agency commission. Also, secondary buyers of such properties shall pay Ten percent (10%) of their current purchase cost, as charge for processing and change of allocation letters to <b>Geohomes Services Limited</b> </li>
                <li>Should there be any ambiguity in any of the clauses as contained in the terms of this agreement, <b>Geohomes Services Limited</b> reserves the right to interpretations. </li>
                <li>Please, note that depending on a preferred payment plan, refund arising from any form of default by subscribers shall only be made payable by <b>Geohomes Services Limited</b> after 90 working days in a case, and within the same period of time such installment payment was made to <b>Geohomes Services Limited</b> in other cases, starting from the date of submission of the letter for request for payment made by such subscriber. </li>
                <li>It is hereby agreed that the operation of the exclusive property management agreement of the Estate as between <b>Geohomes Services Limited</b> and all the Subscriber(s) within the Estate does not in any way whatsoever confer on the Subscribers any beneficial ownership of any of the assets and infrastructure mentioned in this agreement.</li>
                <li>It is hereby agreed that the Estate’s assets stated in this agreement are not owned jointly with any Subscriber, either individually or collectively and where Subscribers form an association collectively to constitute a body corporate, they shall not individually or collectively lay  any legal right or claim of ownership of same under any circumstances whatsoever and any such right shall not be imputed by reason of the payment of service charge and infrastructure fees/charge by each Subscribers.</li>
                <li>Where any material clause relating to the aforementioned proprietary right of <b>Geohomes Services Limited</b> over all infrastructural facilities in the estate is inadvertently omitted in the deed of sublease but contained in the provisional letter of allocation and or in the final letter of allocation such clause(s) shall be deemed to have the same legal effect of forming part of the clause of the deed of sublease as if same were specifically stated in the deed of sublease agreement executed by <b>GeoHomes Services Limited</b> and the Subscriber.</li>
                <li>The exclusive management of the estate by <b>Geohomes Services Limited</b> is a continuing binding agreement as between <b>Geohomes Services Limited</b> and the Subscribers as well as Subscribers’ successors-in-title, personal representatives and assigns.</li>
                <li>As directed by the Federal Inland Revenue Service (FIRS) or Enugu State Internal Revenue Service (ESIRS), you are to pay 7.5% value added tax (VAT) on the total cost of property (Land/House). </li>

            </ol>

            <p>Please, find attached Payment bill and building guidelines.</p>

            <p>Thank you.</p>

            <p>Yours faithfully,</p>
            <p>For: <strong>Geohomes Services Limited</strong>,</p>

            <p><strong>Surv. Nnam Uchechukwu Godwin</strong></p>
            <p><i><strong>CEO/Managing Director</strong></i></p>



            {{-- New Page --}}

            <div style="padding: 140px 0"></div>

            <div><strong><u>ACKNOWLEDGEMENT</u></strong></div>
            <p>I, <b>{{ $transaction->user->name }}</b>, with
                phone number: <b>{{ $transaction->user->phone }}</b>, having read through the above and
                clearly understood it, accept these terms and conditions and hereby undertake to
                comply fully with it. <b>SIGNATURE</b>:__________   <b>DATE</b>: {{ date('Y-m-d') }}
            </p>



            {{-- New Page --}}

            <div style="padding: 20px 0"></div>

            <h4 style="text-align: center"><b>GEOHOMES SERVICES LIMITED</b></h4>
            <h5 style="text-align: center">GEOHOMES GARDENS ESTATE, DESTINY LAYOUT, AGBOGAZI NIKE, ENUGU <br> EAST LOCAL GOVERNMENT AREA, ENUGU STATE. <br> LAND PREMIUM, LEGAL FEES</h5>

            <div style="border: 1px solid #000; padding: 6px">

                <div style="display:flex; width:100%">
                    <div style="width: 50%; text-align:center"><i><strong>DR. NNAM UCHECHUKWU GODWIN</strong></i></div>    <div style="width: 50%">PLOT NO: {{ $transaction->plotnames }}</div>
                </div>

                <div style="margin: 20px 0"></div>
                <div style="display:flex; width:100%">
                    <div><i><strong>Name: </strong></i>{{ $transaction->user->name }}</div>
                </div>
                <div style="margin: 20px 0"></div>
                <div style="display:flex; width:100%">
                    <div><i><strong>LAND PREMIUM: </strong></i>₦ {{ number_format($transaction->project->price, 2) }}</div>
                </div>
                <div style="margin: 20px 0"></div>
                @php
                        $price = $transaction->project->price * $transaction->plots;
                        $price = $price + 100000;
                    @endphp
                <div>
                    <div><i><strong>PROVIDED BY GEOHOMES SERVICES LIMITED</strong></i></div>
                    <div>Additional cost Charges </div>
                    <div>Legal Documentation: N 100,000.00 </div>
                    <div><b>Total</b>: ₦ {{ number_format($price, 2) }} </div>
                    @php
                        $vat = $transaction->project->price * $transaction->plots;
                        $vat = $vat * 0.075;
                    @endphp
                    <div><b>VAT @ 7.5%</b>: ₦ {{ number_format($vat, 2) }} </div>
                    @php
                    $grandprice = $price + $vat;
                @endphp


                    <div><strong>GRAND TOTAL: ₦ {{ number_format($grandprice, 2) }}</strong> </div>
                </div>

            </div>

            <div style="margin: 100px 0"></div>

                <p>Please, note that all payments must be made within the duration specified in this bill starting from the date on the allocation or risk revocation and refund made upon demand of the total amount paid less five percent (5%) administrative/handling charges.</p>

                <p>The    failure   of   <b>GEOHOMES SERVICES LIMITED</b> to   enforce   any   provision   of   this   Terms and Conditions Shall   not   be construed as a waiver or limitation of its right to subsequently enforce and compel strict compliance with every provision of this agreement.</p>

                <p>Yours faithfully,</p>
                <p>For: <b>GeoHomes Services Limited</b>,  </p>

                <p>Yours faithfully,</p>
                <p>For: <strong>Geohomes Services Limited</strong>,</p>

                <p><strong>Surv. Nnam Uchechukwu Godwin</strong></p>
                <p><i><strong>CEO/Managing Director</strong></i></p>
    </div>

</body>
</html>
