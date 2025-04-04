<?php
echo "Enter number of students: ";
$n = (int)trim(fgets(STDIN));

$students = [];

for ($i = 0; $i < $n; $i++) {
    echo "Enter student name " . ($i + 1) . ": ";
    $students[] = trim(fgets(STDIN));
}

// Display original array
echo "Original Array:\n";
print_r($students);
echo "\n";

// Sort in ascending order
$ascSorted = $students;
asort($ascSorted);
echo "Sorted in Ascending Order:\n";
print_r($ascSorted);
echo "\n";

// Sort in descending order
$descSorted = $students;
arsort($descSorted);
echo "Sorted in Descending Order:\n";
print_r($descSorted);
echo "\n";
