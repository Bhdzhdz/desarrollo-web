<?php

class Database
{
  private $host = 'localhost'; // Change this to your database host
  private $user = 'username'; // Change this to your database username
  private $password = 'password'; // Change this to your database password
  private $dbname = 'your_database_name'; // Change this to your database name
  private $dbh;
  private $stmt;

  public function __construct()
  {
    // Set DSN (Data Source Name)
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

    // Set options
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create a new PDO instance
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
    } catch (PDOException $e) {
      die("Database connection error: " . $e->getMessage());
    }
  }

  // Prepare a SQL query statement
  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Bind values to parameters in a prepared statement
  public function bindValues($params)
  {
    foreach ($params as $key => $value) {
      $this->stmt->bindValue($key, $value);
    }
  }

  // Execute the prepared statement
  public function execute()
  {
    return $this->stmt->execute();
  }

  // Get a single result set as an associative array
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Get multiple result sets as an array of associative arrays
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get the row count of the executed statement
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
?>