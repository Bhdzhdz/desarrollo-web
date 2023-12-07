<?php

class Validation
{
  public static function sanitizeInput($data)
  {
    // Sanitize input to prevent SQL injection and XSS attacks
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public static function validateEmail($email)
  {
    // Validate email format
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function validatePassword($password)
  {
    // Validate password length or complexity requirements
    return strlen($password) >= 6; // Change as per your requirements
  }
}
?>