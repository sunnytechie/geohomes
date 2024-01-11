@extends('layouts.admin')
<title>Estate for sale or rent with geohomes</title>

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
        <h3 style="color: #00A75A">Estates / Projects</h3>
        <div class="align-self-center">
          <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg" tabindex="0" aria-controls="invoice-list"><span>Add New Estate</span></a>
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
            @foreach ($projects as $project)
            <tr role="row">
              <td>{{ $id++ }}</td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <div class="usr-img-frame mr-2">
                    <img alt="avatar" class="img-fluid w-30px"
                             src="/storage/{{ $project->image }}">
                  </div>
                  <p class="align-self-center mb-0 user-name">{{ Str::limit($project->title, 20) }}</p>
                </div>
              </td>

              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>{{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</td>

              <td class="align-middle">
                <span class="badge badge-green text-capitalize">
                    @if ($project->status == 1)
                        published
                    @else
                        unpublished
                    @endif
                </span>
                </td>

              <td class="d-flex">
                <a class="hover-primary border-right btn btn-secondary rounded-0 btn-sm" title="Edit" href="{{ route('projects.edit', $project->id) }}"><i class="fal fa-pencil-alt"></i> Edit</a>
                <form class="m-0 p-0" method="post" action="{{ route('projects.destroy', $project->id) }}">
                  @method('delete')
                  @csrf
                  <button class="hover-danger border-right btn btn-danger rounded-0 btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this project?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
                <form class="m-0 p-0" method="post" action="{{ route('item.visibility', ['item' => "project", 'id' => $project->id]) }}">
                    @csrf
                    @method('put')
                    @if ($project->status == 1)
                    <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to unpublish this estate?')">Unpublish</button>
                    @else
                    <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to publish this estate?')">Publish</button>
                    @endif
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
