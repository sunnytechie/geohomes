@extends('layouts.admin')

@section('content')

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
        <h3 style="color: #654321">Bookings</h3>

      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">title</th>
              <th class="py-6">Qtty</th>
              <th class="py-6">Phone</th>
              <th class="py-6">Address</th>
              <th class="py-6">Location</th>
              <th class="py-6">Posted Date</th>
              <th class="py-6">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($bookings as $booking)
            <tr role="row">
                <td>{{ $id++ }}</td>

                <td class="align-middle">{{ $booking->building->title }}</td>

                <td class="align-middle">{{ $booking->qtty }}</td>
                <td class="align-middle">{{ $booking->phone }}</td>
                <td class="align-middle">{{ $booking->address }}</td>
                <td class="align-middle">{{ $booking->location }}</td>
                <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                <td class="align-middle">
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this booking?')" class="btn btn-sm btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
