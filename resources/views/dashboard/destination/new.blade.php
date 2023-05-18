<title>GeoHomes Admin - Add new destination</title>
@extends('layouts.admin')
@section('content')

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Add new destination
            </h2>
            <p class="mb-1">Adding a new destination and publishing it will put it on the homepage.</p>
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
              
                <form method="POST" action="{{ route('destinations.store') }}" enctype="multipart/form-data">
                    @csrf

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
                                            <div class="col-lg-8 offset-md-2">

                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Destination Description</h3>
                                                        <p class="card-text mb-5">Upload new destination.</p>
                                                        <div class="form-group">
                                                            <label for="price_range" class="text-heading">Price Range <span class="text-muted">(mandatory)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('price_range') is-invalid @enderror" placeholder="From #300,000 to 400,000" id="price_range" value="{{ old('price_range') }}" name="price_range" oninput="toggleButton()">
                                                            
                                                            @if ($errors->has('price_range'))
                                                                <div id="price_rangeHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('price_range') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="state" class="text-heading">State <span class="text-muted">(mandatory)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0 @error('state') is-invalid @enderror" placeholder="Enugu" id="state" value="{{ old('state') }}" name="state" oninput="toggleButton()">
                                                            
                                                            @if ($errors->has('state'))
                                                                <div id="stateHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('state') }}</div>
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
                                            <div class="col-md-8 offset-md-2">
                                                <div class="card">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Upload photo of destination</h3>
                                                        <p class="card-text mb-5">Recommended size is portrait: 540 x 675 <span class="text-muted">(Mandatory)</span></p>
                                                        <div class="text-center py-5">
                                                            
                                                                <input type="file" name="image" id="image" class="dropify" data-allowed-file-extensions="jpg jpeg png">
                                                                
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <div id="imageHelp" class="form-text text-danger">
                                                                <div>{{ $errors->first('image') }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary mb-3" type="submit">
                                                Publish Project
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
    //function toggleButton() {
       // var input = document.getElementById("title");
        //var button = document.getElementById("disableUntilInputIsFilled");

        //if (input.value.trim() !== "") {
        //button.disabled = false;
       // } else {
        //button.disabled = true;
       // }
   // }
    </script>

@endsection
