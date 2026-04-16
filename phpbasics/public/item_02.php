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

// $sql = "INSERT INTO book (title, author, publishing_year, comment, user_id)
//     VALUES 
//     ('Tiny dungeon: Zweite edition', 'Alan Bahr', 2021, 'ein schönes einsteigerfreundliches Regelwerk', 1),
//     ('Investigators handbook', 'Sandy Petersen', 2016, 'ein gutes Buch wenn man Coc spielen möchte', 1),
//     ('Jäger die Vergeltung', 'Justin Achilli', 2000, 'eine interesannte perspektive in WOD', 1)";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>";
// }

$book = array();

try {
  $sql = "SELECT * FROM book WHERE id = 2";
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
               
            </div>
        </div>

    </body>
</html>

