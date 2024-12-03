<?php

echo "Day 03\n";

$input = file_get_contents(__DIR__ . "/input.txt");
//$input = 'xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';
preg_match_all("(mul(\()([0-9]+),([0-9]+)(\)))", $input, $matches);

$total = 0;

foreach ($matches[0] as $match) {
    preg_match_all("([0-9]+)", $match, $digits);

    $total += $digits[0][0] * $digits[0][1];
}

echo "Total: $total\n";