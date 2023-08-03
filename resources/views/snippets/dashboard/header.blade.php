<header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
    <div class="container-fluid">
      <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
        <div class="col-md-4 px-0 px-md-6 order-1 order-md-0">
          GeoDashboard
        </div>
        <div class="col-md-6 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
          <div class="dropdown border-md-right border-0 py-3 text-right">
            <a href="#"
               class="dropdown-toggle text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end"
               data-toggle="dropdown">
              <div class="mr-4 w-48px">
                @if (Auth::user()->image == null)
                  <img src="{{ asset('assets/images/my-profile.png') }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
                @else
                  <img src="/storage/{{ Auth::user()->image }}" alt="{{ auth()->user()->name }}" class="rounded-circle"> 
                @endif
              </div>
              <div class="fs-13 font-weight-500 lh-1">
                {{ auth()->user()->name }}
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right w-100">
              @if (Auth::user()->is_agent)
                  <a class="dropdown-item" href="{{ route('agent.profile', Auth::user()->id) }}">My Profile</a>
              @else
                  <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
              @endif
              
              <form method="POST" action="{{ route('logout') }}">
                @csrf
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      this.closest('form').submit();"
              >Logout</a>
            </form>
            </div>
          </div>
          <div class="dropdown no-caret py-3 px-3 px-sm-6 d-flex align-items-center justify-content-end notice">
            <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
               data-toggle="dropdown">
              <i class="far fa-bell"></i>
              <span class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="min-width: 250px;">
              <div class="px-5">
                <span>No notification here.</span>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>