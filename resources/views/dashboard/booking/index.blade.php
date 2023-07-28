@extends('layouts.admin')

@section('content')

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6 d-flex justify-content-between align-items-center">
        <h3 style="color: #00A75A">Bookings</h3>
        
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

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
@endsection
