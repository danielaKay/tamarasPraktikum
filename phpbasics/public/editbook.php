<?php

    $urlParams = explode("/", $_SERVER['REQUEST_URI']);
    if(count($urlParams) > 2) $urlController = $urlParams[2];
    if(count($urlParams) > 3) $urlParam = $urlParams[3];
    // if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
    // if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

    if (isset($urlController) && isset($urlParam)) {
        $bookId = $urlParam;

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

        $book = array();
        try {
            $sql = "SELECT * FROM book WHERE id = $bookId";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    
                    $book = $row;
                }
                unset($result);
            } else {
                echo "Book: No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $bookmarks = array();
        try {
            $sql = "SELECT * FROM bookmark WHERE book_id = $bookId";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    
                    $bookmarks[] = $row;
                }
                unset($result);
            } else {
                echo "Bookmark: No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

    } else {
        echo "error";
    }


?>
<html>
    <head>
        <title>BV:</title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <script src="https://kit.fontawesome.com/09881e4f6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
        <link rel="stylesheet" href="/media/styles/theme_editbook.css">
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
                        <h1>Edit book</h1>
                    </div>
                </div>

                <div class="card-container">
                    <div class="card-content">
                        <form action="/addbook.php" method="post">
                            <div class="form-row">
                                <div class="key">
                                    <label for="title">title:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="title" name="title"value="<?= $book["title"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="author">author:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="author" name="author"value="<?= $book["author"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="comment">review:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="comment" name="comment" value="<?= $book["comment"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="publishing_year">publishing year:</label> 
                                </div>
                                <div class="value">
                                    <input 
                                        type="text" 
                                        id="publishing_year" 
                                        name="publishing_year" 
                                        value="<?= $book["publishing_year"] ?>"
                                    >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="cover_image">cover:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="cover_image" name="cover_image"value="<?= $book["cover_image"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="genre">genre:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="genre" name="genre"value="<?= $book["genre"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="total_page_number">total page number:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="total_page_number" name="total_page_number"value="<?= $book["total_page_number"] ?>">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="key">
                                    <label for="read_page_number">read page number:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="read_page_number" name="read_page_number"value="<?= $book["read_page_number"] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="submit" value="Edit">
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

