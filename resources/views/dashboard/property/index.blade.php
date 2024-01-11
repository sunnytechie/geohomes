<title>Properties for sale or rent with geohomes</title>
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
                    {!! session('message') !!}
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
        <h3 style="color: #00A75A">Properties</h3>
        <div class="align-self-center">
          <a href="{{ route('properties.create') }}" class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Add New Property</span></a>
        </div>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">title</th>
              <th class="py-6">Posted Date</th>
              <th class="py-6">Status</th>
              <th class="no-sort py-6">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($properties as $property)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <div class="usr-img-frame mr-2">
                    <img alt="avatar" class="img-fluid w-30px"
                             src="/storage/{{ $property->image }}">
                  </div>
                  <p class="align-self-center mb-0 user-name">{{ Str::limit($property->title, 20) }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($property->created_at)->format('d M Y') }}</td>

              <td class="align-middle"><span class="badge badge-green text-capitalize">
                @if ($property->status == 1)
                    Published
                @else
                    Unpublished
                @endif
                </span></td>


                <td class="d-flex">
                    <a class="hover-primary border-right btn btn-secondary rounded-0 btn-sm" title="Edit" href="{{ route('properties.edit', $property->id) }}"><i class="fal fa-pencil-alt"></i> Edit</a>
                    <form class="m-0 p-0" method="post" action="{{ route('properties.destroy', $property->id) }}">
                      @method('delete')
                      @csrf
                      <button class="hover-danger border-right btn btn-danger rounded-0 btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this estate?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <form class="m-0 p-0" method="post" action="{{ route('item.visibility', ['item' => "property", 'id' => $property->id]) }}">
                        @csrf
                        @method('put')
                        @if ($property->status == 1)
                        <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to unpublish this property?')">Unpublish</button>
                        @else
                        <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to publish this property?')">Publish</button>
                        @endif
                    </form>
                    {{-- <a href="#" data-toggle="tooltip" title="Delete" class="d-inline-block fs-18 text-muted hover-primary"><i class="fal fa-trash-alt"></i></a> --}}

                  </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
