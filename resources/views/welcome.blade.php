@extends('layouts.app')

@section('content')

@guest
<div class="container my-5">
    <div class="row justify-content-center">
    <div class="jumbotron">
        <h1 class="display-3">Welcome to ARGUPEDIA</h1>
        <p class="lead">The importance of logically structured debates has never been more critical. 
        Argupedia is the platform for just that! </p>
        <hr class="my-2">
        <p>Take part in and start your own debates by registering an account</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="register" role="button">Register</a>
            <a class="btn btn-primary btn-lg" href="login" role="button">Login</a>
        </p>
    </div>
    </div>
@endguest
@auth 
<div class="container my-5">
    <div class="row justify-content-center">
    <div class="jumbotron">
        <h1 class="display-3">Welcome to ARGUPEDIA</h1>
        <p class="lead">The importance of logically structured debates has never been more critical. 
        Argupedia is the platform for just that! </p>
        <hr class="my-2">
        <p>Thanks for logging in! Get started now by creating a debate. </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="create" role="button">Create</a>
            <a class="btn btn-primary btn-lg" href="mydebate" role="button">My Debates</a>
        </p>
    </div>
    </div>
@endauth

      </div>
</div>


@endsection