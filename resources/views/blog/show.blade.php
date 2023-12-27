@extends('layouts.app')
<title>{{ $post->title }}</title>
@section('content')

    <section class="pt-2 pb-13 page-title bg-img-cover-center bg-white-overlay"
         style="background-image: url('https://cdn.pixabay.com/photo/2014/08/03/23/41/house-409451_1280.jpg');">
        <div class="container">
          {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pages</li>
            </ol>
          </nav> --}}
            <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-12" data-animate="fadeInDown">
                {{ $post->title }}
            </h1>
        </div>
      </section>
      
      <section class="pt-13 pb-12">
        <div class="container">
          <div class="row ml-xl-0 mr-xl-n6">
            <div class="col-lg-8 mb-6 mb-lg-0 pr-xl-6 pl-xl-0">
              <div class="position-relative">
                <img class="rounded-lg d-block" src="/storage/{{ $post->image }}" alt="Placeholder Image">
                <a href="#" class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                  {{ $post->category->title ?? "No tag" }}
                </a>
              </div>
              <ul class="list-inline mt-4">
                {{-- <li class="list-inline-item mr-4"><img class="mr-1 rounded-circle" src="https://via.placeholder.com/40" alt="D. Warren"> D. Warren
                </li> --}}
                <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</li>
                <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> {{ $post->views }} views</li>
              </ul>
              <h3 class="fs-md-32 text-heading lh-141 mb-2">
                {{ $post->title }}
              </h3>

              <div class="lh-214 mb-9">
                <p>
                    {!! $post->body !!}
                </p>
              </div>

              <div class="row pb-7 mb-6 border-bottom">
                <div class="col-sm-6 d-flex">
                  <span class="d-inline-block mr-2"><i class="fal fa-tags"></i></span>
                  <ul class="list-inline">

                    <li class="list-inline-item mr-0"><a href="#" class="text-muted hover-dark">{{ $post->category->title ?? "No tag" }}</a>
                    </li>
                  </ul>
                </div>

                <div class="col-sm-6 text-left text-sm-right">
                  <span class="d-inline-block text-heading font-weight-500 lh-17 mr-1">Share this post</span>
                  <button type="button"
                                class="btn btn-primary rounded-circle w-52px h-52 fs-20 d-inline-flex align-items-center justify-content-center"
                                data-container="body"
                                data-toggle="popover" data-placement="top" data-html="true" data-content=' <ul class="list-inline mb-0">
                    
                    <li class="list-inline-item">
                      <a href="{{ route('share.twitter', $post->title) }}" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item ">
                      <a href="{{ route('share.facebook', $post->title) }}" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    {{-- <li class="list-inline-item">
                      <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-instagram"></i></a>
                    </li> --}}
                    <li class="list-inline-item">
                      <a href="{{ route('share.whatsapp', $post->title) }}" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-whatsapp"></i></a>
                    </li>

                  </ul>
                  '>
                  <i class="fad fa-share-alt"></i>
                </button>

              </div>
            </div>


            {{-- <div class="media flex-wrap flex-sm-nowrap mb-8">
              <div class="mb-3 mb-sm-0 mr-sm-2 text-center w-100 w-sm-auto">
                <img class="rounded-circle" src="https://via.placeholder.com/70" alt="Maggie Strickland">
                <ul class="list-inline mb-0 mt-3">
                  <li class="list-inline-item mr-0">
                    <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                        class="fab fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item mr-0">
                    <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                        class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="list-inline-item mr-0">
                    <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                        class="fab fa-instagram"></i></a>
                  </li>
                  <li class="list-inline-item mr-0">
                    <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i
                                        class="fab fa-youtube"></i></a>
                  </li>
                </ul>
              </div>
              <div class="media-body text-center text-sm-left">
                <h5 class="text-dark fs-16 mb-2">Maggie Strickland</h5>
                <p class="mb-0">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                  deserunt mollit
                  anim id est laboruLorem ipsum dolor sit amet datat non proident</p>
              </div>
            </div> --}}

            {{-- <div class="row mb-7">
              <div class="col-sm-6 mb-6">
                <div class="card">
                  <img src="https://via.placeholder.com/300" alt="Placeholder Image" class="card-img">
                  <a href="#"  class="card-img-overlay d-flex align-items-center justify-content-center text-white fs-16 font-weight-500 px-4 pl-sm-5 pr-sm-8 py-6">
                    <span class="d-inline-block mr-4 fs-24"><i class="fal fa-angle-left"></i></span>
                    How to Create an Effective Elevator Pitch
                  </a>
                </div>
              </div>
              <div class="col-sm-6 mb-6">
                <div class="card">
                  <img src="images/blog-nav-02.jpg"
                                 alt="How to Create an Effective Elevator Pitch" class="card-img">
                  <a href="#"
                               class="card-img-overlay d-flex align-items-center justify-content-center text-white fs-16 font-weight-500 px-4 pr-sm-5 pl-sm-10 py-6 text-right">
                    Top Strategic Technology Trends for 2019
                    <span class="d-inline-block ml-4 fs-24"><i class="fal fa-angle-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
            <h3 class="fs-22 text-heading lh-15 mb-6">Comments (3)</h3>
            <div class="media mb-6 pb-5 border-bottom">
              <div class="w-70px mr-2">
                <img src="images/testimonial-5.jpg"
                             alt="Dollie Horton">
              </div>
              <div class="media-body">
                <p class="text-heading fs-16 font-weight-500 mb-0">Dollie Horton</p>
                <p class="mb-4">Very good and fast support during the week. Thanks for always keeping your
                  WordPress themes
                  up to date. Your level of support and dedication is second to none. Solved all my problems
                  in a pressing time! Excited to see the other themes they make!</p>
                <ul class="list-inline">
                  <li class="list-inline-item text-muted">02 Dec 2019 at 2:40pm<span
                                    class="d-inline-block ml-2">|</span></li>
                  <li class="list-inline-item"><a href="#" class="text-heading hover-primary">Reply</a></li>
                </ul>
              </div>
            </div>
            <div class="media mb-6 pb-5 border-bottom">
              <div class="w-70px mr-2">
                <img src="images/review-05.jpg"
                             alt="Dollie Horton">
              </div>
              <div class="media-body">
                <p class="text-heading fs-16 font-weight-500 mb-0">Dollie Horton</p>
                <p class="mb-4">Very good and fast support during the week. Thanks for always keeping your
                  WordPress themes
                  up to date. Your level of support and dedication is second to none. Solved all my problems
                  in a pressing time! Excited to see the other themes they make!</p>
                <ul class="list-inline">
                  <li class="list-inline-item text-muted">02 Dec 2019 at 2:40pm<span
                                    class="d-inline-block ml-2">|</span></li>
                  <li class="list-inline-item"><a href="#" class="text-heading hover-primary">Reply</a></li>
                </ul>
              </div>
            </div>
            <div class="media mb-10 pb-5 border-bottom">
              <div class="w-70px h-70 mr-2 bg-gray-01 rounded-circle fs-18 text-muted d-flex align-items-center justify-content-center">
                DH
              </div>
              <div class="media-body">
                <p class="text-heading fs-16 font-weight-500 mb-0">Dollie Horton</p>
                <p class="mb-4">Very good and fast support during the week. Thanks for always keeping your
                  WordPress themes
                  up to date. Your level of support and dedication is second to none. Solved all my problems
                  in a pressing time! Excited to see the other themes they make!</p>
                <ul class="list-inline">
                  <li class="list-inline-item text-muted">02 Dec 2019 at 2:40pm<span
                                    class="d-inline-block ml-2">|</span></li>
                  <li class="list-inline-item"><a href="#" class="text-heading hover-primary">Reply</a></li>
                </ul>
              </div>
            </div>
            <h3 class="fs-22 text-heading lh-15 mb-6">Leave your thought here</h3>
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-4">
                    <input type="text" placeholder="Your Name" name="name"
                                       class="form-control form-control-lg border-0">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-4">
                    <input placeholder="Your Email"
                                       class="form-control form-control-lg border-0"
                                       type="email" name="email">
                  </div>
                </div>
              </div>
              <div class="form-group mb-6">
                <textarea class="form-control border-0" placeholder="Message" name="message"
                                  rows="5"></textarea>
              </div>
              <button type="submit" class="btn btn-lg btn-primary px-9">Submit</button>
            </form> --}}






          </div>
          <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">

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
                            {{ Str::limit($post->category->title ?? "No tag", 5) }}
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

              <div class="card mb-4">
                <div class="card-body px-6 py-5">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Popular Tags</h4>
                  <ul class="list-inline mb-0">

                    @foreach ($categories as $category)
                    <li class="list-inline-item mb-2" style="cursor: default">
                      <span class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">{{ $category->title }}</span>
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

    @endsection
