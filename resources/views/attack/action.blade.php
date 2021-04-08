@extends('layouts.app')

@section('content')

<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Attack Argument Using Expert Opinion</title>
</head>

<body>
    <div class="container">
        <div class ="row">
            <div class="col-md-6 cold-md-offset-3" style="margin-top:50px">
                <h4> Create Action Debate </h4>
                @if(count($errors) > 0)
                    <div class ="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                    </div>
                @endif
                @if(\Session::has('incorrect'))
                    <div class="alert alert-danger">
                    <p>{{\Session::get('incorrect')}}</p>
                    </div>
                @endif
                <div class="alert alert-danger" role="alert">
                    <strong>Attacking the argument: {{$attacking->argument_name}} </strong>
                    <p>In the debate: <strong>{{$attacking->argument_name}}</strong></p>
                </div>
                <div class="alert alert-dark" role="alert">
                    <strong>Action Argument </strong>
                    <p> In <strong>CIRCUMSTANCE</strong> take <strong>ACTION</strong> to achieve<strong> GOAL </strong> which promotes <strong> VALUE </strong>  </p>
                </div>
                <form method="POST" action="{{route('action.storeattack', [$debate,$argument])}}">
                @csrf
                    <h3 class="header"> 
                    <div class="form-group">
                        <label for="">Argument Name</label>
                        <input type="text" class="form-control" name="argumentName" placeholder="Enter the name of the argument">
                    </div>

                    <div class="form-group">
                        <label for="">CIRCUMSTANCE</label>
                        <input type="text" class="form-control" name="circumstance" placeholder="Enter the circumstance">
                    </div>
                    <div class="form-group">
                        <label for="">ACTION</label>
                        <input type="text" class="form-control" name="action" placeholder="Enter the action">
                    </div>
                    <div class ="form-group"?
                        <label for="">GOAL</label>
                        <input type="text" class="form-control" name="goal" placeholder="Enter the goal">
                    </div>
                    <div class ="form-group"?
                        <label for=""> VALUE</label>
                        <input type="text" class="form-control" name="value" placeholder="Enter the value of the goal">
                    </div>
                    <div class="form-group">
                    <button type ="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    
@endsection('content')