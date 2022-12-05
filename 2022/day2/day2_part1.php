<?php

// A -> ROCK     -> X     [1 point]
// B -> PAPER    -> Y     [2 points]
// C -> SCISSORS -> Z     [3 points]

// WIN [6 points]
// TIE [3 points]
// LOSS [0 points]

$outcomePoints = [
    'AX' => 3,
    'AY' => 6,
    'AZ' => 0,
    'BX' => 0,
    'BY' => 3,
    'BZ' => 6,
    'CX' => 6,
    'CY' => 0,
    'CZ' => 3,
];

$shapePoints = [
    'X' => 1,
    'Y' => 2,
    'Z' => 3,
];

$total = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while (!feof($input)) {
    $line = fgets($input);

    $parts = explode(" ", trim($line));

    $outcomeKey = $parts[0] . $parts[1];
    $shapeKey = $parts[1];

    $total = $total + $outcomePoints[$outcomeKey] + $shapePoints[$shapeKey];
}
fclose($input);

echo "Total: $total\n";
