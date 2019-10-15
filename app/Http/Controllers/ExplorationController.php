<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class ExplorationController extends Controller
{
    public function home() {

        return view('form');

    }

    public function explore(Request $request)
    {
        // declare array for return data
        $data = [];
        $directions = ['N','E','S','W'];
        $instructions = ['L','R','M'];
        // Basic input data validation. 
        $request->validate([
            'upper_right_coordinates' => 'required',
            'first_rover_starting_position' => 'required',
            'first_rover_instructions' => 'required',
            'second_rover_starting_position' => 'required',
            'second_rover_instructions' => 'required'
        ]);

        // further validate and process first input field: map size
        if ($request->upper_right_coordinates) {
            $coordinates = explode(' ', $request->upper_right_coordinates);

            foreach ($coordinates as $coordinate) {
                if (filter_var($coordinate, FILTER_VALIDATE_INT) === false || $coordinate < 0 || $coordinate > 20) {
                    return redirect('/')->with('error', 'Invalid Coordinates!');
                }
            }
        }
        
        //further validate and process second input field: first rover initial position
        if ($request->first_rover_starting_position) {
            $start_coordinates_first = explode(' ', $request->first_rover_starting_position);
            
                if (filter_var($start_coordinates_first[0], FILTER_VALIDATE_INT) === false || $coordinates[0] < 0 || $coordinates[0] > 20) {
                    return redirect('/')->with('error', 'Invalid Coordinates for First Rover!');
                }
                if (filter_var($start_coordinates_first[1], FILTER_VALIDATE_INT) === false || $coordinates[1] < 0 || $coordinates[1] > 20) {
                    return redirect('/')->with('error', 'Invalid Coordinates for First Rover!');
                }
                if (!in_array(strtoupper($start_coordinates_first[2]), $directions)) {
                    return redirect('/')->with('error', 'Invalid Facing Position for First Rover!');
                }
            }

        //process third input field: first rover instructions
        if ($request->first_rover_instructions) {

            $first_instructions = str_split($request->first_rover_instructions);

            $x1 = $start_coordinates_first[0];
            $y1 = $start_coordinates_first[1];
            $facing1 = strtoupper($start_coordinates_first[2]);

            // foreach instruction we check the facing direction. 
            // If the instruction is to turn then we set a new facing else we change the x/y values according to the the facing direction
            foreach ($first_instructions as $instruction) {

                    // Facing NORTH
                    if ($facing1 == 'N') {
                        switch(strtoupper($instruction)) {
                            case "L":
                                $facing1 = "W";
                                break;
                            case "R":
                                $facing1 = "E";
                                break;
                            case "M":
                                $y1 = $y1+1;
                                break;
                            default:
                                return redirect('/')->with('error', 'Invalid Instructions for Rover #1! Check input at "First Rover Instructions"');
                        }

                    } else if ($facing1 == 'E') {
                        switch(strtoupper($instruction)) {
                            case "L":
                                $facing1 = "N";
                                break;
                            case "R":
                                $facing1 = "S";
                                break;
                            case "M":
                                $x1 = $x1+1;
                                break;
                            default:
                                return redirect('/')->with('error', 'Invalid Instructions for Rover #1! Check input at "First Rover Instructions"');
                        } 

                    }  else if ($facing1 == 'S') {
                        switch(strtoupper($instruction)) {
                            case "L":
                            $facing1 = "W";
                            break;
                        case "R":
                            $facing1 = "E";
                            break;
                        case "M":
                            $y1 = $y1-1;
                            break;
                        default:
                            return redirect('/')->with('error', 'Invalid Instructions for Rover #1! Check input at "First Rover Instructions"');
                    }  
            
                } else if ($facing1 == 'W') {
                    switch(strtoupper($instruction)) {
                        case "L":
                            $facing1 = "S";
                            break;
                        case "R":
                            $facing1 = "N";
                            break;
                        case "M":
                            $x1 = $x1-1;
                            break;
                        default:
                            return redirect('/')->with('error', 'Invalid Instructions for Rover #1! Check input at "First Rover Instructions"');
                    }
                } else {
                    return redirect('/')->with('error', 'Invalid Instructions for Rover #1! Check input at "First Rover Instructions"');
                }
            }

            // check if the instructions lead the rover beyond the x/y grid
            if ($x1 < 0 || $y1 < 0 || $x1 > $coordinates[0] || $y1 > $coordinates[1] ) {
                return redirect('/')->with('error', 'Warning! The instructions will lead the first rover beyond the plateau!');
            }
    }
       
         //process fourth input field: second rover instructions
         // Obviously since we awfully repeat oursheves a couple of function would be preferable:! Maybe Next time, we are already overdue!)
         if ($request->second_rover_starting_position) {
            $start_coordinates_second = explode(' ', $request->second_rover_starting_position);
            
                if (filter_var($start_coordinates_second[0], FILTER_VALIDATE_INT) === false || $coordinates[0] < 0 || $coordinates[0] > 20) {
                    return redirect('/')->with('error', 'Invalid Coordinates for Second Rover!');
                }
                if (filter_var($start_coordinates_second[1], FILTER_VALIDATE_INT) === false || $coordinates[1] < 0 || $coordinates[1] > 20) {
                    return redirect('/')->with('error', 'Invalid Coordinates for Second Rover!');
                }
                if (!in_array(strtoupper($start_coordinates_second[2]), $directions)) {
                    return redirect('/')->with('error', 'Invalid Facing Position for Second Rover!');
                }
            }
        
        //process fifth input field: second rover instructions.
        // TODO : Place validation and process in separate functions to support multiple rovers (and save eyes from bleeding :D).
        if ($request->second_rover_instructions) {

            $second_instructions = str_split($request->second_rover_instructions);

            $x2 = $start_coordinates_second[0];
            $y2 = $start_coordinates_second[1];
            $facing2 = strtoupper($start_coordinates_second[2]);

            // foreach instruction we check the facing direction. 
            // If the instruction is to turn then we set a new facing else we change the x/y values according to the the facing direction
            foreach ($second_instructions as $instruction) {

                    // Facing NORTH
                    if ($facing2 == 'N') {
                        switch(strtoupper($instruction)) {
                            case "L":
                                $facing2 = "W";
                                break;
                            case "R":
                                $facing2 = "E";
                                break;
                            case "M":
                                $y2 = $y2+1;
                                break;
                            default:
                                return redirect('/')->with('error', 'Invalid Instructions for Rover #2! Check input at "Second Rover Instructions"');
                        }

                    } else if ($facing2 == 'E') {
                        switch(strtoupper($instruction)) {
                            case "L":
                                $facing2 = "N";
                                break;
                            case "R":
                                $facing2 = "S";
                                break;
                            case "M":
                                $x2 = $x2+1;
                                break;
                            default:
                                return redirect('/')->with('error', 'Invalid Instructions for Rover #2! Check input at "Second Rover Instructions"');
                        } 

                    }  else if ($facing2 == 'S') {
                        switch(strtoupper($instruction)) {
                            case "L":
                            $facing2 = "W";
                            break;
                        case "R":
                            $facing2 = "E";
                            break;
                        case "M":
                            $y2 = $y2-1;
                            break;
                        default:
                            return redirect('/')->with('error', 'Invalid Instructions for Rover #2! Check input at "Second Rover Instructions"');
                    }  
            
                } else if ($facing2 == 'W') {
                    switch(strtoupper($instruction)) {
                        case "L":
                            $facing2 = "S";
                            break;
                        case "R":
                            $facing2 = "N";
                            break;
                        case "M":
                            $x2 = $x2-1;
                            break;
                        default:
                            return redirect('/')->with('error', 'Invalid Instructions for Rover #2! Check input at "Second Rover Instructions"');
                    }
                } else {
                    return redirect('/')->with('error', 'Invalid Instructions for Rover #2! Check input at "Second Rover Instructions"');
                }
            }

            // check if the instructions lead the rover beyond the x/y grid
            if ($x2 < 0 || $y2 < 0 || $x2 > $coordinates[0] || $y2 > $coordinates[1] ) {
                return redirect('/')->with('error', 'Warning! The instructions will lead the second rover beyond the plateau!');
            }
        }

        // populate array with processed data
        $data = [ 
            'map_x' => $coordinates[0],
            'map_y' => $coordinates[1],
            
            'start1_x' => $start_coordinates_first[0],
            'start1_y' => $start_coordinates_first[1],
            'start1_z' => strtoupper($start_coordinates_first[2]),
            
            'end1_x' => $x1,
            'end1_y' => $y1,
            'end1_z' => $facing1,
            
            'start2_x' => $start_coordinates_second[0],
            'start2_y' => $start_coordinates_second[1],
            'start2_z' => strtoupper($start_coordinates_second[2]),

            'end2_x' => $x2,
            'end2_y' => $y2,
            'end2_z' => $facing2,
        ];

        // return results page with data
        return view('results')->with(compact('data'));
    }
}
// GZ for making it to the end ^^