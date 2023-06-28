<title>Submit new Property for sale or rent with geohomes</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
        <div class="mb-6">
            <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
            </h2>
            <p class="mb-1">Expand your real estate portfolio by adding a new property to your listings. This user-friendly platform makes it effortless to showcase your property's details and attract potential buyers or tenants.</p>
        </div>
        
            {{-- alert --}}
            {{-- session --}}
            @if (session('message'))
            <div class="px-3">
                <div class="row">
                <div class="col-md-12">
                    <div class="hide-from-mobile mt-2"></div>
                    
                        {{-- alert --}}
                        <div class="alert alert-info alert-dismissible fade show" role="alert" style="color: red">
                            There are errors with the informations you wannt to upload, please try again.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 10px; font-size: 12px">
                                <span aria-hidden="true">Close</span>
                            </button>
                        </div>
                    
                </div>
            </div>
            </div>
            @endif

        <div class="collapse-tabs new-property-step">
            <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6" role="tablist">
                <li class="nav-item col">
                    <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="description-tab" data-toggle="pill" data-number="1." href="#description" role="tab" aria-controls="description" aria-selected="true"><span class="number">1.</span> Description</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="media-tab" data-toggle="pill" data-number="2." href="#media" role="tab" aria-controls="media" aria-selected="false"><span class="number">2.</span> Media</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="location-tab" data-toggle="pill" data-number="3." href="#location" role="tab" aria-controls="location" aria-selected="false"><span class="number">3.</span> Location</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="detail-tab" data-toggle="pill" data-number="4." href="#detail" role="tab" aria-controls="detail" aria-selected="false"><span class="number">4.</span> Detail</a>
                </li>
                {{-- <li class="nav-item col">
                    <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block" id="amenities-tab" data-toggle="pill" data-number="5." href="#amenities" role="tab" aria-controls="amenities" aria-selected="false"><span class="number">5.</span> Amenities</a>
                </li> --}}
            </ul>

            <div class="tab-content shadow-none p-0">
                <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
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
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property
                                                            Description</h3>
                                                        <p class="card-text mb-5">Capture the essence of your property with a compelling description.</p>
                                                        <div class="form-group">
                                                            <label for="title" class="text-heading">Title <span class="text-muted">(mandatory)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0" placeholder="Name here..." id="title" value="{{ old('title') }}" name="title">

                                                            @if ($errors->has('title'))
                                                                <div id="titleHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('title') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <label for="description-01" class="text-heading">Description</label>
                                                            <textarea class="form-control border-0" rows="5" name="description" value="{{ old('description') }}" id="description-01" placeholder="Write here..."></textarea>

                                                            @if ($errors->has('description'))
                                                                <div id="descriptionHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('description') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Organize your Listings</h3>
                                                        <p class="card-text mb-5">Organize your properties effortlessly with the listed intuitive categorization.</p>
                                                        <div class="form-row mx-n2">
                                                            
                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2 mb-4 mb-md-0">
                                                                <div class="form-group mb-0">
                                                                    <label for="lint_in" class="text-heading">Listed in</label>
                                                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="lint_in" name="lint_in">
                                                                        <option>For Rent</option>
                                                                        <option>For Sale</option>
                                                                    </select>

                                                                    @if ($errors->has('lint_in'))
                                                                        <div id="lint_inHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('lint_in') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property</h3>
                                                        <p class="card-text mb-5">Set the right value for your property with accurate pricing.</p>
                                                        <div class="form-row mx-n2">

                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2 mb-4 mb-md-0">
                                                                <div class="form-group mb-0">
                                                                    <label for="category" class="text-heading">Category</label>
                                                                    @php
                                                                        $categories = ['Apartment', 'House', 'Office', 'Villa'];
                                                                    @endphp
                                                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="category" name="category">
                                                                        @foreach ($categories as $item)
                                                                        <option>{{ $item }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @if ($errors->has('category'))
                                                                        <div id="categoryHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('category') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                <div class="form-group">
                                                                    <label for="price" class="text-heading">Price
                                                                        in # <span class="text-muted">(only
                                                                            numbers)</span></label>
                                                                    <input type="text" class="form-control form-control-lg border-0" id="price" value="{{ old('price') }}" name="price" placeholder="100xxxxxx">

                                                                    @if ($errors->has('price'))
                                                                        <div id="priceHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('price') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
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

                                            <div class="col-lg-8 offset-md-2">
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Upload photo of project</h3>
                                                        <p class="card-text mb-5">Recommended size: 1080x1080. Max file size: 2MB <span class="text-muted">(Mandatory)</span></p>
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

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card mb-6">
                                                            <div class="card-body p-6">
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080. Max file size: 2MB</p>
                                                                <div class="text-center py-5">
                                                                    
                                                                        <input type="file" name="file1" id="file1" class="dropify" data-allowed-file-extensions="jpg jpeg png">
                                                                        
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
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080. Max file size: 2MB</p>
                                                                <div class="text-center py-5">
                                                                    
                                                                        <input type="file" name="file2" id="file2" class="dropify" data-allowed-file-extensions="jpg jpeg png">
                                                                        
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
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080. Max file size: 2MB</p>
                                                                <div class="text-center py-5">
                                                                    
                                                                        <input type="file" name="file3" id="file3" class="dropify" data-allowed-file-extensions="jpg jpeg png">
                                                                        
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
                                                                <h3 class="card-title mb-0 text-heading fs-14 lh-15">Upload photo of project</h3>
                                                                <p class="card-text mb-5">Recommended size: 1080x1080. Max file size: 2MB</p>
                                                                <div class="text-center py-5">
                                                                    
                                                                        <input type="file" name="file4" id="file4" class="dropify" data-allowed-file-extensions="jpg jpeg png">
                                                                        
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
                                        <div class="d-flex flex-wrap">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary next-button mb-3">Next step
                                                <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-pane-parent fade px-0" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <div class="card bg-transparent border-0">
                                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-location">
                                    <h5 class="mb-0">
                                        <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="3." data-target="#location-collapse" aria-expanded="true" aria-controls="location-collapse">
                                            <span class="number">3.</span> Location
                                        </button>
                                    </h5>
                                </div>
                                <div id="location-collapse" class="collapse collapsible" aria-labelledby="heading-location" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="row">
                                            <div class="col-lg-8 offset-md-2">
                                                <div class="card mb-6">
                                                    <div class="card-body p-6">
                                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Location</h3>
                                                        <p class="card-text mb-5">Infomation on where the property is located</p>
                                                        <div class="form-group">
                                                            <label for="address" class="text-heading">Address</label>
                                                            <input type="text" class="form-control form-control-lg border-0" placeholder="location address" id="address" value="{{ old('address') }}" name="address">
                                                        </div>
                                                        <div class="form-row mx-n2">
                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                <div class="form-group">
                                                                    <label for="state" class="text-heading">State</label>
                                                                    <input type="text" class="form-control form-control-lg border-0" id="state" placeholder="State" value="{{ old('state') }}" name="state">
                                                                
                                                                    @if ($errors->has('state'))
                                                                        <div id="stateHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('state') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                <div class="form-group">
                                                                    <label for="city" class="text-heading">City</label>
                                                                    <input type="text" class="form-control form-control-lg border-0" placeholder="write city..." id="city" value="{{ old('city') }}" name="city">
                                                                    
                                                                    @if ($errors->has('city'))
                                                                        <div id="cityHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('city') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mx-n2">
                                                            <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                <div class="form-group">
                                                                    <label for="zip" class="text-heading">Zip</label>
                                                                    <input type="text" class="form-control form-control-lg border-0" id="zip" name="zip" value="{{ old('zip') }}" placeholder="Zip code">
                                                                
                                                                    @if ($errors->has('zip'))
                                                                        <div id="zipHelp" class="form-text text-danger">
                                                                            <div>{{ $errors->first('zip') }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-md-0">
                                                            <label for="country" class="text-heading">Country
                                                            </label>
                                                            <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="country" name="country">
                                                                <option>Nigeria</option>
                                                                <option>Ghana</option>
                                                                <option>Cameroon</option>
                                                                <option>Kenya</option>
                                                            </select>

                                                            @if ($errors->has('country'))
                                                                <div id="countryHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('country') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary next-button mb-3">Next step
                                                <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-pane-parent fade px-0" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <div class="card bg-transparent border-0">
                                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-detail">
                                    <h5 class="mb-0">
                                        <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="4." data-target="#detail-collapse" aria-expanded="true" aria-controls="detail-collapse">
                                            <span class="number">4.</span> Detail
                                        </button>
                                    </h5>
                                </div>
                                <div id="detail-collapse" class="collapse collapsible" aria-labelledby="heading-detail" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="card mb-6">
                                            <div class="card-body p-6">
                                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Detail
                                                </h3>
                                                <p class="card-text mb-5">comprehensive and captivating property details.</p>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="size-in-ft" class="text-heading">Size in ft
                                                                <span class="text-muted">(only numbers)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="size_in_fit" value="{{ old('size_in_fit') }}" name="size_in_fit">
                                                        
                                                            @if ($errors->has('size_in_fit'))
                                                                <div id="size_in_fitHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('size_in_fit') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="lot_size_in_fit" class="text-heading">Lot size in ft <span class="text-muted">(only numbers)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="lot_size_in_fit" value="{{ old('lot_size_in_fit') }}" name="lot_size_in_fit">
                                                            
                                                            @if ($errors->has('lot_size_in_fit'))
                                                                <div id="lot_size_in_fitHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('lot_size_in_fit') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="room" class="text-heading">Rooms</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="room" name="rooms" value="{{ old('rooms') }}">
                                                            
                                                            @if ($errors->has('rooms'))
                                                                <div id="roomsHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('rooms') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="bedrooms" class="text-heading">Bedrooms</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}">

                                                            @if ($errors->has('bedrooms'))
                                                                <div id="size_in_fitHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('size_in_fit') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="bathrooms" class="text-heading">Bathrooms</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">

                                                            @if ($errors->has('bathrooms'))
                                                                <div id="bathroomsHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('bathrooms') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="garages" class="text-heading">Garages</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="garages" name="garages" value="{{ old('garages') }}">

                                                            @if ($errors->has('garages'))
                                                                <div id="garagesHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('garages') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="garage-size" class="text-heading">Garage size</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="garage_size" name="garage_size" value="{{ old('garage_size') }}">

                                                            @if ($errors->has('garage_size'))
                                                                <div id="garage_sizeHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('garage_size') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="year-built" class="text-heading">Year built
                                                                <span class="text-muted">(numeric)</span></label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="year_built" name="year_built" value="{{ old('year_built') }}">

                                                            @if ($errors->has('year_built'))
                                                                <div id="year_builtHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('year_built') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="available_from" class="text-heading">Available from
                                                                <span class="text-muted">(date)</span></label>
                                                            <input type="date" class="form-control form-control-lg border-0" id="available_from" name="available_from" value="{{ old('available_from') }}">

                                                            @if ($errors->has('available_from'))
                                                                <div id="available_fromHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('available_from') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="basement" class="text-heading">Basement</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="basement" name="basement" value="{{ old('basement') }}">

                                                            @if ($errors->has('basement'))
                                                                <div id="basementHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('basement') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="extra_details" class="text-heading">Extra details</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="extra_details" name="extra_details" value="{{ old('extra_details') }}">

                                                            @if ($errors->has('extra_details'))
                                                                <div id="extra_detailsHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('extra_details') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="roofing" class="text-heading">Roofing</label>
                                                            <input type="text" class="form-control form-control-lg border-0" id="roofing" value="{{ old('roofing') }}" name="roofing">
                                                        
                                                            @if ($errors->has('roofing'))
                                                                <div id="roofingHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('roofing') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="floors_no" class="text-heading">Floors no</label>
                                                            <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" value="{{ old('floors_no') }}" id="floors_no" name="floors_no">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                            </select>

                                                            @if ($errors->has('floors_no'))
                                                                <div id="floors_noHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('floors_no') }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="house_type" class="text-heading">House Type</label>
                                                            <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" value="{{ old('house_type') }}" id="house_type" name="house_type">
                                                                <option>Detached duplex</option>
                                                                <option>Semi detached duplex</option>
                                                                <option>Bungalow</option>
                                                                <option>Terraces</option>
                                                                <option>Apartments</option>
                                                                <option>Land</option>
                                                            </select>

                                                            @if ($errors->has('house_type'))
                                                                <div id="house_typeHelp" class="form-text text-danger">
                                                                    <div>{{ $errors->first('house_type') }}</div>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex flex-wrap">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary mb-3" type="submit">Submit property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane tab-pane-parent fade px-0" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">
                            <div class="card bg-transparent border-0">
                                <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-amenities">
                                    <h5 class="mb-0">
                                        <button class="btn btn-block collapse-parent collapsed border shadow-none" data-toggle="collapse" data-number="5." data-target="#amenities-collapse" aria-expanded="true" aria-controls="amenities-collapse">
                                            <span class="number">5.</span> Amenities
                                        </button>
                                    </h5>
                                </div>
                                <div id="amenities-collapse" class="collapse collapsible" aria-labelledby="heading-amenities" data-parent="#collapse-tabs-accordion">
                                    <div class="card-body py-4 py-md-0 px-0">
                                        <div class="card mb-6">
                                            <div class="card-body p-6">
                                                <h3 class="card-title mb-0 text-heading fs-22 lh-15">Listing Detail
                                                </h3>
                                                <p class="card-text mb-5">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit</p>
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-3">
                                                        <ul class="list-group list-group-no-border">
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="attic">
                                                                    <label class="custom-control-label" for="attic">Attic</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="basketball-court">
                                                                    <label class="custom-control-label" for="basketball-court">Basketball court</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="doorman">
                                                                    <label class="custom-control-label" for="doorman">Doorman</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="front-yard">
                                                                    <label class="custom-control-label" for="front-yard">Front
                                                                        yard</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="lake-view">
                                                                    <label class="custom-control-label" for="lake-view">Lake
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="ocean-view">
                                                                    <label class="custom-control-label" for="ocean-view">Ocean
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="private-space">
                                                                    <label class="custom-control-label" for="private-space">Private
                                                                        space</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="sprinklers">
                                                                    <label class="custom-control-label" for="sprinklers">Sprinklers</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="wine-cellar">
                                                                    <label class="custom-control-label" for="wine-cellar">Wine
                                                                        cellar</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-3">
                                                        <ul class="list-group list-group-no-border">
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="attic-01">
                                                                    <label class="custom-control-label" for="attic-01">Attic</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="basketball-court-01">
                                                                    <label class="custom-control-label" for="basketball-court-01">Basketball
                                                                        court</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="doorman-01">
                                                                    <label class="custom-control-label" for="doorman-01">Doorman</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="front-yard-01">
                                                                    <label class="custom-control-label" for="front-yard-01">Front
                                                                        yard</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="lake-view-01">
                                                                    <label class="custom-control-label" for="lake-view-01">Lake
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="ocean-view-01">
                                                                    <label class="custom-control-label" for="ocean-view-01">Ocean
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="private-space-01">
                                                                    <label class="custom-control-label" for="private-space-01">Private space</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="sprinklers-01">
                                                                    <label class="custom-control-label" for="sprinklers-01">Sprinklers</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="wine-cellar-01">
                                                                    <label class="custom-control-label" for="wine-cellar-01">Wine cellar</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-3">
                                                        <ul class="list-group list-group-no-border">
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="attic-02">
                                                                    <label class="custom-control-label" for="attic-02">Attic</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="basketball-court-02">
                                                                    <label class="custom-control-label" for="basketball-court-02">Basketball
                                                                        court</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="doorman-02">
                                                                    <label class="custom-control-label" for="doorman-02">Doorman</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="front-yard-02">
                                                                    <label class="custom-control-label" for="front-yard-02">Front
                                                                        yard</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="lake-view-02">
                                                                    <label class="custom-control-label" for="lake-view-02">Lake
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="ocean-view-02">
                                                                    <label class="custom-control-label" for="ocean-view-02">Ocean
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="private-space-02">
                                                                    <label class="custom-control-label" for="private-space-02">Private space</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="sprinklers-02">
                                                                    <label class="custom-control-label" for="sprinklers-02">Sprinklers</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="wine-cellar-02">
                                                                    <label class="custom-control-label" for="wine-cellar-02">Wine cellar</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-3">
                                                        <ul class="list-group list-group-no-border">
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="attic-03">
                                                                    <label class="custom-control-label" for="attic-03">Attic</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="basketball-court-03">
                                                                    <label class="custom-control-label" for="basketball-court-03">Basketball
                                                                        court</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="doorman-03">
                                                                    <label class="custom-control-label" for="doorman-03">Doorman</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="front-yard-03">
                                                                    <label class="custom-control-label" for="front-yard-03">Front
                                                                        yard</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="lake-view-03">
                                                                    <label class="custom-control-label" for="lake-view-03">Lake
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="ocean-view-03">
                                                                    <label class="custom-control-label" for="ocean-view-03">Ocean
                                                                        view</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="private-space-03">
                                                                    <label class="custom-control-label" for="private-space-03">Private space</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="sprinklers-03">
                                                                    <label class="custom-control-label" for="sprinklers-03">Sprinklers</label>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item px-0 pt-0 pb-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="features[]" id="wine-cellar-03">
                                                                    <label class="custom-control-label" for="wine-cellar-03">Wine cellar</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <a href="#" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                            </a>
                                            <button class="btn btn-lg btn-primary mb-3" type="submit">Submit property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

