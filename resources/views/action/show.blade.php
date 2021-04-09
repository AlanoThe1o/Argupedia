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
      <h4 class="card-title">Action Argument</h4>
      <h6 class="card-subtitle mb-2 ">In the circumstance: <strong>{{$variables->circumstance}} </strong> </h6>
      <h6 class="card-subtitle mb-2 ">Take the action: <strong>{{$variables->action}}</strong></h6>
      <h6 class="card-subtitle mb-2 ">To achieve goal: <strong>{{$variables->goal}}</strong></h6> 
      <h6 class="card-subtitle mb-2 ">Which promotes the value: <strong>{{$variables->value}}</strong></h6>
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
      <h6 class="card-subtitle mb-2 ">These provide insight on how to judge an argument. To attack the argument, consider and select one of the critical questions to base your argument on.</h6>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is the circumstance: <strong>{{$variables->circumstance}}</strong> true?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Does action: <strong>{{$variables->action}}</strong> achieve the goal: <strong>{{$variables->goal}}</strong>?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}"class="card-link">Is there another action that promotes the same value: <strong>{{$variables->value}}</strong>?</a>
      <br>
    </div>
  </div>
</div>

@endsection