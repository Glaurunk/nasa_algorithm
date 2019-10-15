<h1>A php algorithm in a Laravel nushell</h1>

<p>Below is a case study for a job interview. The study requires to deliver in 3 hursea php console app, something I had never done before and didn't know how. Since I knew from the beginning I couldn't complete the excercise as intented and within time, I decided to place it inside a laravel application and work through it as a web app. Eventually the logic should be similar to the console app; its php after all.</p>
<p>The time It took me to complete this excercise and upload it to this repository was around six hours (double than the intented!). However it has a nice form instead of some ugly console cursor input and some input validation which consumed most of my time (I spent two hours alone in trying to make laravel 6.2 validation requests work to no avail and a couple more hours validating strings and integers; though a bit counter-productive it was admittedly fun :) )</p>
<p>Certainly the code could use much improvement, especially a couple of functions to get rid of all the repetitive code; and surely some more debugging; maybe some other time along with some visualization, perhaps!</p>
<p>Feel free to comment if you care. What I am especially curious about is to weather yjis problem could be solved with OOP and how.</p>

<p>Best regards</p>

<em>
<p>-------------Overview--------------</p>

<p>
Purpose of this assignment is to demonstrate your level of algorithm implementation skills.
Read the specification and start implementing the algorithm. It is not required to implement the
whole algorithm but any part that you deliver should be completed. It is better to deliver a small
part that is polished rather that the whole algorithm roughly implemented. Database usage is not
required. Web server usage is not required.</p>

<p>Evaluation Points</p>
</ul>
● Usage of latest PHP
● Deliver the project in online git repo (github, gitlab, bitbucket or other)
● Deliver PHP Console App
● Run instructions
● Usage of Composer
● Runs through Docker
● Code Standards Consistency
● Use of Design Patterns
● Use of Unit Tests
</ul>
<br>
<p>Specification</p>
<p>
A squad of robotic rovers is to be landed by NASA on a plateau on Mars.
This plateau, which is curiously rectangular, must be navigated by the rovers so that their on
board cameras can get a complete view of the surrounding terrain to send back to Earth.
A rover's position is represented by a combination of an x and y coordinates and a letter
representing one of the four cardinal compass points. The plateau is divided up into a grid to
simplify navigation. An example position might be 0, 0, N, which means the rover is in the
bottom left corner and facing North.
In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R'
and 'M'. 'L' and 'R' makes the rover spin 90 degrees left or right respectively, without moving
from its current spot.
'M' means move forward one grid point, and maintain the same heading.
Assume that the square directly North from (x, y) is (x, y+1).
</p>

<p>Input</p>

<p>The first line of input is the upper-right coordinates of the plateau, the lower-left coordinates are
assumed to be 0,0.
The rest of the input is information pertaining to the rovers that have been deployed. Each rover
has two lines of input. The first line gives the rover's position, and the second line is a series of
instructions telling the rover how to explore the plateau.
The position is made up of two integers and a letter separated by spaces, corresponding to the
x and y coordinates and the rover's orientation.
Each rover will be finished sequentially, which means that the second rover won't start to move
until the first one has finished moving.</p>

<p>Output</p>
<p>The output for each rover should be its final coordinates and heading.</p>

<p>Example<br>
Test input:<br>
5 5<br>
1 2 N<br>
LMLMLMLMM<br>
3 3 E<br>
MMRMMRMRRM<br>
Test output:<br>
1 3 N<br>
5 1 E</p>
</em>
