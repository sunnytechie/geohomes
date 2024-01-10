@extends('layouts.admin')

@section('content')
<style>
    .page-content {
        background: #F8F8F8;
    }
</style>

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

      {{-- <div class="mb-6 d-flex justify-content-between align-items-center">
        <h3 style="color: #654321">Create a Post</h3>
        <a href="{{ route('blog.posts.create') }}" class="btn btn-primary">Add New Post</a>
      </div> --}}


        <div class="col-md-8 offset-md-1">
            <div class="px-3 px-lg-6 px-xxl-13 py-4 shadow-sm my-4">
                <div class="mb-6 d-flex justify-content-between align-items-center">
                    <h3 style="color: #654321">Edit Post</h3>
                </div>

                <form action="{{ route('blog.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title ?? old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="editor" name="content" rows="5">{{ $post->body ?? old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <input type="file" class="dropify" id="image" name="image" data-default-file="/storage/{{ $post->image }}">
                    </div>

                    {{-- select categories --}}
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option @if (isset($post->category_id) && $post->category_id == $category->id)
                                    selected
                                @endif value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Add new category --}}
                    <div class="form-group">
                        <label for="category">Add New Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Optional">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>



@endsection
