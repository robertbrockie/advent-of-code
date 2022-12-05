<?php

$priority = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

$totalPriority = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while(!feof($input)) {
    //read the group
    $line1 = trim(fgets($input));
    $line2 = trim(fgets($input));
    $line3 = trim(fgets($input));

    // convert to arrays
    $array1 = str_split($line1);
    $array2 = str_split($line2);
    $array3 = str_split($line3);

    // get the unique shared values
    $diff = array_unique(array_intersect($array1, $array2, $array3));

    // calculate the priority
    foreach ($diff as $value) {
        $totalPriority = $totalPriority + strpos($priority, $value) + 1;
    }
}

fclose($input);

echo "$totalPriority\n";