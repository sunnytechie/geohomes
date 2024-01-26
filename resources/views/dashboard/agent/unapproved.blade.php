<title>FBILTD Registered Agent</title>
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
      <h3 style="color: #654321">Agents / Users</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-sm table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th style="width: 35px;">S/N</th>
              <th>Name</th>
              <th>Registed</th>
              {{-- <th>Agent<span class="ml-1">Type</span></th> --}}
              {{--
              <th>CAC</th>
              <th>RC.No</th> --}}
              <th class="no-sort">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($agents as $agent)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td>
                  @isset($agent->user)
                    <span class="align-self-center mb-0 user-name">{{ $agent->user->name }}</span> <br>
                    {{-- <span class="align-self-center mb-0 user-name">{{ $agent->user->email }}</span> <br>
                    <span class="align-self-center mb-0 user-name">{{ $agent->user->phone }}</span> <br> --}}
                  @endisset
              </td>
              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($agent->created_at)->format('d M Y') }}</td>
              {{-- <td class="align-middle">
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $agent->user->agent_type ?? "Not found" }}</p>
                </div>
              </td>

              <td class="align-middle">
                @isset($agent->user->cac)
                @if ($agent->user->cac_extention == "image")
                    <a class="btn btn-sm" style="background: #654321; color: #ffffff" href="/storage/{{ $agent->user->cac }}" download>Download<span class="ml-1">CAC Image</span></a>
                @else
                <a class="btn btn-sm" style="background: #654321; color: #ffffff" href="/{{ $agent->user->cac }}" download>Download<span class="ml-1">CAC Doc</span></a>
                @endif
                @else
                    <div class="text-black">Not found</div>
                @endisset

              </td>
              <td class="align-middle">
                @isset($agent->user->rc_no)
                <span class="badge badge-green text-capitalize">
                    {{ $agent->user->rc_no }}
                    </span>
                @else
                <div class="text-black">Not found</div>
                @endif
              </td> --}}
              <td class="btn-group">
                @isset($agent->user)
                <a class="btn btn-sm rounded-0 btn-primary" href="{{ route('show.partner.details', $agent->user->id) }}">View details</a>
                @endisset
                <form class="m-0 p-0" method="post" action="{{ route('approve.agent', $agent->id) }}">
                    @csrf

                    @if ($agent->approval == "approved")
                    <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to revoke this approval?')">Revoke<span class="ml-1">Approval</span></button>
                    @else
                    <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to approve this agent?')">Approve<span class="ml-1">Agent</span></button>
                    @endif

                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
