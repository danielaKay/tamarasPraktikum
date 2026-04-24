<?php

    $urlParams = explode("/", $_SERVER['REQUEST_URI']);
    if(count($urlParams) > 2) $urlController = $urlParams[2];
    if(count($urlParams) > 3) $urlParam = $urlParams[3];
    // if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
    // if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

    $servername = "database";
    $username = "tamara";
    $password = "daniela";
    $dbname = "tamara";

    $books = array();

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if(isset($urlController) && $urlController == "filterbytag") {
        $bookids = array();
        try {
            $sql = "SELECT book_id FROM tag WHERE tagname_id = '$urlParam';";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    
                    array_push($bookids, $row[0]);
                }
                unset($result);
            } else {
                echo "No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $tagname = "";
        try {
            $sql = "SELECT display_name FROM tagname WHERE id = '$urlParam';";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    $tagname = $row[0];
                }
                unset($result);
            } else {
                echo "No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $sql = "SELECT * FROM book WHERE id IN ( " . implode(", ", $bookids) . ");";

    } else {
        $sql = "SELECT * FROM book";
    }

    $books = array();
    try {
        $sql = $sql;
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="/media/scripts/readingstatus.js"></script>
        <script src="/media/scripts/tag-manager.js"></script>
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
                        <?php if(isset($urlController) && $urlController == "filterbytag") : ?>
                            <h2>Filtered by tag "<?= $tagname ?>"</h2>
                        <?php endif ?>
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
                                <div class="left-container">
                                    <div class="cover-image"> 
                                        <img src="/media/images/<?= $coverfilename ?>" />
                                    </div>
                                    <div 
                                        class="js-readingstatus readingstatus" 
                                        data-total-number="<?= $book["total_page_number"] ?>" 
                                        data-read-number="<?= $book["read_page_number"] ?>">
                                        <div class="js-readingstatus-progress readingstatus-progress"></div>
                                    </div>

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