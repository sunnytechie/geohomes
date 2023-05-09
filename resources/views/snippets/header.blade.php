<header class="main-header position-absolute fixed-top m-0 navbar-dark header-sticky header-sticky-smart header-mobile-xl">
    <div class="sticky-area">
        <div class="container container-xxl">
            <div class="d-flex align-items-center">
                <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
                    <a class="navbar-brand mr-7" href="/">
                        <img width="150" height="50" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="HomeID" class="normal-logo">
                        <img width="150" height="50" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="HomeID" class="sticky-logo">
                    </a>

                    <a class="d-block d-xl-none ml-auto mr-4 position-relative text-white p-2" href="{{ route('dashboard.index') }}">
                        <i class="fal fa-user fs-large-4"></i>
                    </a>

                    <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                        data-target="#primaryMenu02" aria-controls="primaryMenu02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                            <li aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="{{ route('page.buy.rent') }}">
                                    Buy or Rent {{-- should be Listings --}}
                                </a>
                            </li>

                            <li aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="{{ route('page.projects') }}">
                                    Projects
                                </a>
                            </li>

                            <li id="navbar-item-listing" aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="{{ route('page.agents') }}">
                                    Estate Agents
                                </a>
                            </li>

                            <li id="navbar-item-listing" aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="/about-us#service">
                                    Services
                                </a>
                            </li>

                            <li id="navbar-item-listing" aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="{{ route('page.about') }}">
                                    About Us
                                </a>
                            </li>

                            <li id="navbar-item-listing" aria-haspopup="true" aria-expanded="false"
                                class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link p-0" href="{{ route('page.about') }}">
                                    Contact Us
                                </a>
                            </li>

                            {{-- <li id="navbar-item-dashboard" aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                                <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                                    More
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-dashboard">
                                    <li class="dropdown-item">
                                        <a id="navbar-link-dashboard" class="dropdown-link" href="{{ route('page.contact') }}">
                                            Contact Us
                                        </a>
                                    </li>
                                     <li class="dropdown-item">
                                        <a id="navbar-link-add-new-property" class="dropdown-link"
                                            href="{{ route('page.about') }}">
                                            About Us
                                        </a>
                                    </li> 
                                    <li class="dropdown-item">
                                        <a id="navbar-link-my-properties" class="dropdown-link"
                                            href="{{ route('page.faq') }}">
                                            Faq
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>

                        <div class="d-block d-xl-none">
                            <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                                
                                <li class="divider"></li>
                                <li class="nav-item hide-from-mobile">
                                    <a class="nav-link pl-3 pr-2" data-toggle="modal"
                                        href="#login-register-modal">SIGN IN</a>
                                </li>
                                <li class="nav-item ml-auto w-100 w-sm-auto">
                                    <a class="btn btn-primary btn-lg" href="dashboard-add-new-property.html">
                                        Add listing
                                        <img src="{{ asset('assets/images/add-listing-icon.png') }}" alt="Add listing" class="ml-1">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </nav>
                <div class="ml-auto d-none d-xl-block">
                    <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                       
                        <li class="divider"></li>

                        <li class="nav-item ">
                            @guest
                                <a class="nav-link pl-3 pr-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a>
                                @else
                                <a class="nav-link pl-3 pr-2" href="{{ route('dashboard.index') }}"> <span><i class="far fa-user"></i></span> <span class="ml-1">Dashboard</span></a>
                            @endguest
                            
                        </li>
                        
                        @auth
                        <li class="nav-item remove-this-item">
                            <a class="btn btn-outline-light btn-lg text-white rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block"
                                href="#">
                                Add listing
                                <img src="{{ asset('assets/images/add-listing-icon.png') }}" alt="Add listing"
                                    class="ml-1 normal-button-icon">
                                <img src="{{ asset('assets/images/add-listing-icon-primary.png') }}" alt="Add listing"
                                    class="ml-1 sticky-button-icon">
                            </a>
                            <a class="btn btn-primary btn-lg d-block d-lg-none"
                                href="#">
                                Add listing
                                <img src="{{ asset('assets/images/add-listing-icon.png') }}" alt="Add listing" class="ml-1">
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
