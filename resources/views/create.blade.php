@extends('layouts.app')

@section('content')
<h1> Creating a new debate here </h1>
<div class="btn-group">
  <button type="button" class="btn btn-secondary">Select a scheme</button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="postoknow">Position To Know</a>
    <a class="dropdown-item" href="expopinion">Expert Opinon</a>
    <a class="dropdown-item" href="popappeal">Popular Appeal</a>
  </div>
</div>


@endsection 