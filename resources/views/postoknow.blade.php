@extends('layouts.app')

@section('content')

        <ul class="list-group">
            <li class="list-group-item active"> Creating a position to know debate</li>
            <li class="list-group-item">
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">Debate Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Argument Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                </form>
            </li>
        </ul>
        <div>

    
@endsection('content')