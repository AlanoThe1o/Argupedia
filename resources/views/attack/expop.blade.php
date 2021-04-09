@extends('layouts.app')

@section('content')

<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Create Debate Expert Opinion</title>
</head>

<body>
    <div class="container">
        <div class ="row">
            <div class="col-md-6 cold-md-offset-3" style="margin-top:50px">
                <h4> Create Expert Opinion Attack </h4>
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
                    <strong>Expert Opinion Argument </strong>
                    <p> Expertise Assumption: <strong> PERSON</strong> is an expert in the  <strong> FIELD </strong> containing <strong> PROPOSITION </strong>  </p>
                    <p> Assertion Premise: <strong> PERSON </strong> asserts that <strong> PROPOSITION </strong> is true/false </p>
                    <p> Conclusion: <strong>PROPOSITION</strong> may plausibly taken to be true/false </p>

                </div>
                <form method="POST" action="{{route('expopinion.storeattack', [$debate, $argument])}}">
                @csrf
                    <h3 class="header"> 
                    <div class="form-group">
                        <label for="">Argument Name</label>
                        <input type="text" class="form-control" name="argumentName" placeholder="Enter the name of the argument">
                    </div>

                    <div class="form-group">
                        <label for="">PERSON</label>
                        <input type="text" class="form-control" name="expert" placeholder="Enter the name of the person who is the expert">
                    </div>
                    <div class="form-group">
                        <label for="">FIELD</label>
                        <input type="text" class="form-control" name="field" placeholder="Enter the field your person is an expert in">
                    </div>
                    <div class ="form-group"?
                        <label for="">PROPOSITION</label>
                        <input type="text" class="form-control" name="circumstance" placeholder="Enter the proposition your expert is talking about">
                    </div>
                    <div class ="form-group"?
                        <label for=""> {TRUE/FALSE}</label>
                        <input type="text" class="form-control" name="boolVal" placeholder="Enter true or false">
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