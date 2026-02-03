// Challenge 1: Displaying Information

<?php
$name = Oumar;
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

