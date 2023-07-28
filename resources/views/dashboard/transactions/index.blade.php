<title>Geo-Home Admins ~ Admins and Sper admins</title>
@extends('layouts.admin')

@section('content')
  {{-- alert --}}
  {{-- session --}}
  @if (session('message'))
    <div class="px-3">
      <div class="row">
        <div class="col-md-12">
            <div class="hide-from-mobile mt-2"></div>
            
                {{-- alert --}}
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                      <span aria-hidden="true"><i class="fa fa-window-close"></i></span>
                    </button>
                </div>
            
        </div>
    </div>
    </div>
  @endif


  <div class="container">
    <div class="row">
      @foreach ($pendingPayments as $alert)
        <div class="col-md-12">
            <div class="hide-from-mobile mt-2"></div>
                {{-- alert --}}
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p>Hi {{ Auth::user()->name }},</p>
                    <p>Sequel to your subscription to purchase land(s) in {{ $alert->project->title }} at {{ $alert->project->address }}</p>
                    <p>We are deligted to inform you that we have allocated your plots and requesting that you pay for the land with an addition fee of ₦ 100,000 (one hundred naira) for legal fee.</p>
                    @php
                        $totalFee = $alert->project->price * $alert->plots;
                        $totalFee = $totalFee + 100000;
                    @endphp
                    <p>Total fee: ₦ {{ $totalFee }}</p>
                    <p style="color: red">Please note that this transaction will <b>expire on {{ \Carbon\Carbon::parse($alert->expiry_date)->format('d M Y') }}</b> and will be available to another customer if you don't pay.</p>

                    <form action="{{ route('finalLandPayment', $alert->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="amount" value="{{ $totalFee }}">
                      <button type="submit" class="btn btn-default" style="background: #00A75A; color: #fff"">
                        Pay now ₦ {{ $totalFee }}
                      </button>

                    </form>
                </div>
        </div>
      @endforeach
    </div>
  </div>


    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <h3 style="color: #00A75A">Transaction / Subscriptions</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-2">@if (Auth::user()->is_admin)Subscriber Info @else Reference @endif</th>
              <th class="py-2">Project Name</th>
              <th class="py-2">Subscribed on</th>
              <th class="py-2">Final Payment</th>
              <th class="no-sort py-2">Number of Plots</th>
              <th class="no-sort py-2">Allocation Status</th>
              <th class="no-sort py-2">Expiry Date</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($transactions as $transaction)
            <tr role="row">
              <td class="align-middle">
                <div class="align-items-left">
                  @if (Auth::user()->is_admin)
                  <span style="font-size: 10px">{{ $transaction->user->email }}</span><br>
                  {{-- <p class="align-self-center mb-0 user-name" style="font-size: 14px">{{ $transaction->user->name }}<br>
                    <span style="font-size: 10px">{{ $transaction->user->email }}</span><br>
                  <span style="font-size: 10px">{{ $transaction->user->phone }}</span><br> --}}
                  @endif
                  <span style="font-size: 12px">TX.Ref: {{ $transaction->tx_ref }}</span><br>
                  @if ($transaction->pdf != null)
                      <a style="background: #00A75A; color: #fff" class="btn btn-sm" href="/pdfs/{{ $transaction->pdf }}" download>Paper 1</a>
                  @endif

                  @if ($transaction->final_status == 1)
                      <a style="background: #00A75A; color: #fff" class="btn btn-sm" href="/pdfs/{{ $transaction->finalpdf }}" download>Final Paper</a>
                  @endif
               
                  
                </div>
              </td>

              <td class="align-middle">
                <div class="d-flex align-items-left">
                    <p style="font-size: 14px">{{ Str::limit($transaction->project->title, $limit = 19, $end = '...') }}</p>
                </div>
              </td>

              <td class="align-middle"><span style="font-size: 14px" class="text-success pr-1"></span>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
              
              @if (Auth::user()->manager || Auth::user()->is_admin)
              <td class="align-middle"><button style="background: #00A75A; color: #fff"" class="btn btn-sm">@if ($transaction->final_status == 0)
                  Pending
              @else
                  Paid
              @endif</button>
              </td>
              @else
              <td class="align-middle">@if ($transaction->final_status == 0)
                <a href="#" style="background: #00A75A; color: #fff" class="btn btn-sm">Pending</a>
                @else
                <button href="#" style="background: #00A75A; color: #fff"" class="btn btn-sm">Paid</button>
              @endif
              </td>
              @endif

              <td class="align-middle">{{ $transaction->plots }}</td>

              <td class="align-middle">
                @if (Auth::user()->is_admin)
                  <form class="p-0 m-0" method="GET" action="{{ route('allocate') }}">
                      @csrf
                      <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                      <button type="submit" class="btn btn-sm badge badge-green" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
                        @if ($transaction->allocation_status == "Pending")
                          Allocate Plot
                            @else
                           {{ $transaction->allocation_status }}
                        @endif
                      </button>
                  </form> 
                @else
                  @if ($transaction->allocation_status == "Pending")
                    Not Allocated
                    @else
                    {{ $transaction->allocation_status }}
                  @endif
                @endif
              </td>

              <td class="align-middle">
                @if ($transaction->allocation_status == "Pending")
                    @if (Auth::user()->is_admin || Auth::user()->manager)
                    <form class="p-0 m-0" method="GET" action="{{ route('allocate') }}">
                      @csrf
                      <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                        <button type="submit" class="btn btn-sm badge badge-green" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
                          @if ($transaction->allocation_status == "Pending")
                            Allocate Plot
                              @else
                            {{ \Carbon\Carbon::parse($transaction->expiry_date)->format('d M Y') }}
                          @endif
                        </button>
                    </form> 
                        @else
                        Allocation in Review.
                    @endif
                @else
                {{ \Carbon\Carbon::parse($transaction->expiry_date)->format('d M Y') }}
                @endif
              </td>
            
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
@endsection
