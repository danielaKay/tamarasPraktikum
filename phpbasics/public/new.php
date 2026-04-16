<?php

/* $servername = "database";
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

$book = array();

try {
  $sql = "SELECT * FROM book WHERE id = 1";
  $result = $conn->query($sql);
  if ($result->rowCount() > 0) {
    while($row = $result->fetch()) {
        
        $book = $row;
    }
    unset($result);
  } else {
    echo "No records found.";
  }
} catch(PDOException $e) {
  echo "Error: " . $sql . "<br>";
} */
?>
<html>
    <head>
        <title>BV:</title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
    </head>
    <body>
        <div class="page-container">
            <div class="navigation">
                <a href="index.php">Home</a>
            </div>
            <div class="main-content">
                <h1> von </h1>
            <form action="/action_page.php">
                <div class="form-row">
                    <span class="key">
                        <label for="title">title:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="title" name="title">
                    </span>
                </div>
                <div class="form-row">
                    <span class="key">
                        <label for="author">author:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="author" name="author">
                    </span>
                </div>
                <div class="form-row">
                    <span class="key">
                        <label for="comment">review:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="comment" name="comment">
                    </span>
                </div>
                <div class="form-row">
                    <span class="key">
                        <label for="publishing_year">publishing year:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="publishing_year" name="publishing_year">
                    </span>
                </div>
                <div class="form-row">
                    <span class="key">
                        <label for="cover">cover:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="cover" name="cover">
                    </span>
                </div>
                <div class="form-row">
                    <span class="key">
                        <label for="genre">genre:</label> 
                    </span>
                    <span class="value">
                       <input type="text" id="genre" name="genre">
                    </span>
                </div>
            </form> 

                
               
            </div>
        </div>

    </body>
</html>

