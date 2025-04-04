<?php
// Array of student names
$students = ["Vishal", "Amit", "Rahul", "Neha", "Pooja"];

// Display original array
echo "Original Array:<br>";
print_r($students);
echo "<br><br>";

// Sort in ascending order
asort($students);
echo "Sorted in Ascending Order:<br>";
print_r($students);
echo "<br><br>";

// Sort in descending order
arsort($students);
echo "Sorted in Descending Order:<br>";
print_r($students);
