<?php

$urlParams = explode("/", $_SERVER['REQUEST_URI']);
if(count($urlParams) > 2) $urlController = $urlParams[2];
if(count($urlParams) > 3) $urlParam = $urlParams[3];
if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

if (isset($urlController) && isset($urlParam)) {
    $bookId = $urlParam;
    include('template_book.php');
} else {
    include('template_overview.php');
}

/*
$servername = "database";
$username = "tamara";
$password = "daniela";
$dbname = "tamara";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$books = array();

try {
  $sql = "SELECT * FROM book";
  $result = $conn->query($sql);
  if ($result->rowCount() > 0) {
    while($row = $result->fetch()) {
        
        $books[] = $row;
    }
    unset($result);
  } else {
    echo "No records found.";
  }
} catch(PDOException $e) {
  echo "Error: " . $sql . "<br>";
}
*/


?>
