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
     <h3 style="color: #00A75A">Schedules</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-2">Inspector</th>
              <th class="py-2">Project Name</th>
              <th class="py-2">Paid on</th>
              <th class="no-sort py-2">Schedule</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($inspections as $inspect)
            <tr role="row">
              <td class="align-middle">
                <div class="d-flex align-items-left">
                  @if (Auth::user()->is_admin)
                  <p class="align-self-center mb-0 user-name" style="font-size: 14px">{{ $inspect->user->name }}<br>
                    <span style="font-size: 12px">{{ $inspect->user->email }}</span><br>
                  <span style="font-size: 12px">{{ $inspect->user->phone }}</span><br>
                  @endif
                  <span style="font-size: 12px">inspect Ref: {{ $inspect->tx_ref }}</span>
                </p>

                </div>
              </td>

              <td class="align-middle">
                <div class="d-flex align-items-left">
                    <p style="font-size: 14px">{{ Str::limit($inspect->project->title ?? "Not found", $limit = 19, $end = '...') }}
                    </p>
                </div>
              </td>

              <td class="align-middle"><span style="font-size: 14px" class="text-success pr-1"></span>{{ \Carbon\Carbon::parse($inspect->created_at)->format('d M Y') }}</td>

              <td class="align-middle">
                @if (Auth::user()->is_admin)
                  <form class="p-0 m-0" method="GET" action="{{ route('schedulePost') }}">
                      @csrf
                      <input type="hidden" name="inspect_id" value="{{ $inspect->id }}">
                      <button type="submit" class="btn btn-sm badge badge-green" style="border-top-left-radius: 0; border-bottom-left-radius: 0">
                        @if ($inspect->schedule_status == 0)
                            Schedule
                            @else
                           Date: {{ \Carbon\Carbon::parse($inspect->schedule_date)->format('d M Y') }}, Time: {{ \Carbon\Carbon::createFromFormat('H:i:s', $inspect->schedule_time)->format('h:i A') }}
                        @endif
                      </button>
                  </form>
                @else
                  @if ($inspect->schedule_status == 0)
                        Not Scheduled
                        @else
                        Date: {{ \Carbon\Carbon::parse($inspect->schedule_date)->format('d M Y') }}, Time: {{ \Carbon\Carbon::createFromFormat('H:i:s', $inspect->schedule_time)->format('h:i A') }}
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
