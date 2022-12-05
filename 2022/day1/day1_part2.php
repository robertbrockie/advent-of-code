<?php

$calories = [];
$count = 0;
// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while(!feof($input)) {
    $line = fgets($input);

    if (trim($line)) {
        $count = $count + (int)$line;
    } else {
        array_push($calories, $count);
        
        $count = 0;
    }
}

fclose($input);
sort($calories);

$calories = array_reverse($calories);

$topThree = $calories[0] + $calories[1] + $calories[2];

echo "$topThree\n";