<title>GeoHomes Subscribers list</title>
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
      <h3 style="color: #00A75A">Subscribers emails</h3>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">Email</th>
              <th class="py-6">Registered on</th>
              {{-- <th class="no-sort py-6">Actions</th> --}}
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($subscribers as $data)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $data->email }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
