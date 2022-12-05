<?php

$elfNo = 1;
$elfCalorieCount = 0;

$maxElf = $elfNo;
$maxCalories = $elfCalorieCount;

// open the input file
$input = fopen("input.txt", "r") or die("Unable to open file!");

while(!feof($input)) {
    $line = fgets($input);

    if (trim($line)) {
        $elfCalorieCount = $elfCalorieCount + (int)$line;
    } else {
        // does this elf have the most calories
        if($elfCalorieCount > $maxCalories) {
            $maxElf = $elfNo;
            $maxCalories = $elfCalorieCount;
        }
        echo "Elf $elfNo: $elfCalorieCount\n";
    
        $elfNo = $elfNo + 1;
        $elfCalorieCount = 0;
    }
}

fclose($input);

echo "Elf $maxElf has the most calories at $maxCalories\n";
