<title>FBILTD Estate plots</title>
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
        <h3 style="color: #654321">Land Plots</h3>
        <div class="align-self-center">
          <a href="{{ route('plots.create') }}" class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Add New Plot</span></a>
        </div>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="py-6">S/N</th>
              <th class="py-6">Name</th>
              <th class="py-6">Created Date</th>
              <th class="py-6">Project</th>
              <th class="py-6">Allocated to:</th>
              <th class="no-sort py-6">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
                    $id = 1;
                @endphp
            @foreach ($plots as $plot)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <p class="align-self-center mb-0 user-name">{{ $plot->title }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($plot->created_at)->format('d M Y') }}</td>

              <td class="align-middle"><span class="badge badge-green text-capitalize">{{ $plot->project->title ?? "Not found" }}</span></td>


              <td class="align-middle">
                @if ($plot->allocation_status == 0)
                  Not Allocated
                @endif
                @if ($plot->allocation_status == 1 && optional($plot->user)->name)
                    {{ $plot->user->name }}
                @endif
              </td>

              <td class="align-middle">
                <a href="{{ route('plots.edit', $plot->id) }}" data-toggle="tooltip" title="Edit" class="d-inline-block fs-18 text-muted hover-primary mr-5"><i class="fal fa-pencil-alt"></i></a>
                <form method="post" action="{{ route('plots.destroy', $plot->id) }}">
                  @method('delete')
                  @csrf
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this user completely from this application?')" class="btn btn-sm btn-default" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fa fa-trash"></i></button>
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
