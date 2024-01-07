@extends('layouts.admin')
<title>Modify About FBILTD Information</title>
@section('content')
<style>
    .page-content {
        background: #F8F8F8;
    }

    /* Custom style to differentiate active button */
    .btn-group .btn-primary.active {
      background-color: #007bff;
      color: #fff;
    }

    address.active {
      background-color: #007bff;
      color: #fff;
    }
</style>

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

<div class="col-md-8 mt-7 offset-md-1">
<div class="btn-group">
    <a class="btn btn-md btn-primary @if(request()->routeIs('gh.about.index')) active @endif" href="{{ route('gh.about.index') }}">General</a>
    <a class="btn btn-md btn-primary @if(request()->routeIs('gh.services')) active @endif" href="{{ route('gh.services') }}">Services</a>
    <a class="btn btn-md btn-primary @if(request()->routeIs('gh.teams')) active @endif" href="{{ route('gh.teams') }}">Team and Staff</a>
    <a class="btn btn-md btn-primary @if(request()->routeIs('gh.gallery')) active @endif" href="{{ route('gh.gallery') }}">Gallery/Images</a>
</div>
</div>


<div class="col-md-10 offset-md-1">
    <div class="px-3 px-lg-6 px-xxl-13 py-4 shadow-sm my-4">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4 style="color: #00A75A">Services</h4>
        </div>

        <form action="{{ route('gh.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Content</label>
                <textarea class="form-control" id="editor" name="description" rows="5">{{ old('description')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>


    <div class="table-responsive">
        <table id="invoice-list" class="table table-hover table-sm bg-white border rounded-lg">
        <thead>
            <tr role="row">
            <th>title</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr role="row">

                <td class="align-middle px-2">{{ $service->title }}</td>

                <td class="align-middle d-flex align-items-center">
                    <div class="btn-group">
                    <a href="{{ route('gh.services.edit', $service->id) }}" class="btn btn-sm btn-primary" style="border-top-right-radius: 0; border-bottom-right-radius: 0"><i class="fa fa-edit"></i></a>

                    <form class="m-0 p-0" action="{{ route('gh.services.delete', $service->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fa fa-trash"></i></button>
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
