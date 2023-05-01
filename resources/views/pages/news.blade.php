@extends('layouts.app')

@section('content')
<style>
    .remove-this-item {
      display: none !important;
    }

    @media only screen and (max-width: 1024px) {
    .mt-12 {
      margin-top: 0 !important;
    }
</style>
    
<main id="content">
    <section class="pt-2 pb-13 mt-12 page-title bg-img-cover-center bg-white-overlay"
       style="background-image: url('images/bg-title.jpg');">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
        <h1 class="fs-30 lh-15 mb-0 text-heading font-weight-500 text-center pt-10" data-animate="fadeInDown">
          Interesting articles updated
          daily</h1>
      </div>
    </section>
    <section class="pt-11 pb-13">
      <div class="container">
        <div class="row ml-xl-0 mr-xl-n6">
          <div class="col-lg-8 mb-8 mb-lg-0 pr-xl-6 pl-xl-0">
            <div class="card border-0 pb-6 mb-6 border-bottom">
              <div class="position-relative d-flex align-items-end card-img-top">
                <a href="blog-details-1.html" class="hover-shine d-block">
                  <img src="images/post-11.jpg"
                               alt="Ten Benefits Of Rentals That May Change Your Perspective">
                </a>
                <a href="#"
                         class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                  rental
                </a>
              </div>
              <div class="card-body p-0">
                <ul class="list-inline mt-4">
                  <li class="list-inline-item mr-4"><img class="mr-1"
                                                                 src="images/author-01.jpg"
                                                                 alt="D. Warren"> D. Warren
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> Dec 16, 2018
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 views
                  </li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-3">
                  <a href="blog-details-1.html" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
                </h3>
                <p class="mb-4 lh-214">Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed...</p>
              </div>
              <div class="card-footer bg-transparent p-0 border-0">
                <a href="blog-details-1.html"
                         class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Read
                  more <i
                                  class="far fa-long-arrow-right text-primary ml-1"></i></a>
                <a href="#"
                         class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                              class="fad fa-share-alt text-primary"></i></a>
              </div>
            </div>
            <div class="card border-0 pb-6 mb-6 border-bottom">
              <div class="position-relative bg-gray-04 px-3 px-md-12 d-flex justify-content-center z-index-1 pt-4">
                <div class="position-absolute pos-fixed-center fs-200 lh-1 z-index-2 text-lighter">
                  <svg class="icon icon-quote">
                    <use xlink:href="#icon-quote"></use>
                  </svg>
                </div>
                <div class="position-relative z-index-3 pt-9 pb-7">
                  <p class="fs-22 text-heading lh-182 mb-6 text-center"> We're on a mission to build a better future where technology creates good jobs for everyone.</p>
                  <p class="text-dark fs-13 lh-1 text-center mb-1 font-weight-bold">Maggie Strickland<span
                                      class="text-gray fs-12 lh-26 font-weight-normal d-inline-block ml-2">/ Web design</span>
                  </p>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="list-inline mt-4">
                  <li class="list-inline-item mr-4"><img class="mr-1"
                                                                 src="images/author-01.jpg"
                                                                 alt="D. Warren"> D. Warren
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> Dec 16, 2018
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 views
                  </li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-3">
                  <a href="blog-details-1.html" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
                </h3>
                <p class="mb-4 lh-214">Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed...</p>
              </div>
              <div class="card-footer bg-transparent p-0 border-0">
                <a href="blog-details-1.html"
                         class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Read
                  more <i
                                  class="far fa-long-arrow-right text-primary ml-1"></i></a>
                <a href="#"
                         class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                              class="fad fa-share-alt text-primary"></i></a>
              </div>
            </div>
            <div class="card border-0 pb-6 mb-6 border-bottom">
              <div class="position-relative d-flex align-items-end card-img-top">
                <a href="blog-details-1.html" class="hover-shine d-block">
                  <img src="images/post-12.jpg"
                               alt="Ten Benefits Of Rentals That May Change Your Perspective">
                </a>
              </div>
              <div class="card-body p-0">
                <ul class="list-inline mt-4">
                  <li class="list-inline-item mr-4"><img class="mr-1"
                                                                 src="images/author-01.jpg"
                                                                 alt="D. Warren"> D. Warren
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> Dec 16, 2018
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 views
                  </li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-3">
                  <a href="blog-details-1.html" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
                </h3>
                <p class="mb-4 lh-214">Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed...</p>
              </div>
              <div class="card-footer bg-transparent p-0 border-0">
                <a href="blog-details-1.html"
                         class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Read
                  more <i
                                  class="far fa-long-arrow-right text-primary ml-1"></i></a>
                <a href="#"
                         class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                              class="fad fa-share-alt text-primary"></i></a>
              </div>
            </div>
            <div class="card border-0 pb-6 mb-6 border-bottom">
              <div class="position-relative d-flex flex-column card-img-top">
                <div class="hover-shine d-block">
                  <img src="images/post-13.jpg"
                               alt="Ten Benefits Of Rentals That May Change Your Perspective">
                  <a href="http://www.youtube.com/watch?v=0O2aH4XLbto"
                             class="d-inline-block m-auto position-absolute pos-fixed-center"
                             data-gtf-mfp="true" data-mfp-options='{"type":"iframe"}'>
                    <span class="text-primary bg-white w-78px h-78 rounded-circle position-relative play-animation d-flex align-items-center justify-content-center">
                      <i class="fas fa-play"></i>
                    </span>
                  </a>
                  <a href="#"
                             class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                    rental
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="list-inline mt-4">
                  <li class="list-inline-item mr-4"><img class="mr-1"
                                                                 src="images/author-01.jpg"
                                                                 alt="D. Warren"> D. Warren
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> Dec 16, 2018
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 views
                  </li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-3">
                  <a href="blog-details-1.html" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
                </h3>
                <p class="mb-4 lh-214">Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed...</p>
              </div>
              <div class="card-footer bg-transparent p-0 border-0">
                <a href="blog-details-1.html"
                         class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Read
                  more <i
                                  class="far fa-long-arrow-right text-primary ml-1"></i></a>
                <a href="#"
                         class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                              class="fad fa-share-alt text-primary"></i></a>
              </div>
            </div>
            <div class="card border-0 pb-6 mb-6 border-bottom">
              <div class="position-relative d-flex align-items-end card-img-top">
                <a href="blog-details-1.html" class="hover-shine d-block">
                  <img src="images/post-14.jpg"
                               alt="Ten Benefits Of Rentals That May Change Your Perspective">
                </a>
                <a href="#"
                         class="badge text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white m-2 position-absolute letter-spacing-1 pos-fixed-bottom">
                  rental
                </a>
              </div>
              <div class="card-body p-0">
                <ul class="list-inline mt-4">
                  <li class="list-inline-item mr-4"><img class="mr-1"
                                                                 src="images/author-01.jpg"
                                                                 alt="D. Warren"> D. Warren
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-calendar mr-1"></i> Dec 16, 2018
                  </li>
                  <li class="list-inline-item mr-4"><i class="far fa-eye mr-1"></i> 149 views
                  </li>
                </ul>
                <h3 class="fs-md-32 text-heading lh-141 mb-3">
                  <a href="blog-details-1.html" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
                </h3>
                <p class="mb-4 lh-214">Massa tempor nec feugiat nisl pretium. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Porta nibh venenatis cras sed felis eget velit aliquet. Neque volutpat ac tincidunt vitae semper quis lectus. Turpis in eu mi bibendum neque egestas congue quisque. Sed elementum tempus egestas sed...</p>
              </div>
              <div class="card-footer bg-transparent p-0 border-0">
                <a href="blog-details-1.html"
                         class="btn text-heading border btn-lg shadow-none btn-outline-light border-hover-light">Read
                  more <i
                                  class="far fa-long-arrow-right text-primary ml-1"></i></a>
                <a href="#"
                         class="btn text-heading btn-lg w-52px px-2 border shadow-none btn-outline-light border-hover-light rounded-circle ml-auto float-right"><i
                              class="fad fa-share-alt text-primary"></i></a>
              </div>
            </div>
            <nav class="pt-4">
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
          </div>
          <div class="col-lg-4 pl-xl-6 pr-xl-0 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">
              <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Categories</h4>
                  <form>
                    <div class="position-relative">
                      <input type="text" id="search02"
                                         class="form-control form-control-lg border-0 shadow-none"
                                         placeholder="Search..." name="search">
                      <div class="position-absolute pos-fixed-center-right">
                        <button type="submit" class="btn fs-15 text-dark shadow-none"><i
                                              class="fal fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Categories</h4>
                  <ul class="list-group list-group-no-border">
                    <li class="list-group-item p-0">
                      <a href="listing-with-left-sidebar.html"
                                     class="d-flex text-body hover-primary">
                        <span class="lh-29">Creative</span>
                        <span class="d-block ml-auto">13</span>
                      </a>
                    </li>
                    <li class="list-group-item p-0">
                      <a href="listing-with-left-sidebar.html"
                                     class="d-flex text-body hover-primary">
                        <span class="lh-29">Rentals</span>
                        <span class="d-block ml-auto">21</span>
                      </a>
                    </li>
                    <li class="list-group-item p-0">
                      <a href="listing-with-left-sidebar.html"
                                     class="d-flex text-body hover-primary">
                        <span class="lh-29">Images and B-Roll</span>
                        <span class="d-block ml-auto">17</span>
                      </a>
                    </li>
                    <li class="list-group-item p-0">
                      <a href="listing-with-left-sidebar.html"
                                     class="d-flex text-body hover-primary">
                        <span class="lh-29">In the News</span>
                        <span class="d-block ml-auto">4</span>
                      </a>
                    </li>
                    <li class="list-group-item p-0">
                      <a href="listing-with-left-sidebar.html"
                                     class="d-flex text-body hover-primary">
                        <span class="lh-29">Real Estate</span>
                        <span class="d-block ml-auto">27</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Latest Posts</h4>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 pt-0 pb-3">
                      <div class="media">
                        <div class="position-relative mr-3">
                          <a href="blog-details-1.html"
                                             class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                             style="background-image: url('images/post-02.jpg')">
                          </a>
                          <a href="blog-grid-with-sidebar.html"
                                             class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                            creative
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="fs-14 lh-186 mb-1">
                            <a href="blog-details-1.html"
                                                 class="text-dark hover-primary">
                              Retail banks wake up to digital lending this year
                            </a>
                          </h4>
                          <div class="text-gray-light">
                            Dec 16, 2018
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item px-0 pt-2 pb-3">
                      <div class="media">
                        <div class="position-relative mr-3">
                          <a href="blog-details-1.html"
                                             class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                             style="background-image: url('images/post-04.jpg')">
                          </a>
                          <a href="blog-grid-with-sidebar.html"
                                             class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                            rental
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="fs-14 lh-186 mb-1">
                            <a href="blog-details-1.html"
                                                 class="text-dark hover-primary">
                              Within the construction industry as their overdraft
                            </a>
                          </h4>
                          <div class="text-gray-light">
                            Dec 16, 2018
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item px-0 pt-2 pb-0">
                      <div class="media">
                        <div class="position-relative mr-3">
                          <a href="blog-details-1.html"
                                             class="d-block w-100px rounded pt-11 bg-img-cover-center"
                                             style="background-image: url('images/post-07.jpg')">
                          </a>
                          <a href="blog-grid-with-sidebar.html"
                                             class="badge text-white bg-dark-opacity-04 m-1 fs-13 font-weight-500 bg-hover-primary hover-white position-absolute pos-fixed-top">
                            rental
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="fs-14 lh-186 mb-1">
                            <a href="blog-details-1.html"
                                                 class="text-dark hover-primary">
                              Future Office Buildings: Intelligent by Design
                            </a>
                          </h4>
                          <div class="text-gray-light">
                            Dec 16, 2018
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Download Brochure</h4>
                  <img src="images/download-brochure.png" alt="Download Brochure">
                  <div class="text-center mt-10 mb-2">
                    <a href="#" class="btn btn-lg bg-gray-01 bg-hover-accent btn-block text-heading">Download
                      now<span
                                          class="text-primary d-inline-block ml-2"><i
                                          class="far fa-arrow-circle-down"></i></span></a>
                  </div>
                </div>
              </div>
              <div class="card mb-4">
                <div class="card-body px-6 py-5">
                  <h4 class="card-title fs-16 lh-2 text-dark mb-3">Popular Tags</h4>
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">designer</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">mockup</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">template</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">IT
                        Security</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">IT
                        services</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">business</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">videos</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">wordpress
                        theme</a>
                    </li>
                    <li class="list-inline-item mb-2">
                      <a href="#"
                                     class="px-2 py-1 d-block fs-13 lh-17 bg-gray-03 text-muted hover-white bg-hover-primary rounded">sketch</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>
@endsection