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
            <div class="col-md-7 shadow offset-md-2">
              @if ($transaction->allocation_status == "Pending")
                <div style="padding: 15px; background: #fff">
                    <div style="font-size: 18px; color: #000000; font-weight:700">Allocate Plot.</div>
                    <form action="{{ route('allocatePost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                        <div class="from-group mb-3">
                            <label for="plot">Allocate a plot to Subscriber: <strong style="color: #00A75A">{{ $transaction->user->name }}</strong> <br> subscribed to Estate: <strong style="color: #00A75A">{{ $transaction->project->title }}</strong></label>
                            <p>You are expected to select maximum of <strong style="color: #00A75A">{{ $transaction->plots }} plots.</strong></p>
                            {{-- <select name="plot" id="plot" class="form-control border-0 shadow-none form-control-lg selectpicker">
                            </select>   --}}
                              @foreach ($plots as $plot)
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customCheck{{ $plot->id }}" name="plots[]" value="{{ $plot->id }}">
                                      <label class="custom-control-label" for="customCheck{{ $plot->id }}">{{ $plot->title }}</label>
                                    </div>
                                @endforeach
                            

                              @if ($plots->count() == 0)
                                <div class="mt-3" style="color: #00A75A">You do not have any plots left to allocate, kindly <a href="{{ route('plots.create') }}">Add new plots</a> to this estate before allocating it to this customer.</div>
                              @endif                            
                        </div>

                        <div><strong style="color: #00A75A">Information that will be contained in the Email for the customer:</strong></div>
                        <div class="form-group">
                          
                          <label for="plot_id">Plot ID:</label>
                          <input class="form-control form-control-lg" type="text" id="plot_id" value="{{ old('plot_id') }}" name="plot_id" placeholder="005 (Will be sent to the customer)">
                      
                          @error('plot_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                          
                        <label for="plot_names">Plot Names:</label>
                        <input class="form-control form-control-lg" type="text" id="plot_names" value="{{ old('plot_names') }}" name="plot_names" placeholder="Ex. 2-10 (Will be sent to the customer)">
                    
                        @error('plot_names')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group">
                          
                        <label for="pdf">Upload downlable allocation file (Most be PDF):</label>
                        <input class="form-control form-control-lg" type="file" id="pdf" value="{{ old('pdf') }}" name="pdf">
                    
                        @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                        <div class="spacer p-2"></div>

                        <div class="form-group mt-3">
                            <button class="btn w-100 w-md-50 btn-md p-2" @if ($plots->count() == 0) disabled @endif style="background: #00A75A; color:#fff">Allocate</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="alert alert-primary mt-3 text-center" role="alert">
                  <strong style="color: #00A75A">Allocated!</strong> This Transaction has been Allocated and has/will expired: {{ $transaction->expiry_date }}
                </div>
                
              @endif


            </div>
        </div>
      </div>
      
      
    </div>
@endsection
