<?php

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
}
?>
<html>
    <head>
        <title>BV: <?= $book["title"] ?></title>
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
                <h1><?= $book["title"] ?> von <?= $book["author"] ?></h1>

                <div class="book-data-container">
                    <div class="cover-image"> 
                        <img src="/media/images/<?= $book["cover_image"] ?>" />
                    </div>
                
                    <table class="item-data">
                        <tbody>
                            <tr>
                                <th>Title:</th>
                                <td><?= $book["title"] ?></td>
                            </tr>
                            <tr>
                                <th>Autor:</th>
                                <td><?= $book["author"] ?></td>
                            </tr>
                            <tr>
                                <th>Erscheinungsdatum:</th>
                                <td><?= $book["publishing_year"] ?></td>
                            </tr>
                            <tr>
                                <th>Bewertung</th>
                                <td><?= $book["comment"] ?></td>
                            </tr>
                            <tr>
                                <th>genre</th>
                                <td><?= $book["genre"] ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- <div>
                    <label for="genre">Choose a genre:</label>
                    <select name="genre" id="genre">
                        <option value="horror">horror</option>
                        <option value="fantasy">fantasy</option>
                        <option value="romance">romance</option>
                        <option value="paranormal">paranormal</option>
                    </select>
                </div> -->
            </div>
        </div>

    </body>
</html>

