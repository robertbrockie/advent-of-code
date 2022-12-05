<?php

$priority = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

$totalPriority = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while(!feof($input)) {
    $line = trim(fgets($input));

    // split the strings in half
    $part1 = substr($line, 0, floor(strlen($line) / 2));
    $part2 = substr($line, floor(strlen($line) / 2));

    // covert them to arrays
    $array1 = str_split($part1);
    $array2 = str_split($part2);

    // get the unique shared values
    $diff = array_unique(array_intersect($array1, $array2));

    // calculate the priority
    foreach ($diff as $value) {
        $totalPriority = $totalPriority + strpos($priority, $value) + 1;
    }
}

fclose($input);

echo "$totalPriority\n";