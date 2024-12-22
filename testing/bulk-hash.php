<?php
// Specify the input and output CSV files
$inputFile = "C:\Users\hp\Downloads\cred - Sheet1 (1).csv"; // Replace with the path to your input CSV file
$outputFile = "C:\Users\hp\Downloads\users.csv"; // Replace with the path to your output CSV file

// Open the input CSV file for reading
if (($inputHandle = fopen($inputFile, 'r')) === false) {
    die("Failed to open input file: $inputFile");
}

// Open the output CSV file for writing
if (($outputHandle = fopen($outputFile, 'w')) === false) {
    die("Failed to open output file: $outputFile");
}

// Process each row of the CSV file
while (($row = fgetcsv($inputHandle)) !== false) {
    // Find the index of the last column
    $lastColumnIndex = count($row) - 1;

    // Hash the data in the last column
    if ($lastColumnIndex >= 0) {
        $row[$lastColumnIndex] = hash('sha256', $row[$lastColumnIndex]);
    }

    // Write the updated row to the output CSV file
    fputcsv($outputHandle, $row);
}

// Close the file handles
fclose($inputHandle);
fclose($outputHandle);

echo "Hashing complete. Updated file saved as: $outputFile\n";
