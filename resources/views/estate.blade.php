@extends('layouts.share')
@section('content')
    <style>
    .remove-this-item {
        display: none !important;
        }

        @media only screen and (max-width: 1024px) {
        .mt-12 {
        margin-top: 0 !important;
        }
        }

        /* override GoogleMap settings */
        .map-container {
        position: relative;
        width: 100%;
        padding-bottom: 75%; /* Adjust this value to control the aspect ratio of the map */
        height: 0;
        overflow: hidden;
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media only screen and (max-width: 600px) {
    /* Adjust the breakpoint value as needed */
    .map-container {
        padding-bottom: 100%; /* Increase the aspect ratio for mobile */
    }
    }

    @media only screen and (min-width: 601px) {
        /* Adjust the breakpoint value as needed */
        .map-container {
        padding-bottom: 75%; /* Restore the aspect ratio for desktop */
        }
    }


    @media only screen and (max-width: 1024px) {
        .hide-from-mobile {
        margin-top: 10px !important;
    }
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 300px;
            margin: 1.75rem auto;
        }
    }

    </style>

    <main id="content">

        <section class="py-10 page-title bg-img-cover-center bg-white-overlay"
            style="background-image: url('https://cdn.pixabay.com/photo/2016/10/09/21/41/live-1727063_1280.jpg');">
            <div class="container">
                <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-12" data-animate="fadeInDown">
                    {{ $project->title }}
                </h1>
            </div>
        </section>

        <section class="pt-13 pb-12">
            <div class="container">
                <div class="row ml-xl-0 mr-xl-n6">
                    <div class="col-lg-8 mb-6 mb-lg-0 pr-xl-6 pl-xl-0">

                    <div class="container-fluid">
                        <div class="position-relative" data-animate="zoomIn">

                        <div class="row galleries m-n1">
                        <div class="col-lg-6 p-1">
                            <div class="item item-size-4-3">
                            <div class="card p-0 hover-zoom-in">
                                <a href="/storage/{{ $project->image }}" class="card-img"
                                    data-gtf-mfp="true"
                                    data-gallery-id="01"
                                    style="background-image:url('/storage/{{ $project->image }}')">
                                </a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-1">
                            <div class="row m-n1">
                            @php
                                $images = ["$project->file1", "$project->file2", "$project->file3", "$project->file4"];
                            @endphp
                            @foreach ($images as $image)
                            @if ($image)
                                <div class="col-md-6 p-1">
                                    <div class="item item-size-4-3">
                                        <div class="card p-0 hover-zoom-in">
                                            <a href="/storage/{{ $image }}" class="card-img"
                                                data-gtf-mfp="true"
                                                data-gallery-id="01"
                                                style="background-image:url('/storage/{{ $image }}')">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>



                    <ul class="list-inline mt-4">
                        {{-- <li class="list-inline-item mr-4"><img class="mr-1 rounded-circle" src="https://via.placeholder.com/40" alt="D. Warren"> D. Warren
                        </li> --}}
                        <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</li>
                        <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> {{ $project->views }} views</li>
                    </ul>
                    <div class="d-sm-flex justify-content-sm-between">
                        <div>
                        <h2 class="fs-35 font-weight-600 lh-15 text-heading">{{ $project->title }}</h2>
                        <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i>{{ $project->address }}, {{ $project->state }}, {{ $project->country }}</p>
                        </div>
                        <div class="mt-2 text-lg-right">
                        <p class="fs-22 text-heading font-weight-bold mb-0">₦ {{ number_format($project->price, 2) }}</p>

                        </div>
                    </div>

                    <div class="lh-214 mb-3">
                        <p>
                            {!! $project->description !!}
                        </p>
                    </div>

                    <div class="d-flex">

                        <a href="{{ route('initiateLandPayment', $project->id) }}" class="btn btn-primary pt-2 mr-3 rounded-0 border-0" style="background: #654321;">Subscribe</a>

                    <form action="{{ route('inspection') }}" method="POST" style="padding: 0; margin: 0">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <button type="submit" class="btn btn-primary p-2 w-100 rounded-0 border-0" style="background: #654321">Inspection</button>
                    </form>
                    </div>

                    @isset($project->video)
                    <div class="embed-responsive embed-responsive-16by9 mt-4">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $project->video }}" allowfullscreen></iframe>
                    </div>
                    @endisset

                    @isset($project->map_embed_code)
                    <section class="py-5">
                        <div class="map-container">
                            <iframe  src="{{ $project->map_embed_code }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </section>
                    @endisset



                    <div class="row pb-7 pt-5 mb-10 align-items-center border-bottom">
                        <div class="col-sm-6 d-flex">
                        <span class="d-inline-block mr-2"><i class="fal fa-tags"></i></span>
                        <ul class="list-inline">

                            <li class="list-inline-item mr-0"><a href="#" class="text-muted hover-dark">{{ $project->address }}, {{ $project->state }}, {{ $project->country }}</a>
                            </li>
                        </ul>
                        </div>

                            @php
                                $id = "$project->id";
                                $pamaLink = "estate/$id";
                            @endphp

                            @include('snippets.share')
                    </div>



                </div>
                <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar">
                    <div class="primary-sidebar-inner">

                        <div class="card mb-4">
                            <div class="card-body text-center pt-7 pb-6 px-0">
                            <img src="{{ asset('assets/images/contact-widget.jpg') }}"
                                        alt="Want to become an Estate Partner ?">
                            <div class="text-dark mb-6 mt-n2 font-weight-500">Want to become an
                                <p class="mb-0 fs-18">Estate Partner?</p>
                            </div>
                            <a href="{{ route('auth.agent') }}" class="btn btn-primary" style="background: #654321;">Register</a>
                            </div>
                        </div>

                    <div class="card mb-4">
                        <div class="card-body px-6 pt-5 pb-6">

                        <h4 class="card-title fs-16 lh-2 text-dark mb-3">Latest Posts</h4>
                        <ul class="list-group list-group-flush">
                            @foreach ($posts as $post)

                            <li class="list-group-item px-0 pt-0 pb-3">
                            <div class="media">
                                <div class="position-relative mr-3">
                                <a href="{{ route('blog.show', $post->id) }}"
                                    class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                    style="background-image: url('/storage/{{ $post->image }}')">
                                </a>
                                <a href="{{ route('blog.show', $post->id) }}"
                                        class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                                    {{ Str::limit($post->category->title ?? "Address", 5) }}
                                </a>
                                </div>
                                <div class="media-body">
                                <h4 class="fs-14 lh-186 mb-1">
                                    <a href="{{ route('blog.show', $post->id) }}"
                                                        class="text-dark hover-primary">
                                    {{ $post->title }}
                                    </a>
                                </h4>
                                <div class="text-gray-light">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                                </div>
                                </div>
                            </div>
                            </li>

                            @endforeach
                        </ul>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </div>
        </section>

        <div class="mt-10"></div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="estateModal" tabindex="-1" aria-labelledby="estateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="estateModalLabel">Subscribe</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('subscription') }}" method="POST" style="padding: 0; margin-bottom: 0; margin-right: 10px">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-body">

                <div class="my-2" style="color: #654321">After selecting the number of plots you want, you will first be prompted to subscribe for an allocation with a fee of ₦ 20,000 (twenty thousand naira). <br> After the allocation is made you have 14days to pay for the land else the plot(s) you subscribed for will be available for purchase to other customers.</div>

                <div class="input-group input-group-lg">
                <label for="plots">Select the Number of plots you want.</label>
                <input class="shadow-none fs-13 form-control" value="2" name="plots" id="plots" type="number">

                @error('plots')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" style="background: #654321">Proceed</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <script>
        // Get the header element
        const header = document.querySelector('header');

        // Remove the navbar-dark class
        header.classList.remove('navbar-dark');

        // Add the navbar-light class
        header.classList.add('navbar-light');
    </script>
@endsection
