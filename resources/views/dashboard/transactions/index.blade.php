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

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <h3 style="color: #00A75A">Transaction / Subscriptions</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-2">@if (Auth::user()->is_admin)Subscriber Info @else Reference @endif</th>
              <th class="py-2">Project Name</th>
              <th class="py-2">Paid on</th>
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
                  @if ($transaction->status != "Pending")
                      <a style="background: #00A75A; color: #fff" class="btn btn-sm" href="/pdfs/{{ $transaction->pdf }}" download>Download Allocation Paper</a>
                  @endif
               
                  
                </div>
              </td>

              <td class="align-middle">
                <div class="d-flex align-items-left">
                    <p style="font-size: 14px">{{ Str::limit($transaction->project->title, $limit = 19, $end = '...') }}</p>
                </div>
              </td>

              <td class="align-middle"><span style="font-size: 14px" class="text-success pr-1"></span>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
              
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
                            Expires: {{ $transaction->expiry_date }}
                          @endif
                        </button>
                    </form> 
                        @else
                        Allocation in Review.
                    @endif
                @else
                Expires: {{ $transaction->expiry_date }}
                @endif
              </td>
            
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
@endsection
