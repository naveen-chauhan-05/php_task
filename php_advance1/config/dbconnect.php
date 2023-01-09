<?php
namespace App;
use mysqli;
use query;
// error_reporting( E_ALL );
// ini_set('display_errors', '1');
class user{
public $servername = "localhost";
public $username = "root";
public $password = "root";
public $dbname = "database16";
public $conn; 
 function connect(){
$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
if ($this->conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
 
 return $this->conn;
}
 
}
 
?>