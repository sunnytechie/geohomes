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

  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <div class="card my-10">
                <div class="card-header">
                    <h5 class="text-center">Create New Advert</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('advert.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Identify the advert">
                        </div>
                        <div class="form-group">
                            <label for="title">Link</label>
                            <input type="url" name="link" id="link" class="form-control" placeholder="Link the advert page">
                        </div>
                        <div class="form-group">
                            <label for="image">Thumbnail (Picture size: 1920x1000)</label>
                            <input type="file" name="image" id="image" class="form-control dropify" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
