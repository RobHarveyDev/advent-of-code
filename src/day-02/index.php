<?php

echo "day 2\n";

$reports = explode("\n", file_get_contents(__DIR__ . "/input.txt"));

$totalSafe = 0;

foreach ($reports as $reportLine) {
    $reportArray = explode(" ", $reportLine);

    if (isSafe($reportArray)) {
        $totalSafe++;
    }
}

echo "Total Reports Safe: $totalSafe\n";

function isSafe(array $report): bool
{
    $direction = null;
    $previousNumber = null;

    for ($i = 0; $i < count($report); $i++) {
        $currentNumber = $report[$i];
        if ($i === 0) {
            $previousNumber = $report[$i];
            continue;
        }

        if ($i === 1) {
            $direction = $previousNumber < $currentNumber ? 'asc' : 'desc';
        }

        if ($previousNumber === $currentNumber) {
            return false;
        }

        if (abs($previousNumber - $currentNumber) > 3) {
            return false;
        }

        if ($direction === 'asc' && $currentNumber < $previousNumber) {
            return false;
        }

        if ($direction === 'desc' && $currentNumber > $previousNumber) {
            return false;
        }

        $previousNumber = $report[$i];
    }

    return true;
}