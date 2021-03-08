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
            <a class="btn btn-primary btn-lg" href="auth/register" role="button">Register</a>
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
            <a class="btn btn-primary btn-lg" href="auth/register" role="button">Create</a>
            <a class="btn btn-primary btn-lg" href="login" role="button">My Account</a>
        </p>
    </div>
    </div>
@endauth

    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">Recently Created</button>
                <button type="button" class="btn btn-secondary">Trending</button>
                <button type="button" class="btn btn-secondary">Most Views</button>
            </div>
        </div>
        <div class="col-md--3">
        </div>
    </div>
    <div class="row justify content-center">
        <div class="column">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beyonce is better than Shakira </h4>
                    <p class="card-text">
                    Beyonce is better...
                    </p>
                    <a href="#!" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection