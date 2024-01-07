<title>FBILTD - Admin management</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
      {{-- <div class="mb-6">
        <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
        </h2>
        <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
      </div> --}}

      <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5 shadow p-5 text-center">
                You can not post more property until you subscribe to updgrade your current plan. <a href="{{ route('agent') }}">Subscribe to a paid plan now.</a>
            </div>
        </div>
      </div>
      </div>
    </div>
  </main>
@endsection