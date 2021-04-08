@extends('layouts.app')

@section('content')

<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Create Debate Popular Opinion</title>
</head>

<body>
    <div class="container">
        <div class ="row">
            <div class="col-md-6 cold-md-offset-3" style="margin-top:50px">
                <h4> Create Popular Opinion Debate </h4>
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
                <div class="alert alert-dark" role="alert">
                    <strong>Popular Opinion Argument </strong>
                    <p> General Acceptance Premise: <strong> PROPOSITION </strong> is generally accepted as true </p>
                    <p> Presumption Premise: If <strong> PROPOSITION </strong> is generally accepted as being true, that gives a reason in favour of <strong> PROPOSITION </strong></p>
                    <p>Conclusion: There is a reason in favour of <strong> PROPOSITION </strong></p>
                </div>
                <form method="POST" action="{{route('popularopinion.store')}}">
                @csrf
                    <h3 class="header"> 
                    <div class="form-group">
                        <label for="">Debate Name</label>
                        <input type="text" class="form-control" name="debateName" placeholder="Enter the name of the debate">
                    </div>

                    <div class="form-group">
                        <label for="">Argument Name</label>
                        <input type="text" class="form-control" name="argumentName" placeholder="Enter the name of the argument">
                    </div>

                    <div class="form-group">
                        <label for="">PROPOSITION</label>
                        <input type="text" class="form-control" name="proposition" placeholder="Enter name of circumstance that is generally accepted as true">
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