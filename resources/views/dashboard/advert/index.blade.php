@extends('layouts.admin')
<title>Adverts and publications</title>
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
        <h3 style="color: #00A75A">Adverts</h3>
        <a href="{{ route('advert.create') }}" class="btn btn-primary">Create</a>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover table-sm bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th>title</th>
              <th>Preview</th>
              <th>Published</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($adverts as $advert)
            <tr role="row">

                <td class="align-middle">{{ $advert->title }}</td>

                <td class="align-middle"><img height="50" width="50" src="/storage/{{ $advert->thumbnail }}" alt=""></td>

                <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($advert->created_at)->format('d M Y') }}</td>

                <td class="align-middle d-flex align-items-center">
                    {{-- <a href="{{ route('advert.edit', $advert->id) }}" class="btn btn-sm btn-primary" style="border-top-right-radius: 0; border-bottom-right-radius: 0"><i class="fa fa-edit"></i></a> --}}
                    
                    <form class="m-0 p-0" action="{{ route('advert.destroy', $advert->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Advert?')" class="btn btn-sm btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
