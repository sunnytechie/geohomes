<title>FBILTD - Admin management</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
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

      <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('buildings.update', $building->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card mb-6">
              <div class="card-body p-6">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Manage Building materials</h3>
                  <p class="card-text mb-5">Manage New materials</p>


                  <div class="form-group">
                      <label for="title" class="text-heading">Title <span class="text-muted">(mandatory)</span></label>
                      <input type="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="title" id="title" value="{{ $building->title ?? old('title') }}" name="title">

                      @if ($errors->has('title'))
                          <div id="titleHelp" class="form-text text-danger">
                              <div>{{ $errors->first('title') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                    <label for="price" class="text-heading">Price <span class="text-muted">(mandatory)</span></label>
                    <input type="price" class="form-control form-control-lg @error('price') is-invalid @enderror" placeholder="price" id="price" value="{{ $building->price ?? old('price') }}" name="price">

                    @if ($errors->has('price'))
                        <div id="priceHelp" class="form-text text-danger">
                            <div>{{ $errors->first('price') }}</div>
                        </div>
                    @endif
                </div>

                  <div class="form-group">
                    <label for="desription" class="text-heading">Desription <span class="text-muted">*</span></label>
                    <textarea class="form-control" name="description" id="description" cols="4" placeholder="Write here..." rows="4">{{ $building->description ?? old('description') }}</textarea>

                    @if ($errors->has('description'))
                          <div id="descriptionHelp" class="form-text text-danger">
                              <div>{{ $errors->first('description') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                    <input type="file" name="file" id="file" class="dropify" data-default-file="/storage/{{ $building->file }}" data-allowed-file-extensions="jpg jpeg png">

                    @if ($errors->has('file'))
                        <div id="fileHelp" class="form-text text-danger">
                            <div>{{ $errors->first('file') }}</div>
                        </div>
                    @endif
                  </div>


                  <div class="form-group">
                    <button class="btn btn-lg btn-primary my-3 w-100">Update</button>
                  </div>


              </div>
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </main>

  <script>
    var myDropzone = new Dropzone("#myDropzone", {
    autoProcessQueue: false,
    // Other configuration options
    // ...
});
</script>
@endsection
