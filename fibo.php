<?php
// Set header to return JSON
header('Content-Type: application/json');

// Get the n parameter from query string
$n = isset($_GET['n']) ? intval($_GET['n']) : 0;

// Function to generate Fibonacci sequence
function generateFibonacci($length) {
    if ($length <= 0) return [];
    if ($length == 1) return [0];
    
    $sequence = [0, 1];
    
    for ($i = 2; $i < $length; $i++) {
        $sequence[] = $sequence[$i-1] + $sequence[$i-2];
    }
    
    return $sequence;
}

// Create response array
$response = [
    'length' => $n,
    'fibSequence' => generateFibonacci($n)
];

// Output JSON
echo json_encode($response);
?>