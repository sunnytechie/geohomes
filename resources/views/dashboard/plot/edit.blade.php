<title>FBILTD - Edit Plot {{ $plot->title }}</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
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
    <div class="px-3 px-lg-6 px-xxl-13 pb-5 py-lg-5 my-profile">
      {{-- <div class="mb-6">
        <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
        </h2>
        <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
      </div> --}}

      <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('plots.update', $plot->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="card mb-6">
              <div class="card-body p-6">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Edit Plot</h3>
                  <p class="card-text mb-5">Manage this Plot</p>

                  <div class="form-group">
                      <label for="title" class="text-heading">User title <span class="text-muted">(mandatory)</span></label>
                      <input type="text" class="form-control form-control-lg border-0 @error('title') is-invalid @enderror" placeholder="Plot 1" id="title" value="{{ $plot->title ?? old('title') }}" name="title">
                      
                      @if ($errors->has('title'))
                          <div id="titleHelp" class="form-text text-danger">
                              <div>{{ $errors->first('title') }}</div>
                          </div>
                      @endif
                  </div>


                  <div class="form-group">
                    <label for="project_id" class="text-heading">Estate it belongs: <span class="text-muted">(mandatory)</span></label>
                    <select class="form-control-lg form-control border-0" name="project_id" id="project_id">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @if ($project->id == $plot->project_id) selected @endif>{{ $project->title }}</option>
                        @endforeach
                    </select>
                    
                    @if ($errors->has('project_id'))
                        <div id="project_idHelp" class="form-text text-danger">
                            <div>{{ $errors->first('project_id') }}</div>
                        </div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="description" class="text-heading">Description <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control form-control-lg border-0 @error('description') is-invalid @enderror" placeholder="Description..." id="description" value="{{ $plot->description ?? old('description') }}" name="description">
                    
                    @if ($errors->has('description'))
                        <div id="descriptionHelp" class="form-text text-danger">
                            <div>{{ $errors->first('description') }}</div>
                        </div>
                    @endif
                </div>

                  <div class="form-group">
                    <button class="btn btn-lg btn-primary my-3 w-100">Publish</button>
                  </div>


              </div>
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </main>
@endsection