<!-- Displays listing of all debates with page links -->


@extends('layouts.app')

@section('content')

<div class="container">
<br>
<ul>
@if($debates->count() > 0)
@foreach($debates as $debate)
<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{$debate->debate_name}}</h4>
    <h6 class="card-subtitle mb-2 text-muted">Created at: {{$debate->created_at}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Views: {{$debate->views}}</h6>
    <a href="{{route('debate.show',$debate['id'])}}" class="btn btn-primary">View Debate</a>
  </div>
</div>
@endforeach

@else
<div class="card">
  <div class="card-body">
    <h4 class="card-title">No results found</h4>
  </div>
</div>
@endif
</ul>
<div>
<span>
{{$debates->links()}}
</span>
</div>
<div>
<p></p>
</div>
</div>
<style>
.w-5{
  display: none
}
</style>
@endsection