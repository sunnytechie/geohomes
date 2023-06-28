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
              <th class="no-sort py-6 pl-6"><label
                    class="new-control new-checkbox checkbox-primary m-auto">
                  <input type="checkbox"
                       class="new-control-input chk-parent select-customers-info">
                </label></th>
              <th class="py-6">User Id</th>
              <th class="py-6">Name</th>
              <th class="py-6">Brand</th>
              <th class="py-6">Registed On</th>
              <th class="py-6">Subscribe status</th>
              {{-- <th class="no-sort py-6">Actions</th> --}}
            </tr>
          </thead>
          <tbody>

            @foreach ($agents as $agent)
            <tr role="row">
              <td class="checkbox-column py-6 pl-6"><label
                    class="new-control new-checkbox checkbox-primary m-auto">
                  <input type="checkbox" class="new-control-input child-chk select-customers-info">
                </label></td>
              <td class="align-middle"><span class="inv-number">#{{ $agent->id }}</span></td>
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
