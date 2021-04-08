@extends('layouts.app')

@section('content')

<div class="container">
<br>
<ul>
@if(\Session::has('success'))
                    <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                    </div>
@endif
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Position To Know Argument</h4>
    <h6 class="card-subtitle mb-2 ">Expertise Assumption: <strong>{{$variables->person}} </strong> is in a position to know whether proposition: <strong>{{$variables->proposition}}</strong> is true or false</h6>
    <h6 class="card-subtitle mb-2 ">Assertion Premise: <strong>{{$variables->person}}</strong> asserts that proposition: <strong>{{$variables->proposition}}</strong> is <strong>
    @if($variables->state == 0)
        false
        @else
            true
    @endif
    </strong>
    </h6>
    <h6 class="card-subtitle mb-2 ">Conclusion: <strong>{{$variables->proposition}}</strong> may plausibly taken to be <strong>
    @if($variables->state == 0)
        false
        @else
            true
    @endif
    </strong>
    </h6>
    <a href="{{route('plusVote',[$argument->id])}}" class="btn btn-primary">+1</a>
    <a href="{{route('negVote',[$argument->id])}}" class="btn btn-primary">-1</a>    <br>
    <h6 class ="card-subtitle mb-2 text-muted"> Votes: {{$argument->votes}}</h6>
  </div>
</div>
</ul>
</div>
<div class="card">
<div class="card-body">
      <h4 class="card-title">Critical Questions</h4>
      <h6 class="card-subtitle mb-2 ">To attack the argument, consider and select one of the critical questions in order for your argument to be logically correct.</h6>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">is <strong>{{$variables->person}} </strong> really in a position to know whether <strong> {{$variables->proposition}}</strong> is <strong>@if($variables->state == 0)
        false
        @else
            true
    @endif
    </strong></a> 
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is <strong>{{$variables->person}}</strong> a trustworthy and reliable source?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Did <strong>{{$variables->person}}</strong> really assert that <strong>{{$variables->proposition}}</strong> is <strong> @if($variables->state == 0)
        false
        @else
            true
    @endif</strong></a>
      <br>
    </div>
  </div>
  </div>
</div>
@endsection