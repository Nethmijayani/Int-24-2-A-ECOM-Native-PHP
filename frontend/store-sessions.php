<?php

session_start();
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $authToken = isset($_POST['authToken']) ? $_POST['authToken'] : null;
    $role = isset($_POST['role']) ? $_POST['role'] : null;

    // Check for required fields
    if ($authToken && $role) {
        // This is a login request
        $_SESSION['authToken'] = $authToken;
        $_SESSION['role'] = $role;

      
        if ($username) {
            $_SESSION['username'] = $username;
        }

        echo json_encode(['success' => true, 'message' => 'Login session stored successfully.']);
    } elseif ($username && $email) {
        // This is a registration request
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        echo json_encode(['success' => true, 'message' => 'Registration session stored successfully.']);
    } else {
        // Missing required data
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid or incomplete data provided.']);
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
