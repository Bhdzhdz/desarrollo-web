<?php
// Import necessary files and classes
require_once '../models/UserModel.php';
require_once '../utils/Validation.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($username_or_email, $password)
    {
        // Sanitize and validate input
        $username_or_email = Validation::sanitizeInput($username_or_email);
        $password = Validation::sanitizeInput($password);

        // Check if username/email and password are provided
        if (empty($username_or_email) || empty($password)) {
            return ['success' => false, 'message' => 'Please provide username/email and password'];
        }

        // Call the UserModel method to verify credentials
        $user = $this->userModel->getUserByUsernameOrEmail($username_or_email);

        if (!$user) {
            return ['success' => false, 'message' => 'Invalid username/email'];
        }

        // Verify the password
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'Invalid password'];
        }

        // Start a session for the user upon successful login
        session_start();
        $_SESSION['user_id'] = $user['id']; // Store user ID or relevant data in the session
        return ['success' => true, 'message' => 'Login successful'];
    }

    public function logout()
    {
        // Unset all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        return ['success' => true, 'message' => 'Logout successful'];
    }

    // TODO: Implement the following methods
    // - register
    // - forgotPassword
    // - resetPassword
    // - etc.
}
?>