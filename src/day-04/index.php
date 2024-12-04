<?php
echo "Day 4\n";

//$input = file_get_contents(__DIR__ . "/input.txt");

$input = <<<HEREDOC
MMMSXXMASM
MSAMXMSMSA
AMXSXMAAMM
MSAMASMSMX
XMASAMXAMM
XXAMMXXAMA
SMSMSASXSS
SAXAMASAAA
MAMMMXMMMM
MXMXAXMASX
HEREDOC;


$lines = explode("\n", $input);

$board = [];

foreach ($lines as $key => $line) {
    $board[$key] = str_split($line);
}