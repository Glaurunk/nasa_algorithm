@extends('layout')

@section('content')

<h1 class="mt-5">Mars Exploration Panel</h1>
<div class="card">
    <div class="card-header">Input</div>
        <div class="card-body">
            <form action="/explore" method="POST">
                @csrf
                <div class="form-group">
                    <label for="upper_right_coordinates">Upper Right Coordinates</label>
                <input type="text" class="form-control" id="upper_right_coordinates" name="upper_right_coordinates" value="{{ old('upper_right_coordinates') }}" aria-describedby="emailHelp">
                    <small id="upper_right_coordinates_help" class="form-text text-muted">Please enter two space separated integers (max:20)</small>
                </div>
                <hr class="my-5">
                <div class="form-group">
                    <label for="first_rover_starting_position">First Rover Starting Position</label>
                    <input type="text" class="form-control" id="first_rover_starting_position" name="first_rover_starting_position" value="{{ old('first_rover_starting_position') }}" aria-describedby="emailHelp">
                    <small id="first_rover_starting_position_help" class="form-text text-muted">Please enter two space separated integers and a space separated facing letter (N,S,E,W) E.g.: 1 2 E</small>
                </div>
                <div class="form-group">
                    <label for="first_rover_instructions">First Rover Instructions</label>
                    <input type="text" class="form-control" id="first_rover_instructions" name="first_rover_instructions" value="{{ old('first_rover_instructions') }}" aria-describedby="emailHelp">
                    <small id="first_rover_instructions_help" class="form-text text-muted">Please enter a string of instructions</small>
                </div>
                <hr class="my-5">
                <div class="form-group">
                    <label for="second_rover_starting_position">Second Rover Starting Position</label>
                    <input type="text" class="form-control" id="second_rover_starting_position" name="second_rover_starting_position" value="{{ old('second_rover_starting_position') }}" aria-describedby="emailHelp">
                    <small id="second_rover_starting_position_help" class="form-text text-muted">Please enter two space separated integers and a space separated facing letter (N,S,E,W) E.g.: 1 2 E</small>
                </div>
                <div class="form-group">
                    <label for="second_rover_instructions">Second Rover Instructions</label>
                    <input type="text" class="form-control" id="second_rover_instructions" name="second_rover_instructions" value="{{ old('second_rover_instructions') }}" aria-describedby="emailHelp">
                    <small id="second_rover_instructions_help" class="form-text text-muted">Please enter a string of instructions</small>
                </div>
                    
                    <button name="sumbit" id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    <div class="card-footer">
        <div class="error">
            @include('messages') 
        </div>
    </div>
    
@endsection
       
