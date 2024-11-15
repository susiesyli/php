<!doctype html>
<html>
<head>
<title>hello</title>
</head>

<body>
    Here is some straight HTML.<br />
<?php
// Check if 'n' is set in the query string
if (isset($_GET['n']) && is_numeric($_GET['n'])) {
    $n = intval($_GET['n']);
    
    // Generate Fibonacci sequence
    $fibSequence = [];
    if ($n > 0) $fibSequence[] = 0; // Add the first Fibonacci number
    if ($n > 1) $fibSequence[] = 1; // Add the second Fibonacci number
    
    for ($i = 2; $i < $n; $i++) {
        $fibSequence[] = $fibSequence[$i - 1] + $fibSequence[$i - 2];
    }
    
    // Prepare the response
    $response = [
        'length' => $n,
        'fibSequence' => $fibSequence
    ];
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle invalid input
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input. Please provide a numeric value for "n".']);
}
?>

	
</body>
</html>