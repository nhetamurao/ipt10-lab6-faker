<?php
require 'FileUtility.php';

$filename = 'persons.csv';

try {
    // Check if the file exists
    if (!file_exists($filename)) {
        throw new Exception("File does not exist: $filename");
    }

    // Open the CSV file for reading
    $file = fopen($filename, 'r');
    if ($file === false) {
        throw new Exception("Unable to open file: $filename");
    }

    // Read CSV data
    $rows = [];
    while (($row = fgetcsv($file)) !== false) {
        $rows[] = $row;
    }

    fclose($file);

    // Check if rows were read
    if (count($rows) <= 1) {
        echo "Error: File contains no rows or only one row.";
        exit;
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persons Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            position: sticky;
            top: 0;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ddd;
        }
        tbody td {
            vertical-align: top;
        }
    </style>
</head>
<body>
    <h1>Generated Persons Data</h1>

    <?php if ($rows): ?>
    <table>
        <thead>
            <tr>
                <th>UUID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Street Address</th>
                <th>Barangay</th>
                <th>Municipality</th>
                <th>Province</th>
                <th>Country</th>
                <th>Phone Number</th>
                <th>Mobile Number</th>
                <th>Company Name</th>
                <th>Company Website</th>
                <th>Job Title</th>
                <th>Favorite Color</th>
                <th>Birthdate</th>
                <th>Email Address</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i < count($rows); $i++): ?>
                <?php if (empty($rows[$i]) || count($rows[$i]) < count($rows[0])) continue; // Skip empty or incomplete lines ?>
                <tr>
                    <?php foreach ($rows[$i] as $cell): ?>
                    <td><?= htmlspecialchars($cell) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No data available.</p>
    <?php endif; ?>
</body>
</html>
