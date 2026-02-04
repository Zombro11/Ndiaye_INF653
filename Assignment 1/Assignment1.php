// Challenge 1: Displaying Information

<?php
$name = "Oumar";
$age = 21;
$favorite_color = "red";

echo "My name is $name, I am $age years old and my favorite color is $favorite_color.";

?>



//Challenge 2: Using Escape Characters

<?php

// Using escape characters for quotes
echo "He said, \"PHP is fun!\" and left.";

// Multi-line message using \n
echo "First line\nSecond line";

?>



//Challenge 3:Correcting Syntax Errors

<?php
$greeting = 'Hello';
$age = 25;

echo "Welcome to the PHP world!";
echo "\nYour age is $age";
?>



//Challenge 4: Fix Error

<?php
echo "Welcome to PHP!";
$name = "John";
echo "Hello, $name";
?>



//Challenge 5: Adding Comments to Code

<?php
// Set the original price of the product
$price = 50;

# Set the discount amount to subtract
$discount = 10;

/*
 Calculate the final price
 by subtracting the discount
 from the original price
*/
$finalPrice = $price - $discount;

// Display the formatted total price message
echo "Total price: $" . $finalPrice;
?>




//Challenge 1
<?php

// Store the two numbers in variables
$number1 = 10;
$number2 = 5;

// Perform arithmetic operations
$addition = $number1 + $number2;
$subtraction = $number1 - $number2;
$multiplication = $number1 * $number2;
$division = $number1 / $number2;
$modulus = $number1 % $number2;

// Display results
echo "Number 1: $number1\n";
echo "Number 2: $number2\n";
echo "Addition: $addition\n";
echo "Subtraction: $subtraction\n";
echo "Multiplication: $multiplication\n";
echo "Division: $division\n";
echo "Modulus: $modulus\n";

?>




//Challenge 2

<?php
// Store the input number
$number = 7;

// Check if the number is even or odd using modulus
if ($number % 2 == 0) {
    echo "Input: $number\n";
    echo "Output: $number is an even number.";
} else {
    echo "Input: $number\n";
    echo "Output: $number is an odd number.";
}
?>




//Challenge 3

<?php

// Set the starting number
$Starting_Number= 10;
echo "Starting number: $Starting_Number \n ";

// Increment the number
$Starting_Number++;
echo"After increment: $number\n";

// Decrement the number
$Starting_Number--;
echo "After decrement: $number\n";

?>




// Challenge 4

<?php
// Store the student's marks
$marks = 85;

// Determine the grade
if ($marks >= 90) {
    $grade = "A";
} elseif ($marks >= 80) {
    $grade = "B";
} elseif ($marks >= 70) {
    $grade = "C";
} elseif ($marks >= 60) {
    $grade = "D";
} else {
    $grade = "F";
}

// Display result
echo "Input: $marks\n";
echo "Output: You got a $grade!";
?>




//Challenge 5

<?php
// Store the input year
$year = 2024;

// Check leap year condition
if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) {
    echo "Input: $year\n";
    echo "Output: $year is a leap year.";
} else {
    echo "Input: $year\n";
    echo "Output: $year is not a leap year.";
}
?>
