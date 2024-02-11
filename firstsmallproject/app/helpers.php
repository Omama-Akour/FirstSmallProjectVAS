<?php

declare(strict_types=1); // Declaring strict types for type safety

// Function to format a dollar amount
function formatDollarAmount(float $amount): string
{
    // Determine if the amount is negative
    $isNegative = $amount < 0;

    // Construct the formatted dollar amount string
    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}

// Function to format a date
function formatDate(string $date): string
{
    // Format the date using the 'M j, Y' format
    return date('M j, Y', strtotime($date));
}
