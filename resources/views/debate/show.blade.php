<!-- Shows individual arguments within a debate -->


@extends('layouts.app')

@section('content')

<div class="container">
<br>
<ul>
@for ($i = 0; $i < $argumentCount; $i++)
<div class="card">
  <div class="card-body">
    <h4 class="card-title">{{$arguments[$i]->argument_name}}</h4>
    <h6 class="card-subtitle mb-2 text-muted">Votes: {{$arguments[$i]->votes}}</h6>
    <div style="display:inline">
    <p class="card-text"  style="margin: 0; display: inline;"> Status/Labelling: </p> 
    <p class ="badge badge-success"  style="margin: 0; display: inline;"> {{$argument_labelling[$i]}}</p>
    <br>
    <br>
    <a href="{{route('argument.show',$arguments[$i]['id'])}}" class="btn btn-primary">View Argument</a>
    </div>
  </div>
</div>
@endfor
</ul>
</div>
</div>
@endsection