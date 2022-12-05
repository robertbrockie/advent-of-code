<?php

$total = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while (!feof($input)) {
    $line = trim(fgets($input));

    $parts = explode(',', $line);

    $range1Parts = explode('-', $parts[0]);
    $range2Parts = explode('-', $parts[1]);

    $range1 = range($range1Parts[0], $range1Parts[1]);
    $range2 = range($range2Parts[0], $range2Parts[1]);

    if (
        (in_array($range1Parts[0], $range2) && in_array($range1Parts[1], $range2)) ||
        (in_array($range2Parts[0], $range1) && in_array($range2Parts[1], $range1))
    ) {
        $total = $total + 1;
    }
}

fclose($input);

echo "Total: $total\n";
