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
      <div class="mb-6">
        <div class="row">
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
            <div class="d-flex form-group mb-0 align-items-center">
              <label for="invoice-list_length" class="d-block mr-2 mb-0">Results:</label>
              <select
                    name="invoice-list_length" id="invoice-list_length"
                    aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                    data-style="bg-white btn-lg h-52 py-2 border">
                <option value="7">7</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>
            </div>
            <div class="align-self-center">
                Subscribtions - Transactions
            </div>
          </div>
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
              <input type="text" class="form-control bg-transparent border-1x" placeholder="Search..." aria-label="" aria-describedby="basic-addon1">
              <div class="input-group-append position-absolute pos-fixed-right-center">
                <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i class="fal fa-search"></i></button>
              </div>
            </div>
            {{-- <div class="align-self-center">
              <button class="btn btn-danger btn-lg" tabindex="0"
                    aria-controls="invoice-list"><span>Delete</span></button>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-2">Subscriber Info</th>
              <th class="py-2">Project Name</th>
              <th class="py-2">Paid on</th>
              <th class="no-sort py-2">Plot</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($transactions as $transaction)
            <tr role="row">
              <td class="align-middle">
                <div class="d-flex align-items-left">
                  @if (Auth::user()->is_admin)
                  <p class="align-self-center mb-0 user-name" style="font-size: 14px">{{ $transaction->user->name }}<br>
                    <span style="font-size: 10px">{{ $transaction->user->email }}</span><br>
                  <span style="font-size: 10px">{{ $transaction->user->phone }}</span><br>
                  @endif
                  <span style="font-size: 12px">Transaction Ref: {{ $transaction->tx_ref }}</span>
                </p>
                  
                </div>
              </td>

              <td class="align-middle">
                <div class="d-flex align-items-left">
                    <p style="font-size: 14px">{{ Str::limit($transaction->project->title, $limit = 19, $end = '...') }}</p>
                </div>
              </td>

              <td class="align-middle"><span style="font-size: 14px" class="text-success pr-1"></span>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
              
              <td class="align-middle">
                @if (Auth::user()->is_admin)
                  <form class="p-0 m-0" method="GET" action="{{ route('allocate') }}">
                      @csrf
                      <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                      <button type="submit" class="btn btn-sm badge badge-green" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
                        @if ($transaction->plot_id == null)
                          Allocate Plot
                            @else
                           {{ $transaction->plot->title }}
                        @endif
                      </button>
                  </form> 
                @else
                  @if ($transaction->plot_id == null)
                    Not Allocated
                    @else
                    {{ $transaction->plot->title }}
                  @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
@endsection
