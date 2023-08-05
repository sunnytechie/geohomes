<title>GeoHome Transactions</title>
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

  </div>


    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <h3 style="color: #00A75A">Completed Land Transaction</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-striped table-sm table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th>@if (Auth::user()->is_admin)Subscriber Info @else Reference @endif</th>
              <th>Project<span class="ml-1">Name</span></th>
              <th>Subscribed:</th>
              <th>Final<span class="ml-1">Payment</span></th>
              <th class="no-sort">No.<span class="ml-1">Plots</span></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($transactions as $transaction)
            <tr role="row">
              <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if ($transaction->allocation_status = "Allocated")
                        <a style="background: #00A75A; color: #fff" class="btn btn-sm mr-1" href="{{ route('generateInitialPdf', $transaction->id) }}">Initital<span class="ml-1">Paper</span></a>
                    @endif

                    @if ($transaction->final_status == 1)
                        <a style="background: #00A75A; color: #fff" class="btn btn-sm" href="{{ route('generateFinalPdf', $transaction->id) }}">Final<span class="ml-1">Paper</span></a>
                    @endif
                    </div>
              </td>

              <td class="align-middle">
                <div class="d-flex align-items-left">
                    <p style="font-size: 14px">{{ Str::limit($transaction->project->title, $limit = 12, $end = '...') }}</p>
                </div>
              </td>

              <td class="align-middle"><span style="font-size: 14px" class="text-success pr-1"></span>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>

              @if (Auth::user()->manager || Auth::user()->is_admin)
              <td class="align-middle">
                <button style="background: #00A75A; color: #fff"" class="btn btn-sm">@if ($transaction->final_status == 0)
                  Pending
                @else
                    Paid on {{ \Carbon\Carbon::parse($transaction->updated_at)->format('d M Y') }}
                @endif
                </button>
              </td>
              @else
              <td class="align-middle">@if ($transaction->final_status == 0)
                @php
                        $totalFee = $transaction->project->price * $transaction->plots;
                        $totalFee = $totalFee + 100000;
                    @endphp
                        <form action="{{ route('finalLandPayment', $transaction->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="amount" value="{{ $totalFee }}">
                      <button type="submit" class="btn btn-default btn-sm" style="background: #00A75A; color: #fff"">
                        <span>Pay</span><span class="mx-1">₦</span>{{ $totalFee }}
                      </button>
                    </form>
                @else
                <button style="background: #00A75A; color: #fff"" class="btn btn-sm">Paid</button>
                @endif
              </td>
              @endif

              <td class="align-middle">{{ $transaction->plots }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

@endsection
