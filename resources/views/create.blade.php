@extends('layouts.app')

@section('content')
<div class="container">
<br>
<div class="row justify-content-center" >
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Action Argument Scheme</h4>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
  </div>
  <div class="card">
  <div class="card-body">
  <div class="alert alert-dark" role="alert">
                    <p> In <strong>CIRCUMSTANCE</strong> take <strong>ACTION</strong> to achieve<strong> GOAL </strong> which promotes <strong> VALUE </strong>  </p>
                </div>
  <a href="action" class="btn btn-primary">Use Scheme</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Expert Opinion Argument Scheme</h4>
  </div>
</div>
<div class="card">
  <div class="card-body">
        <div class="alert alert-dark" role="alert">
                    <p> Expertise Assumption: <strong> PERSON/SOURCE  </strong> is an expert in the  <strong> FIELD </strong> containing <strong> PROPOSITION </strong>  </p>
                    <p> Assertion Premise: <strong> PERSON </strong> asserts that <strong> CIRCUMSTANCE </strong> is true/false </p>
                    <p> Conclusion: <strong>CIRCUMSTANCE</strong> may plausibly taken to be true/false </p>
        </div>
        <a href="expopinion" class="btn btn-primary">Use Scheme</a>

  </div>
  </div>
  <div class="card">
  <div class="card-body">
    <h4 class="card-title">Position To Know Argument Scheme</h4>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
  </div>
  <div class="card">
  <div class="card-body">
  <div class="alert alert-dark" role="alert">
                    <p> Position to Know Premise: <strong> PERSON </strong> is in a position to know whether <strong> CIRCUMSTANCE </strong> is true/false </p>
                    <p> Assertion Premise: <strong> PERSON </strong> asserts that <strong> CIRCUMSTANCE </strong> is true/false </p>
                    <p> Conclusion: <strong>CIRCUMSTANCE</strong> may plausibly taken to be true/false </p>
                </div>
                <a href="postoknow" class="btn btn-primary">Use Scheme</a>

  </div>
  </div>
  <div class="card">
  <div class="card-body">
    <h4 class="card-title">Popular Opinion Argument Scheme</h4>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
  </div>
  <div class="card">
  <div class="card-body">
  <div class="alert alert-dark" role="alert">
                    <strong>Popular Opinion Argument </strong>
                    <p> General Acceptance Premise: <strong> PROPOSITION </strong> is generally accepted as true </p>
                    <p> Presumption Premise: If <strong> PROPOSITION </strong> is generally accepted as being true, that gives a reason in favour of <strong> proposition </strong></p>
                    <p>Conclusion: There is a reason in favour of <strong> PROPOSITION </strong></p>
                </div>
                <a href="popularopinion" class="btn btn-primary">Use Scheme</a>
  </div>
  </div>

</div>
</div>
</div>
</div>
</div>

@endsection
