<title>Customer details {{ $user->name }}</title>
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

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6">
        <div class="row">
            <div class="col-md-7 shadow offset-md-2 pb-4">
                <div class="my-3 d-flex justify-content-between align-items-center" style="padding: 15px; background: #fff">
                    <b>Partner's Information</b>
                    {{-- approve btn --}}
                    <div class="d-flex">
                        <form class="m-0 p-0 border-right" method="post" action="{{ route('block.unblock.user', $user->id) }}">
                            @csrf
                            @if (!$user->blocked)
                            <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to block this user?')">Block<span class="ml-1">user</span></button>
                            @else
                            <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to unblock this user?')">Unblock<span class="ml-1">user</span></button>
                            @endif
                        </form>

                        <form class="m-0 p-0" method="post" action="{{ route('approve.agent', $user->agent->id) }}">
                            @csrf
                            @if ($user->agent->approval == "approved")
                            <button class="btn rounded-0 btn-sm btn-danger" onclick="return confirm('Are you sure you want to revoke this approval?')">Revoke<span class="ml-1">Approval</span></button>
                            @else
                            <button class="btn rounded-0 btn-sm btn-success" onclick="return confirm('Are you sure you want to approve this agent?')">Approve<span class="ml-1">Agent</span></button>
                            @endif
                        </form>
                    </div>
                </div>

                @isset($user->image)
                        <img src="/storage/{{ $user->image }}" style="width: 80px; height: 80px; border-radius: 50%; margin: 10px auto; display: block" alt="avatar">
                @endisset

                <div class="d-flex">
                    <div class="mr-5">Name:</div>
                    <div>{{ $user->name }}</div>
                </div>
                <div class="d-flex">
                    <div class="mr-5">Email:</div>
                    <div>{{ $user->email }}</div>
                </div>

                <div class="d-flex">
                    <div class="mr-5">Brand:</div>
                    <div>{{ $user->agent->agent_brand_name }}</div>
                </div>

                <div class="d-flex">
                    <div class="mr-5">Phone:</div>
                    <div>{{ $user->agent->office_number }} {{ $user->agent->mobile_number }} {{ $user->phone }}</div>
                </div>

                <div class="d-flex">
                    <div class="mr-5">Address:</div>
                    <div>{{ $user->agent->address }}</div>
                </div>

                <div class="my-3" style="padding: 15px; background: #fff">
                    <b>More details</b>
                </div>

                <div class="d-flex">
                    <div class="mr-5">Brand:</div>
                    <div>{{ $user->agent->agent_brand_name }}</div>
                </div>


                <div class="d-flex align-items-center">
                    <div class="mr-5">Partnership Type:</div>
                  <p class="align-self-center mb-0 user-name">{{ $user->agent_type ?? "Not found" }}</p>
                </div>


                <div class="d-flex">
                    <div class="mr-5">Registered:</div>
                    <div>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</div>
                </div>



                <div class="d-flex my-2">
                    <div class="mr-5">Downloadables:</div>
                    <div>@isset($user->cac)
                        @if ($user->cac_extention == "image")
                            <a class="btn btn-sm" style="background: #654321; color: #ffffff" href="/storage/{{ $user->cac }}" download>Download<span class="ml-1">CAC Image</span></a>
                        @else
                        <a class="btn btn-sm" style="background: #654321; color: #ffffff" href="/{{ $user->cac }}" download>Download<span class="ml-1">CAC Doc</span></a>
                        @endif
                        @else
                            <div class="text-black">Not found</div>
                        @endisset</div>
                </div>

                <div class="d-flex my-2">
                    <div class="mr-4">CAC RC No.</div>
                    <div>
                        @isset($user->rc_no)
                <span class="badge badge-green text-capitalize">
                    {{ $user->rc_no }}
                    </span>
                @else
                <div class="text-black">Not found</div>
                @endif
                    </div>
                </div>

            </div>
        </div>
      </div>


    </div>
@endsection
