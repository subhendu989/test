<?php
$numbers = [2, 1, 3];

usort($numbers, function ($x, $y) {
    if ($x === $y) {
        return 0;
    }
    return $x < $y ? -1 : 1;
});

print_r($numbers);
