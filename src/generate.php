<?php
require 'FileUtility.php';
require 'Random.php';

$random = new Random();
$persons = $random->generatePersons(300);

// Open file for writing
$filename = 'persons.csv';
$file = fopen($filename, 'w');

// Write header
fputcsv($file, [
    'UUID', 'Title', 'First Name', 'Last Name', 'Street Address', 'Barangay', 'Municipality', 'Province', 'Country', 'Phone Number', 'Mobile Number', 'Company Name', 'Company Website', 'Job Title', 'Favorite Color', 'Birthdate', 'Email Address', 'Password'
]);

// Write data
foreach ($persons as $person) {
    fputcsv($file, $person);
}

fclose($file);

echo "Data generated and saved to $filename.";