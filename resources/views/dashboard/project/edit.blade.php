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

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Edit Project
            </h2>
            <p class="mb-1">Adding a new project and publishing it will put it on the homepage.</p>
        </div>
        <div class="collapse-tabs new-property-step">
            <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">

                <li class="nav-item col">
                    <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab" aria-controls="description" aria-selected="true"><span class="number">1.</span> Description</a>
                </li>

                <li class="nav-item col">
                    <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab" aria-controls="media" aria-selected="false"><span class="number">2.</span> Media</a>
                </li>

            </ul>

            <div class="tab-content shadow-none p-0">

                <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div id="collapse-tabs-accordion">
                        <div class="tab-pane tab-pane-parent fade show active px-0" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="card bg-transparent border-0">
                                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-description">
                                    <h5 class="mb-0">
                                        <button class="btn btn-lg collapse-parent btn-block border shadow-none" data-toggle="collapse" data-number="1." data-target="#description-collapse" aria-expanded="true" aria-controls="description-collapse">
                                            <span class="number">1.</span> Description
                                        </button>
                                    </h5>
                                </div>
                                <div id="description-collapse" class="collapse show collapsible" aria-labelledby="heading-description" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Projects Description</h3>
                                                        <p class="card-text mb-5">Upload new project.</p>
                                                        <div class="form-group">
                                                            <label for="title" class="text-heading">Title <span class="text-muted">(mandatory)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('title') is-invalid @enderror" id="title" value="{{ $project->title ?? old('title') }}" name="title" oninput="toggleButton()">

                                                            @if ($errors->has('title'))
                                                                <div id="titleHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('title') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price" class="text-heading">Price <span class="text-muted">(mandatory)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('price') is-invalid @enderror" id="price" value="{{ $project->price ?? old('price') }}" name="price" placeholder="Numerical Value only (Don't add comma)">

                                                            @if ($errors->has('price'))
                                                                <div id="priceHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('price') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="address" class="text-heading">Address</label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('address') is-invalid @enderror" id="address" value="{{ $project->address ?? old('address') }}" name="address" oninput="toggleButton()">

                                                            @if ($errors->has('address'))
                                                                <div id="addressHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('address') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="state" class="text-heading">State <span class="text-muted">(Optional)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('state') is-invalid @enderror" id="state" value="{{ $project->state ?? old('state') }}" name="state" oninput="toggleButton()">

                                                            @if ($errors->has('state'))
                                                                <div id="stateHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('state') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="video" class="text-heading">Video link</label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('video') is-invalid @enderror" id="video" value="{{ $project->video ?? old('video') }}" placeholder="Cd8QIG9vipQ" name="video" oninput="toggleButton()">

                                                            @if ($errors->has('video'))
                                                                <div id="videoHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('video') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="map_embed_code" class="text-heading">Map Embed Code <span class="text-muted">(mandatory). Recommended: map height 200, width 100%</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('map_embed_code') is-invalid @enderror" id="map_embed_code" value="{{ $project->map_embed_code ?? old('map_embed_code') }}" name="map_embed_code" placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2809172241614!2d7.582259024183124!3d6.611976372130524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044b98c052a36dd%3A0x3da41f1807279f9d!2s400103%2C%20Agbogazi%20Nike%2C%20Enugu!5e0!3m2!1sen!2sng!4v1684045877063!5m2!1sen!2sng" oninput="toggleButton()">

                                                            @if ($errors->has('map_embed_code'))
                                                                <div id="map_embed_codeHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('map_embed_code') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group mb-0">
                                                            <label for="description-01" class="text-heading">Description <span class="text-muted">(Optional)</span></label>
                                                            <textarea class="form-control border-0 @error('description') is-invalid @enderror" rows="5" name="description" id="description-01">{{ $project->description ?? old('description') }}</textarea>

                                                            @if ($errors->has('description'))
                                                                <div id="descriptionHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('description') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-lg btn-primary next-button">Next step
                                                <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane tab-pane-parent fade px-0" id="media" role="tabpanel" aria-labelledby="media-tab">
                            <div class="card bg-transparent border-0">
                                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-media">
                                    <h5 class="mb-0">
                                        <button class="btn btn-lg collapse-parent btn-block border shadow-none" data-toggle="collapse" data-number="2." data-target="#media-collapse" aria-expanded="true" aria-controls="media-collapse">
                                            <span class="number">2.</span> Media
                                        </button>
                                    </h5>
                                </div>
                                <div id="media-collapse" class="collapse collapsible" aria-labelledby="heading-media" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Upload phot of project</h3>
                                                        <p class="card-text mb-5">Recommended size: 1080x1080 <span class="text-muted">(Mandatory)</span></p>
                                                        <div class="text-center py-5">

                                                                <input type="file" name="image" id="image" class="dropify" data-default-file="/storage/{{ $project->image ?? old('image') }}" data-allowed-file-extensions="jpg jpeg png">

                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <div id="imageHelp" class="form-text text-danger">
                                                                <div>{{ $errors->first('image') }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">
                                                                    Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080
                                                                </p>
                                                                <div class="text-center py-5">

                                                                    <input type="file" name="file1" id="file1" class="dropify" data-default-file="/storage/{{ $project->file1 ?? old('file1') }}" data-allowed-file-extensions="jpg jpeg png">

                                                                </div>
                                                                @if ($errors->has('file1'))
                                                                <div id="file1Help" class="form-text text-danger">
                                                                    <div>{{ $errors->first('file1') }}</div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">
                                                                    Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080
                                                                </p>
                                                                <div class="text-center py-5">

                                                                    <input type="file" name="file2" id="file2" class="dropify" data-default-file="/storage/{{ $project->file2 ?? old('file2') }}" data-allowed-file-extensions="jpg jpeg png">

                                                                </div>
                                                                @if ($errors->has('file2'))
                                                                <div id="file2Help" class="form-text text-danger">
                                                                    <div>{{ $errors->first('file2') }}</div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">
                                                                    Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080
                                                                </p>
                                                                <div class="text-center py-5">

                                                                    <input type="file" name="file3" id="file3" class="dropify" data-default-file="/storage/{{ $project->file3 ?? old('file3') }}" data-allowed-file-extensions="jpg jpeg png">

                                                                </div>
                                                                @if ($errors->has('file3'))
                                                                <div id="file3Help" class="form-text text-danger">
                                                                    <div>{{ $errors->first('file3') }}</div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">
                                                                    Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080
                                                                </p>
                                                                <div class="text-center py-5">

                                                                    <input type="file" name="file4" id="file4" class="dropify" data-default-file="/storage/{{ $project->file4 ?? old('file4') }}" data-allowed-file-extensions="jpg jpeg png">

                                                                </div>
                                                                @if ($errors->has('file4'))
                                                                <div id="file4Help" class="form-text text-danger">
                                                                    <div>{{ $errors->first('file4') }}</div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary mb-3" type="submit">
                                                Save Updates
                                            </button>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    var myDropzone = new Dropzone("#myDropzone", {
    autoProcessQueue: false,
    // Other configuration options
    // ...
});
</script>

<script>

</script>

@endsection
