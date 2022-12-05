<?php

// A -> ROCK (1 point)
// B -> PAPER (2 points)
// C -> SCISSORS (3 points)

$outcomePoints = [
    "X" => 0, // LOSE
    "Y" => 3, // TIE
    "Z" => 6, // WIN
];


$shapePoints = [
    'AX' => 3, // ROCK - LOSE = SCISSORS (3 points)
    'AY' => 1, // ROCK - TIE = ROCK (1 point)
    'AZ' => 2, // ROCK - WIN = PAPER (2 points)

    'BX' => 1, // PAPER - LOSE = ROCK (1 point)
    'BY' => 2, // PAPER - TIE = PAPER (2 points)
    'BZ' => 3, // PAPER - WIN = SCISSORS (3 ponts)

    'CX' => 2, // SCISSORS - LOSE = PAPER (2 point)
    'CY' => 3, // SCISSORS - TIE = SCISSORS (3 points)
    'CZ' => 1, // SCISSORS - WIN = ROCK (1 ponts)
];

$total = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while (!feof($input)) {
    $line = fgets($input);

    $parts = explode(" ", trim($line));

    $outcomeKey = $parts[1];
    $shapeKey = $parts[0].$parts[1];

    $total = $total + $outcomePoints[$outcomeKey] + $shapePoints[$shapeKey];
}
fclose($input);

echo "Total: $total\n";
