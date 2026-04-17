<?php

    $servername = "database";
    $username = "tamara";
    $password = "daniela";
    $dbname = "tamara";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        echo $sql . "<br>" . $e->getMessage();
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
                <a href="/index.php">Home</a><a href="/new.php">Add Book</a>
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
                                        <td><a href="/index.php/book/<?= $key+1 ?>">
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
                    <?php endforeach ?>    
                </div>

            </div>
        </div>

    </body>
</html>