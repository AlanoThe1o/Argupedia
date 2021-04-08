@extends('layouts.app')

@section('content')

<div class="container">
<ul>
<br>
@if(\Session::has('success'))
                    <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                    </div>
@endif

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Expert Opinion Argument</h4>
    <h6 class="card-subtitle mb-2 ">Expertise Assumption: <strong>{{$variables->expert}} </strong> is an expert in the field <strong>{{$variables->domain}}</strong> containing proposition: <strong>{{$variables->proposition}}</strong></h6>
    <h6 class="card-subtitle mb-2 ">Assertion Premise: <strong>{{$variables->expert}}</strong> asserts that proposition: <strong>{{$variables->proposition}}</strong> is <strong>
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
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">How credible is <strong>{{$variables->expert}} </strong> as an expert?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is <strong>{{$variables->expert}}</strong> an expert in the field containing the proposition: <strong>{{$variables->proposition}}</strong>?</a>
      <br>
      <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">What did <strong>{{$variables->expert}}</strong> say that implies <strong>{{$variables->proposition}}</strong> is <strong> @if($variables->state == 0)
        false
        @else
            true
    @endif</strong>?</a>
    <br>
    <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is <strong>{{$variables->expert}}</strong> reliable and trustworthy?</a>
    <br>
    <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is the proposition: <strong>{{$variables->proposition}}</strong> consistent with what other experts say?</a>
    <br>
    <a href="{{route('schemeselect',[$debate->id,$argument->id])}}" class="card-link">Is <strong>{{$variables->expert}}</strong>'s claim that the proposition: <strong>{{$variables->proposition}}</strong> is <strong> @if($variables->state == 0)
        false
        @else
            true
    @endif</strong> based on evidence?</a>
    </div>
  </div>
  </div>

</div>
@endsection