<?php

echo "Day 03\n";

$input = file_get_contents(__DIR__ . "/input.txt");
//$input = "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))";
preg_match_all('((mul(\()([0-9]+),([0-9]+)(\)))|(don\'t\(\))|(do\(\)))', $input, $matches);

$total = 0;

//var_dump($matches[0]);

$do = true;
foreach ($matches[0] as $match) {
    if ($match == "don't()") {
        $do = false;
        continue;
    }

    if ($match == "do()") {
        $do = true;
        continue;
    }

    if ($do) {
        preg_match_all("([0-9]+)", $match, $digits);
        $total += $digits[0][0] * $digits[0][1];
    }
}

echo "Total: $total\n";
