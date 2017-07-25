<?php

function binarySearch(array $numbers, int $needle): bool
{
    $low  = 0;
    $high = count($numbers) - 1;
    //Set a loop over input
    while ($low <= $high) {
        $mid = (int) (($low + $high) / 2);

        if ($numbers[$mid] > $needle) {
            //reduce highest bound
            $high = $mid - 1;
        } else if ($numbers[$mid] < $needle) {
            //increase lowest bound
            $low = $mid + 1;
        } else {
            //found
            return true;
        }
    }
    //not found
    return false;
}
$numbers = range(1, 200, 5);

$number = 31;

if (binarySearch($numbers, $number) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}

$number = 196;
if (binarySearch($numbers, $number) !== false) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}
