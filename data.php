<?php
header('Content-Type: application/json');
 

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'crup1_18_GraphTech');
define('DB_PASSWORD', 'Skrrrt10');
define('DB_NAME', 'crup1_18_GraphTech');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT employee_gender, count(*) AS cnt FROM employees WHERE employee_gender IN ('Male', 'Female') GROUP BY employee_gender");
//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);


?>