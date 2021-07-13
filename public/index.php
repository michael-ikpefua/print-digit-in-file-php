<?php

function calculateDigitsInFile(string $filePath) {
    $file = fopen($filePath, "r");
    if (!$file) {
        return "Error opening file";
    }
    $sum = 0;
    $fileName = "";

    while (($item = fgets($file)) != false) {
        if (preg_match('/^\d+$/', $item)){
            $sum = $sum + (int) $item;
        } else {
            $fileName = $item;
        }
    }
    fclose($file);

    if (!$fileName) {
        echo $filePath . " - " . $sum;
        echo "<br >";

        return $sum;
    }

    $newSum = $sum + calculateDigitsInFile(trim($fileName));
    echo $filePath . " - " . $newSum;
    echo "<br >";

    return $newSum;

}

calculateDigitsInFile("A.txt");


