<?php
require 'FileUtility.php';

$filename = 'persons.csv';
$data = FileUtility::readFromFile($filename);

// Convert CSV data to an array
$lines = explode(PHP_EOL, $data);
$rows = array_map('str_getcsv', $lines);

// Display data in HTML table
echo "<table border='1'>";
echo "<thead><tr>";
foreach ($rows[0] as $header) {
    echo "<th>$header</th>";
}
echo "</tr></thead>";
echo "<tbody>";
for ($i = 1; $i < count($rows); $i++) {
    if (empty($rows[$i])) continue; // Skip empty lines
    echo "<tr>";
    foreach ($rows[$i] as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";