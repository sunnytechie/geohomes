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
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">Name</th>
              <th class="py-6">Brand</th>
              <th class="py-6">Registed On</th>
              <th class="py-6">Subscribe status</th>
              {{-- <th class="no-sort py-6">Actions</th> --}}
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($agents as $agent)
            <tr role="row">
              <td>{{ $id++ }}</td>    
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  @isset($agent->user)
                    <p class="align-self-center mb-0 user-name">{{ $agent->user->name }}</p>
                  @endisset
                </div>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $agent->agent_brand_name }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($agent->created_at)->format('d M Y') }}</td>

              <td class="align-middle"><span class="badge badge-green text-capitalize">@if ($agent->subscribed == 1)
                  Subscribed
              @else
                  Not Subscribed
              @endif</span></td>
              
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
