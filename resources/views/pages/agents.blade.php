@extends('layouts.app')

@section('content')
<style>
    .remove-this-item {
      display: none !important;
    }
</style>

<main id="content">
    <section class="position-relative pb-15 pt-2 mt-12 page-title bg-patten bg-secondary">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-light mb-0 p-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agents</li>
          </ol>
        </nav>
        <h1 class="fs-32 mb-0 text-white font-weight-600 text-center pt-11 mb-5 lh-17 mxw-478" data-animate="fadeInDown">Meet The Agents
          Transforming Real Estate </h1>
      </div>
    </section>


    <section>
      <div class="container">
        <div class="mt-n8 bg-white px-6 py-3 shadow-sm-2 rounded-lg form-search-02 position-relative z-index-3">
            {{-- Desktop --}}
            <form class="d-none row d-md-flex flex-wrap align-items-center">
            <div class="col-md-5 mb-3 mb-md-0">
              <div class="row">
                <div class="form-group mb-3 mb-md-0 col-md-6">
                  <label for="language"
                                 class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Language</label>
                  <select class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker"
                                  name="language"
                                  id="language" data-style="bg-white pl-0 text-dark rounded-0">
                    <option>Select</option>
                    <option>English</option>
                    <option>France</option>
                  </select>
                </div>
                <div class="form-group mb-3 mb-md-0 col-md-6">
                  <label for="region"
                                 class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Region</label>
                  <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                  name="region"
                                  id="region" data-style="bg-white pl-0 text-dark rounded-0">
                    <option>Abuja</option>
                    <option>Anambra</option>
                    <option>Enugu</option>
                    <option>Awka</option>
                    <option>Delta</option>
                    <option>Lagos</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5">
              <label for="search" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Search</label>
              <div class="input-group input-group-sm">
                <input type="text" id="search"
                             class="form-control pl-0 rounded-0 bg-white"
                             placeholder="Search by agent’s name…" name="search">
                <div class="input-group-append ml-0">
                  <span class="fs-18 input-group-text bg-white rounded-0"><i
                                          class="fal fa-search"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-2 pl-0">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Search
              </button>
            </div>
          </form>
          {{-- Mobile --}}
          <form class="d-block d-md-none">
            <div class="d-flex align-items-center">
              <a class="text-body hover-primary d-inline-block fs-24 lh-1 mr-5" data-toggle="collapse"
                     href="#collapseMobileSearch"
                     role="button" aria-expanded="false" aria-controls="collapseMobileSearch">
                <i class="fal fa-cog"></i>
              </a>
              <div class="input-group">
                <input type="text"
                             class="form-control pl-0 rounded-0 bg-white"
                             placeholder="Search by agent’s name…" name="search">
                <div class="input-group-append ml-0">
                  <span class="fs-18 input-group-text bg-white rounded-0"><i
                                          class="fal fa-search"></i></span>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseMobileSearch">
              <div class="card card-body border-0 px-0">
                <div class="form-group mb-3">
                  <label for="language-01"
                                 class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Language</label>
                  <select class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker"
                                  name="language"
                                  id="language-01" data-style="bg-white pl-0 text-dark rounded-0">
                    <option>Select</option>
                    <option>English</option>
                    <option>France</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="region-01"
                                 class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Region</label>
                  <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm"
                                  name="region"
                                  id="region-01" data-style="bg-white pl-0 text-dark rounded-0">
                    <option>Austin</option>
                    <option>Boston</option>
                    <option>Chicago</option>
                    <option>Denver</option>
                    <option>Los Angeles</option>
                    <option>New York</option>
                    <option>San Francisco</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>


    <section class="pt-12 pb-13">
      <div class="container">
        <div class="row align-items-sm-center mb-6">
          <div class="col-sm-6 mb-6 mb-sm-0">
            <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">1</span> 
                agents available for you
            </h2>
          </div>
          <div class="col-sm-6">
            <div class="d-flex justify-content-end align-items-center">
              <div class="input-group border rounded input-group-lg w-auto mr-3">
                <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3"
                             for="inputGroupSelect01"><i
                              class="fas fa-align-left fs-16 pr-2"></i>Sort
                  by:</label>
                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker"
                              data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0"
                              id="inputGroupSelect01" name="sortby">
                  <option selected>Alphabet</option>
                  <option value="1">Random</option>
                  <option value="1">Rating</option>
                  <option value="1">Number of property</option>
                </select>
              </div>
              <div class="d-none d-md-block list-layout">
                <a class="fs-sm-18 text-muted" href="agents-list.html">
                  <i class="fas fa-list"></i>
                </a>
                <span class="fs-sm-18 text-muted ml-5 active">
                  <i class="fa fa-th-large"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3 mb-6">
            <div class="card shadow-hover-xs-4 agent-3">
              <div class="card-header text-center pt-6 pb-3 bg-transparent text-center">
                <a href="#" class="d-inline-block mb-2 w-120px h-120">
                  <img src="{{ asset('assets/images/agent-1.jpg') }}" alt="Max Kordek">
                </a>
                <a href="#"
                         class="d-block fs-16 lh-2 text-dark mb-0 font-weight-500 hover-primary">Max Kordek</a>
                <p class="mb-2">Real Estate Broker</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item mr-6">
                    <a href="#"
                                 class="text-muted hover-primary"><i
                                      class="fab fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item mr-6">
                    <a href="#"
                                 class="text-muted hover-primary"><i
                                      class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="list-inline-item mr-6">
                    <a href="#"
                                 class="text-muted hover-primary">
                      <i class="fab fa-skype"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"
                                 class="text-muted hover-primary"><i
                                      class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body text-center pt-2  px-0">
                <a href="mailto:oliverbeddows@homeid.com" class="text-body">oliverbeddows@homeid.com</a>
                <a href="tel:123-900-68668" class="text-heading font-weight-600 d-block mb-3">123 900 68668</a>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item fs-13 text-heading font-weight-500">4.8/5</li>
                  <li class="list-inline-item fs-13 text-heading font-weight-500 mr-1">
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item mr-0">
                        <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                      </li>
                      <li class="list-inline-item mr-0">
                        <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                      </li>
                      <li class="list-inline-item mr-0">
                        <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                      </li>
                      <li class="list-inline-item mr-0">
                        <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                      </li>
                      <li class="list-inline-item mr-0">
                        <span class="text-warning fs-12 lh-2"><i class="fas fa-star"></i></span>
                      </li>
                    </ul>
                  </li>
                  <li class="list-inline-item fs-13 text-gray-light">(67 reviews)</li>
                </ul>
              </div>
              <div class="card-footer px-0 text-center hover-image border-0">
                <a href="listing-with-left-sidebar.html"
                         class="d-flex align-items-center justify-content-center text-heading">
                  <span class="badge badge-white badge-circle border fs-13 font-weight-bold mr-2 lh-12">5</span>
                  <span class="font-weight-500 mr-2">Listed Properties</span>
                  <span class="text-primary fs-16 icon"><i class="far fa-long-arrow-right"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        {{-- Pahination --}}
        <nav class="mt-4">
          <ul class="pagination rounded-active justify-content-center">
            <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item">...</li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-right"></i></a></li>
          </ul>
        </nav>
        <div class="text-center mt-2">8-14 of 45 Results</div>
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