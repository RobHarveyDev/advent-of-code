<?php

$lines = explode("\n", file_get_contents(__DIR__ . "/input.txt"));

$leftColumn = [];
$rightColumn = [];

foreach ($lines as $line) {
    $row = explode('   ', $line);
    $leftColumn[] = $row[0];
    $rightColumn[] = $row[1];
}

sort($leftColumn, SORT_NUMERIC);
sort($rightColumn, SORT_NUMERIC);

$total = 0;
for ($i = 0; $i < count($leftColumn); $i++) {
    $total += abs($leftColumn[$i] - $rightColumn[$i]);
}

echo "Total Distance between lists is: $total \n";

$similarityScore = 0;
foreach ($leftColumn as $row) {
    $similarityScore += $row * timesInArray($row, $rightColumn);
}

echo "Similarity Score is: $similarityScore \n";

function timesInArray($needle, array $haystack): int
{
    return count(array_filter($haystack, fn ($item) => $item === $needle));
}
