<?php
// Set headers to allow cross-origin requests (adjust as needed)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Handle CORS preflight requests (OPTIONS method)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

// Include necessary files and classes
require_once 'config/database.php'; // Include database configuration
require_once 'controllers/AuthController.php'; // Include AuthController

// Determine the requested endpoint and method
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Define routes (simplified; adjust as needed)
$routes = [
  'login' => ['controller' => 'AuthController', 'method' => 'login'],
  // Add more routes as needed for different functionalities
];

// Parse the request URI to extract endpoint and parameters
$uriParts = explode('/', $requestUri);
$endpoint = isset($uriParts[1]) ? $uriParts[1] : null;

// Check if the requested endpoint exists in the routes
if (array_key_exists($endpoint, $routes)) {
  $controllerName = $routes[$endpoint]['controller'];
  $methodName = $routes[$endpoint]['method'];

  // Create an instance of the requested controller
  $controller = new $controllerName();

  // Check if the method exists in the controller
  if (method_exists($controller, $methodName)) {
    // Handle the request by calling the controller method
    switch ($requestMethod) {
      case 'POST':
        // Process POST request
        $postData = json_decode(file_get_contents('php://input'), true);
        $response = call_user_func_array([$controller, $methodName], $postData);
        break;
      // Add cases for other request methods (GET, PUT, DELETE) if needed
      default:
        http_response_code(405); // Method Not Allowed
        $response = ['success' => false, 'message' => 'Method Not Allowed'];
    }
  } else {
    http_response_code(404); // Not Found
    $response = ['success' => false, 'message' => 'Endpoint Not Found'];
  }
} else {
  http_response_code(404); // Not Found
  $response = ['success' => false, 'message' => 'Endpoint Not Found'];
}

// Return JSON response
echo json_encode($response);
?>