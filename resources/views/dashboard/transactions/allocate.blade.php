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
            <div class="col-md-7 offset-md-2">
                <div style="padding: 15px; background: #fff">
                    <div style="font-size: 18px; color: #313030; font-weight:700">Allocate Plot.</div>
                    <form action="{{ route('allocatePost') }}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                        <div class="from-group mb-3">
                            <label for="plot">Allocate a plot to Subscriber: <strong>{{ $transaction->user->name }}</strong> <br> subscribed to Estate: <strong>{{ $transaction->project->title }}</strong></label>

                            <select name="plot" id="plot" class="form-control border-0 shadow-none form-control-lg selectpicker">
                                @foreach ($plots as $plot)
                                    <option value="{{ $plot->id }}">{{ $plot->title }}</option>
                                @endforeach
                            </select>

                              @if ($plots->count() == 0)
                                <div class="text-center mt-5">You do not have any plots left to allocate, kindly <a href="{{ route('plots.create') }}">Add new plots</a> to this estate before allocating it to this customer.</div>
                              @endif                            
                        </div>

                        <div class="spacer p-2"></div>

                        <div class="form-group mt-3">
                            <button class="btn w-100 w-md-50 btn-md p-2" @if ($plots->count() == 0) disabled @endif style="background: #00A75A; color:#fff">Allocate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
      
    </div>
@endsection
