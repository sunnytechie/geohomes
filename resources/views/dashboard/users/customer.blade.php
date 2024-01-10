<title>Customer details {{ $user->name }}</title>
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

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6">
        <div class="row">
            <div class="col-md-7 shadow offset-md-2">
                <div style="padding: 15px; background: #fff">
                    <div class="text-center" style="font-size: 18px; color: #654321; font-weight:700">Customer details and histories</div>
                    @isset($user->image)
                        <img src="/storage/{{ $user->image }}" style="width: 80px; height: 80px; border-radius: 50%; margin: 10px auto; display: block" alt="avatar">
                    @endisset
                    <div>Name: {{ $user->name }}</div>
                    <div>Email: {{ $user->email }}</div>
                    <div>Phone: {{ $user->phone }}</div>
                    <div class="my-3"></div>
                    <div><b>Transactions (Subscription on Estates) History</b></div>
                    @if ($transactions->count() == 0)
                        <div style="color: #82f60f">No transaction history</div>
                    @endif
                    @foreach ($transactions as $transaction)
                        <div class="shadow mt-3 p-4">
                          <div>TxRef: {{ $transaction->tx_ref }}</div>
                          <div>Plots Number: {{ $transaction->plots }}</div>
                          <div>Allocation status: {{ $transaction->allocation_status }}</div>
                          <div>Project Name: {{ $transaction->project->title ?? "deleted" }}</div>
                          @if ($transaction->pdf !== null)
                            <a href="/pdfs/{{ $transaction->pdf }}" class="btn btn-sm" download>Download Allocation file</a>
                          @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
      </div>


    </div>
@endsection
