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

    $bookmarks = array();
    foreach($books as $book) {
        
        try {
            $sql = "SELECT COUNT(*) FROM bookmark WHERE book_id = " . $book["id"] . ";";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    $bookmarks[$book["id"]] = $row[0];
                }
                unset($result);
            } else {
                echo "No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    
?>

<html>
    <head>
        <title>Bücher-Verwaltung: Übersicht</title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <script src="https://kit.fontawesome.com/09881e4f6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
        <link rel="stylesheet" href="/media/styles/theme_overview.css">
    </head>
    <body>
        <div class="page-container">
            <div class="card-container">
                <div class="navigation card-content">
                    <a href="/index.php">
                        <i class="fa-icon fa-sharp fa-solid fa-home"></i>
                        Home
                    </a>
                    <a href="/addbook.php">
                        <i class="fa-icon fa-sharp fa-solid fa-book"></i>
                        Add Book
                    </a>
                </div>
            </div>
            <div class="main-content-container">
                <div class="card-container">
                    <div class="card-content">
                        <h1><i class="fa-icon fa-sharp fa-solid fa-book-open-reader"></i>Bücher-Verwaltung: Übersicht</h1>
                    </div>
                </div>

                <div class="item-summary-list">
                    <?php foreach ($books as $book) : ?>
                        
                        <?php
                            $coverfilename= "";
                            if ($book["cover_image"] == "")
                                $coverfilename = "no-cover.jpg";
                            else 
                                $coverfilename = $book["cover_image"];
                        ?>
                        <div class="card-container">
                            <div class="book-data-container card-content">
                                <div class="cover-image"> 
                                <img src="/media/images/<?= $coverfilename ?>" />
                                </div>
                            
                                <table class="item-data">
                                    <tbody>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-scroll"></i>title:</th>
                                            <td><a href="/index.php/book/<?= $book["id"] ?>">
                                                    <?= $book["title"] ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-pencil"></i>author:</th>
                                            <td><?= $book["author"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-calendar-days"></i>publishing year:</th>
                                            <td><?= $book["publishing_year"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-star"></i>review</th>
                                            <td><?= $book["comment"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-clapperboard"></i>genre</th>
                                            <td><?= $book["genre"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-icon fa-sharp fa-solid fa-bookmark"></i>bookmarks</th>
                                            <td><?= $bookmarks[$book["id"]] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach ?>    
                </div>

            </div>
        </div>

    </body>
</html>