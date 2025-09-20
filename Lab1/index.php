<?php
// Magic Number Game

// random number generation between 1 and 1000
$number = rand(1, 1000);

// Print the generated number
echo "<h2>Welcome to the Magic Number Game!</h2>";
echo "Your number is: <strong>$number</strong><br><br>";

// Apply rules
if ($number % 3 == 0 && $number % 5 == 0) {
    echo "Magic Number is: <strong>FizzBuzz</strong>";
} elseif ($number % 3 == 0) {
    echo "Magic Number is: <strong>Fizz</strong>";
} elseif ($number % 5 == 0) {
    echo "Magic Number is: <strong>Buzz</strong>";
} else {
    echo "Magic Number is: <strong>$number</strong>";
}
?>
