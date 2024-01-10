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
            <div class="col-md-8">
                <div style="padding: 15px; background: #fff">
                    <div style="font-size: 18px; color: #313030; font-weight:700">Schedule {{ $inspect->user->name }} for Inspection.</div>
                    <form action="{{ route('scheduleUpdate', $inspect->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="inspect_id" value="{{ $inspect->id }}">
                        <div class="from-group mb-3">
                            <label for="schedule_date">Schedule Date</label>
                            <input type="date" class="form-control @error('schedule_date') is-invalid @enderror form-control-lg border-0" id="schedule_date" name="schedule_date" placeholder="Schedule date">
                    
                            @error('schedule_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="spacer p-2"></div>

                        <div class="from-group mb-3">
                            <label for="schedule_time">Schedule Date</label>
                            <input type="time" class="form-control @error('schedule_time') is-invalid @enderror form-control-lg border-0" id="schedule_time" name="schedule_time" placeholder="Schedule date">
                    
                            @error('schedule_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="spacer p-2"></div>

                        <div class="form-group mt-3">
                            <button class="btn w-100 w-md-50 btn-md p-2" style="background: #654321; color:#fff">Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
      
    </div>
@endsection
