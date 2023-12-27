<title>Geo-Home Users Registered</title>
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
      <h3 style="color: #00A75A">Agents / Users</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover table-sm bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th>S/N</th>
              <th>Name</th>
              <th>Subscribe status</th>
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
                <div class="d-flex align-items-center">
                  @isset($agent->user)
                    <p class="align-self-center mb-0 user-name">{{ $agent->user->name }}</p>
                  @endisset
                </div>
              </td>
              {{-- <td>
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $agent->agent_brand_name }}</p>
                </div>
              </td>

              <td><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($agent->created_at)->format('d M Y') }}</td> --}}

              <td><span class="badge badge-green text-capitalize">@if ($agent->subscribed == 1)
                    Subscribed
                    @else
                        Not Subscribed
                    @endif</span>
                </td>

                <td class="d-flex items-align-center">
                    @isset($agent->user)
                    <a class="btn btn-sm rounded-0 btn-primary" href="{{ route('show.partner.details', $agent->user->id) }}">View details</a>
                    @endisset
                    <form class="m-0 p-0" method="post" action="{{ route('approve.agent', $agent->id) }}">
                        @csrf
                    @if ($agent->approval == "approved")
                    <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to revoke this approval?')">Revoke<span class="ml-1">Approval</span></button>
                    @else
                    <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to approve this agent?')">Approve<span class="ml-1">Agent</span></button>
                    @endif
                    </form>

                    <form class="m-0 p-0" action="{{ route('registered.agents.destroy', $agent->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this agent?')" class="btn btn-sm btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fa fa-trash"></i> Trash</button>
                    </form>
                </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- <div class="mt-6">
        <nav>
          <ul class="pagination rounded-active justify-content-center">
            <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item">...</li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#"><i
                class="far fa-angle-double-right"></i></a></li>
          </ul>
        </nav>
        <div class="text-center mt-2">6-10 of 29 Results</div>
      </div> --}}
    </div>
@endsection
