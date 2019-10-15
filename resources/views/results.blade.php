@extends('layout')

@section('content')
<div class="card mt-5">
    <div class="card-header"><h2>Results</h2></div>
        <div class="card-body">
            <p>Map Size: {{ $data['map_x'] }} X {{ $data['map_y'] }}</p>
            <hr>
            <p>First rover's starting position and heading: {{ $data['start1_x'] }} {{ $data['start1_y'] }} {{ $data['start1_z'] }}</p>
            <p>First rover's final position and heading: {{ $data['end1_x'] }} {{ $data['end1_y'] }} {{ $data['end1_z'] }}</p>

            <hr>
            <p>Second rover's starting position and heading: {{ $data['start2_x'] }} {{ $data['start2_y'] }} {{ $data['start2_z'] }}</p>
            <p>Second rover's final position and heading: {{ $data['end2_x'] }} {{ $data['end2_y'] }} {{ $data['end2_z'] }}</p>
    </div>
</div>

<p class="mt-5"><a href="/">back</a></p>

@endsection