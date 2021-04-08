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
    <h4 class="card-title">Popular Opinion Argument</h4>
    <h6 class="card-subtitle mb-2 ">General Acceptance Premise: <strong>{{$variables->proposition}} </strong> is generally accepted as true</h6>
    <h6 class="card-subtitle mb-2 ">Presumption Premise: If <strong>{{$variables->proposition}}</strong> is generally accepted as being true, that gives a reason in favour of <strong>{{$variables->premise}}</strong> 
    <h6 class="card-subtitle mb-2 ">Conclusion: There is a reason in favour of <strong>{{$variables->proposition}}</strong></h6>
    <a href="{{route('plusVote',[$argument->id])}}" class="btn btn-primary">+1</a>
    <a href="{{route('negVote',[$argument->id])}}" class="btn btn-primary">-1</a>
    <br>
    <h6 class ="card-subtitle mb-2 text-muted"> Votes: {{$argument->votes}}</h6>
  </div>
</div>
</ul>
</div>
<div class="card">
<div class="card-body">
      <h4 class="card-title">Critical Questions</h4>
      <h6 class="card-subtitle mb-2 ">To attack the argument, consider and select one of the critical questions in order for your argument to be logically correct.</h6> 
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">What evidence do we have to believe that <strong>{{$variables->proposition}}</strong> is generally accepted as true?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}"# class="card-link">Even if <strong>{{$variables->proposition}}</strong> is generally accepted as true, are there good reasons for doubting it's veracity?</a>
      <br>
    </div>
  </div>
  </div>
</div>
@endsection