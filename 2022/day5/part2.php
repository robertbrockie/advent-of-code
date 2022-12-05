<?php

$stackData = [];
$moveData = [];
$stacks = [];
$numStacks = 0;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

// build the inital stack and move data
while (!feof($input)) {
    $line = fgets($input);
    $array = str_split($line);

    // ignore blanks
    if (count($array) === 1 && !trim($array[0])) {
        // do nothing
    } else if ($array[0] === "m") { // push moves on moveData
        array_push($moveData, trim($line));
    } else if (is_numeric($array[1])) { // get the stack number rows
        // split the stack number string by white space
        $parts = preg_split('/\s+/', trim($line));
        $numStacks = count($parts);
    } else { // stack data
        array_push($stackData, $array);
    }
}

fclose($input);

// order the stackData
$stackData = array_reverse($stackData);

// create simple stacks
for ($i = 0; $i < $numStacks; $i = $i + 1) {
    array_push($stacks, []);
}

// setup the stacks based on the stackData
foreach ($stackData as $value) {
    for ($i = 0; $i < $numStacks; $i = $i + 1) {
        $stackIndex = ($i * 4) + 1;
        if (isset($value[$stackIndex]) && trim($value[$stackIndex])) {
            array_push($stacks[$i], $value[$stackIndex]);
        }
    }
}

// apply the moves
foreach ($moveData as $move) {
    $moveParts = explode(" ", $move);

    $numToMove = (int)$moveParts[1];
    $fromStack = ((int)$moveParts[3]) - 1;
    $toStack = ((int)$moveParts[5]) - 1;

    $toMove = [];

    for ($i = 0; $i < $numToMove; $i = $i + 1) {
        $value = array_pop($stacks[$fromStack]);
        
        array_push($toMove, $value);
    }

    $stacks[$toStack] = array_merge($stacks[$toStack], array_reverse($toMove));
}

//var_dump($stacks);

// spit out the last element of each stack
foreach($stacks as $stack) {
    echo array_pop($stack);
}
echo "\n";