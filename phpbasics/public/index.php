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

?>

<html>
    <head>
        <title>Bücher-Verwaltung: Übersicht</title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
    </head>
    <body>
        <div class="page-container">
            <div class="navigation">
                <a href="">Home</a>
            </div>
            <div class="main-content">
                <h1>Bücher-Verwaltung: Übersicht</h1>

                <div class="item-summary-list">
                    <?php foreach ($books as $key => $book) : ?>

                        <div class="book-data-container">
                            <div class="cover-image"> 
                            <img src="/media/images/<?= $book["cover_image"] ?>" />
                            </div>
                        
                            <table class="item-data">
                                <tbody>
                                    <tr>
                                        <th>title:</th>
                                        <td><a href="item_0<?= $key+1 ?>.php">
                                                    <?= $book["title"] ?>
                                                </a></td>
                                    </tr>
                                    <tr>
                                        <th>author:</th>
                                        <td><?= $book["author"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>publishing year:</th>
                                        <td><?= $book["publishing_year"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>review</th>
                                        <td><?= $book["comment"] ?></td>
                                    </tr>
                                    <tr>
                                        <th>genre</th>
                                        <td><?= $book["genre"] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                        <!-- <div class="book-data-container">
                            <div class="cover-image"> 
                                <img src="/media/images/<?= $book["cover_image"] ?>" />
                            </div>
                            <div class="item-summary">
                                <div class="data">
                                    <span class="key">Title:</span>
                                    <span class="value">
                                        <a href="item_0<?= $key+1 ?>.php">
                                            <?= $book["title"] ?>
                                        </a>
                                    </span>
                                </div>
                                <div class="data">
                                    <span class="key">author:</span>
                                    <span class="value">
                                        <?= $book["author"] ?>
                                    </span>
                                </div>
                                <div class="data">
                                    <span class="key">review:</span>
                                    <span class="value">
                                        <?= $book["comment"] ?>
                                    </span>
                                </div>
                                <div class="data">
                                    <span class="key">publishing year:</span>
                                    <span class="value">
                                        <?= $book["publishing_year"] ?>
                                    </span>
                                </div>
                                <div class="data">
                                    <span class="key">Cover:</span>
                                    <span class="value">
                                        <?= $book["cover_image"] ?>
                                    </span>
                                </div>
                                <div class="data">
                                    <span class="key">genre:</span>
                                    <span class="value">
                                        <?= $book["genre"] ?>
                                    </span>
                                </div>
                            </div>
                         </div>-->
                    <?php endforeach ?>    
                </div>

            </div>
        </div>

    </body>
</html>

