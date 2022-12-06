<?php

// open the file, and break the line into an array of characters
$input = fopen("input.txt", "r") or die("Unable to open file!");
$charArray = str_split(trim(fgets($input)));
fclose($input);


$marker = [];

for ($index = 0; $index < count($charArray); $index = $index + 1) {
    $char = $charArray[$index];

    if (count($marker) < 14) {
        // need 4 chars to determine the start
        array_push($marker, $char);
    } else {
        // we have 4 characters are they unique?
        if (count(array_unique($marker)) === 14) {
            die("Index: " . ($index) . "\n");
        } else {
            // remove the first char and add the current char
            array_shift($marker); 
            array_push($marker, $char);
        }
    }
}
