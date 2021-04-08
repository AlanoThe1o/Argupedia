@extends('layouts.app')

@section('content')

<div class="container">
<ul>
@foreach($variables as $i)
<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{$i->argument_name}}</h4>
    <h6 class="card-subtitle mb-2 text-muted">Votes: {{$i->votes}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Votes: {{$i->votes}}</h6>
    <p class="card-text"> Status:  </p>
    <a href="{{route('argument.show',$i['id'])}}" class="btn btn-primary">View Argument</a>
    <a href="#" class="btn btn-primary">Attack Argument</a>
  </div>
</div>
@endforeach
</ul>
</div>
</div>
@endsection