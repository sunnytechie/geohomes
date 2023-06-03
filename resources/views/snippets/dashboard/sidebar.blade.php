<div class="db-sidebar bg-white">
    <nav class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
      <div class="sticky-area shadow-xs-1 py-3">
        <div class="d-flex px-3 px-xl-6 w-100">
          <a class="navbar-brand" href="/">
            <img height="40" width="120" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="GeoHomes">
          </a>
          <div class="ml-auto d-flex align-items-center ">
            <div class="d-flex align-items-center d-xl-none">
              <div class="dropdown px-3">
                <a href="#" class="dropdown-toggle d-flex align-items-center text-heading"
                     data-toggle="dropdown">
                  <div class="w-48px">
                    @if (Auth::user()->image == null)
                    <img src="assets/images/my-profile.png" alt="{{ auth()->user()->name }}" class="rounded-circle">
                      @else
                    <img src="/storage/{{ Auth::user()->image }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
                    @endif
                  </div>
                  <span class="fs-13 font-weight-500 d-none d-sm-inline ml-2">
                    {{ auth()->user()->name }}
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                  </form>
                </div>
              </div>
              <div class="dropdown no-caret py-4 px-3 d-flex align-items-center notice mr-3">
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
            <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                  data-target="#primaryMenuSidebar"
                  aria-controls="primaryMenuSidebar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
        <div class="collapse navbar-collapse bg-white" id="primaryMenuSidebar">
          <form class="d-block d-xl-none pt-5 px-3">
            <div class="input-group">
              <div class="input-group-prepend mr-0 bg-input">
                <button class="btn border-0 shadow-none fs-20 text-muted pr-0" type="submit"><i
                          class="far fa-search"></i></button>
              </div>
              <input type="text" class="form-control border-0 form-control-lg shadow-none"
                     placeholder="Search for..." name="search">
            </div>
          </form>
          <ul class="list-group list-group-flush w-100">
            <li class="list-group-item pt-6 pb-4">
              <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Main</h5>
              <ul class="list-group list-group-no-border rounded-lg">
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="{{ route('dashboard.index') }}" class="text-heading lh-1 sidebar-link">
                    <span class="sidebar-item-icon d-inline-block mr-3 fs-20"><i class="fal fa-cog"></i></span>
                    <span class="sidebar-item-text">Dashboard</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="list-group-item pt-6 pb-4">
              <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Task</h5>
              <ul class="list-group list-group-no-border rounded-lg">
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="{{ route('transaction') }}" class="text-heading lh-1 sidebar-link">
                    <span class="sidebar-item-icon d-inline-block mr-3 fs-18"><i class="fal fa-dollar-sign" style="color: #ababab"></i></span>
                    <span class="sidebar-item-text">Transactions</span>
                  </a>
                </li>
                
                {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#" class="text-heading lh-1 sidebar-link">
                    <span class="sidebar-item-icon d-inline-block mr-3 fs-18"><i class="fal fa-map" style="color: #ababab"></i></span>
                    <span class="sidebar-item-text">Allocation</span>
                  </a>
                </li> --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="{{ route('schedule') }}" class="text-heading lh-1 sidebar-link">
                    <span class="sidebar-item-icon d-inline-block mr-3 fs-18"><i class="fal fa-calendar" style="color: #ababab"></i></span>
                    <span class="sidebar-item-text">Schedules</span>
                  </a>
                </li>
                
              </ul>
            </li>

            

            <li class="list-group-item pt-6 pb-4">
              <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Listings</h5>
              <ul class="list-group list-group-no-border rounded-lg">
                {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#"
                         class="text-heading lh-1 sidebar-link">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                      <svg class="icon icon-add-new"><use
                                      xlink:href="#icon-add-new"></use></svg></span>
                    <span class="sidebar-item-text">Add new</span>
                  </a>
                </li>

                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#"
                         class="text-heading lh-1 sidebar-link d-flex align-items-center">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <svg class="icon icon-my-properties"><use
                                      xlink:href="#icon-my-properties"></use></svg>
                    </span>
                    <span class="sidebar-item-text">Our Agents</span>
                    <span class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold">29</span>
                  </a>
                </li> --}}
                
               
                {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#"
                         class="text-heading lh-1 sidebar-link d-flex align-items-center">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <svg class="icon icon-review"><use xlink:href="#icon-review"></use></svg>
                    </span>
                    <span class="sidebar-item-text">Reviews</span>
                    <span class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold">29</span>
                  </a>
                </li> --}}
                @if (Auth::user()->is_admin)
                {{-- Projects --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#project_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-briefcase"></i>
                    </span>
                    <span class="sidebar-item-text">Estate</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                {{-- Projects dropdown --}}
                <div class="collapse" id="project_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('projects.index') }}">Listing Estate</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('projects.create') }}">Add New Estate</a>
                      </li>
                    </ul>
                  </div>
                </div>

                {{-- Plots --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#plot_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-map"></i>
                    </span>
                    <span class="sidebar-item-text">Plots</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                <div class="collapse" id="plot_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('plots.index') }}">Plots</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('plots.create') }}">Add New plot</a>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif
                 
                @if (Auth::user()->is_admin || Auth::user()->is_agent)
                {{-- Property --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#property_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-house"></i>
                    </span>
                    <span class="sidebar-item-text">Properties</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                {{-- Property dropdown --}}
                <div class="collapse" id="property_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('properties.index') }}">Listing Properties</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('properties.create') }}">Add New Property</a>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif

               @if (Auth::user()->is_admin)
                {{-- Destinations --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#destination_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-map"></i>
                    </span>
                    <span class="sidebar-item-text">Destinations</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                {{-- Destination --}}
                <div class="collapse" id="destination_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('destinations.index') }}">Listing Destinations</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('destinations.create') }}">Add New Destination</a>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif

                {{-- Agents --}}
                @if (Auth::user()->is_admin)
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#agent_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-users"></i>
                    </span>
                    <span class="sidebar-item-text">GeoHomes Agents</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                {{-- Agents dropdown list --}}
                <div class="collapse" id="agent_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('agents.index') }}">Our Agents</a>
                      </li> --}}
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="#">Approved Agents</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="#">Pending Agents</a>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif

                {{-- Invoice --}}
                {{-- <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#invoice_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-file-invoice"></i>
                    </span>
                    <span class="sidebar-item-text">Your Invoice</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>--}}
                

              {{-- Invoice dropdown list --}}
              {{-- <div class="collapse" id="invoice_collapse">
                <div class="card card-body border-0 bg-transparent py-0 pl-6">
                  <ul class="list-group list-group-flush list-group-no-border">
                    <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                      <a class="text-heading lh-1 sidebar-link" href="{{ route('invoices.index') }}">Invoice listing</a>
                    </li>
                  </ul>
                </div>
              </div>  --}}

              </ul>

            </li>


            <li class="list-group-item pt-6 pb-4">
              <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Acount</h5>
              <ul class="list-group list-group-no-border rounded-lg">
                
                @if (Auth::user()->is_admin)
                {{-- Admins --}}
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <a href="#admin_collapse" class="text-heading lh-1 sidebar-link d-flex align-items-center" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-users"></i>
                    </span>
                    <span class="sidebar-item-text">GeoHomes Admins</span>
                    <span class="d-inline-block ml-auto"><i class="fal fa-angle-down"></i></span>
                  </a>
                </li>

                {{-- Only Admin --}}
               
                <div class="collapse" id="admin_collapse">
                  <div class="card card-body border-0 bg-transparent py-0 pl-6">
                    <ul class="list-group list-group-flush list-group-no-border">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('admins.index') }}">Manage Admin</a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a class="text-heading lh-1 sidebar-link" href="{{ route('admins.create') }}">Create Admin</a>
                      </li>
                    </ul>
                  </div>
                </div>
                @endif

                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  @if (Auth::user()->is_agent)
                  <a href="{{ route('agent.profile', Auth::user()->id) }}" class="text-heading lh-1 sidebar-link">
                  @else
                  <a href="{{ route('profile.show') }}" class="text-heading lh-1 sidebar-link"> 
                  @endif
                  
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-user"></i>
                    </span>
                    <span class="sidebar-item-text">My Profile</span>
                  </a>
                </li>
                <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  this.closest('form').submit();" class="text-heading lh-1 sidebar-link">
                    
                    <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                      <i class="fal fa-sign-out"></i>
                    </span>
                    <span class="sidebar-item-text">Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>