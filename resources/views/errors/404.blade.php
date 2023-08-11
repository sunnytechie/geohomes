@extends('layouts.app')

@section('content')
<style>
    header {
        display: none;
    }
</style>
<main id="content">
    <section class="pt-9 pb-10">
      <div class="container">
        <div class="d-flex justify-content-center mt-3">
            <a href="/">
                <img width="150" height="50" src="{{ asset('assets/images/logo/geohomeslogo.png') }}" alt="">
            </a>
        </div>

        <div class="text-center mb-15">
          <img height="350" width="350" src="{{ asset('assets/images/page-404.jpg') }}" alt="Page 404" class="mb-5">
          <h1 class="fs-22 lh-16 text-dark font-weight-600 mb-5">We can not process this task right now or your session expired.</h1>
          <p class="mb-8">Kindly try performing the task again.. goto <a href="/">homepage</a>.</p>
          {{-- <form>
            <div class="input-group mb-6 mxw-670 shadow-xxs-2 custom-input-group mb-2">
              <div class="input-group-prepend">
                <button class="btn shadow-none text-dark fs-18" type="button"><i class="fal fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control bg-white shadow-none border-0 z-index-1" name="search"
                         placeholder="Enter an address, neighborhood">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </div>
          </form> --}}
        </div>

      </div>
    </section>
  </main>
  @endsection
