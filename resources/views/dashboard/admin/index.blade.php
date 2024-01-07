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
      <div class="mb-6 d-flex justify-content-between align-items-center">
        <h3 style="color: #00A75A">Admins / Moderators</h3>
        <div class="align-self-center">
          <a href="{{ route('admins.create') }}" class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Authenticate New Admin</span></a>
        </div>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">Name</th>
              <th class="py-6">Created Date</th>
              <th class="py-6">Role</th>
              <th class="no-sort py-6">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
            $id = 1;
        @endphp
            @foreach ($admins as $admin)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $admin->name }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($admin->created_at)->format('d M Y') }}</td>

              <td class="align-middle"><span class="badge badge-green text-capitalize">{{ $admin->role }}</span></td>

              <td class="align-middle">
                <div class="d-flex align-items-center">
                    <form class="m-0 p-0 border-right" method="post" action="{{ route('block.unblock.user', $admin->id) }}">
                        @csrf
                        @if (!$admin->blocked)
                        <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to block this admin?')">Block<span class="ml-1">Admin</span></button>
                        @else
                        <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to unblock this admin?')">Unblock<span class="ml-1">Admin</span></button>
                        @endif
                    </form>

                    <a class="btn rounded-0 btn-sm btn-info border-right" href="{{ route('admins.edit', $admin->id) }}" data-toggle="tooltip" title="Edit"><i class="fal fa-pencil-alt"></i> Update</a>

                    <form class="m-0 p-0" method="post" action="{{ route('admins.destroy', $admin->id) }}">
                    @method('delete')
                    @csrf
                    <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user completely from this application?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>

                {{-- <a href="#" data-toggle="tooltip" title="Delete" class="d-inline-block fs-18 text-muted hover-primary"><i class="fal fa-trash-alt"></i></a> --}}

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
