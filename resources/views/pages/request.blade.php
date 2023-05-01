@extends('layouts.app')

@section('content')
<style>
    .remove-this-item {
      display: none !important;
    }
</style>


<script>
    // Get the header element
    const header = document.querySelector('header');

    // Remove the navbar-dark class
    header.classList.remove('navbar-dark');

    // Add the navbar-light class
    header.classList.add('navbar-light');
</script>
@endsection