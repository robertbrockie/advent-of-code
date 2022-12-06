<?php

// open the file, and break the line into an array of characters
$input = fopen("input.txt", "r") or die("Unable to open file!");
$charArray = str_split(trim(fgets($input)));
fclose($input);

$markerLength = 14;
$marker = [];

for ($index = 0; $index < count($charArray); $index = $index + 1) {
    $char = $charArray[$index];

    if (count($marker) < $markerLength) {
        array_push($marker, $char);
    } else {
        // we have enough characters are they unique?
        if (count(array_unique($marker)) === $markerLength) {
            die("Index: " . ($index) . "\n");
        } else {
            // remove the first char and add the current char
            array_shift($marker);
            array_push($marker, $char);
        }
    }
}
