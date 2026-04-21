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

    
    $cssGenre= "";
    if (strtolower($book["genre"]) == strtolower("mystery") )
        $cssGenre = "mystery";
    elseif (strtolower($book["genre"]) == strtolower("high fantasy") )
        $cssGenre = "highfantasy";
    elseif (strtolower($book["genre"]) == strtolower("Lovecraftian horror") ) 
        $cssGenre = "lovecraftianhorror";
    elseif (strtolower($book["genre"]) == strtolower("horror") )
        $cssGenre = "horror";
    elseif (strtolower($book["genre"]) == strtolower("fantasy") )
        $cssGenre = "fantasy";
    elseif (strtolower($book["genre"]) == strtolower("urban fantasy") )
        $cssGenre = "urbanfantasy";
    elseif (strtolower($book["genre"]) == strtolower("science-fiction") )
        $cssGenre = "sciencefiction";
    else
        $cssGenre = "book";
    
    $coverfilename= "";
    if ($book["cover_image"] == "")
        $coverfilename = "no-cover.jpg";
    else 
        $coverfilename = $book["cover_image"];
?>

<html>
    <head>
        <title>BV: <?= $book["title"] ?></title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <script src="https://kit.fontawesome.com/09881e4f6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
        <link rel="stylesheet" href="/media/styles/theme_<?= $cssGenre ?>.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="/media/scripts/readingstatus.js"></script>

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
                        <h1><?= $book["title"] ?> von <?= $book["author"] ?></h1>
                    </div>
                </div>

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

                            <div>
                                <a href="/deletebook.php/book/<?= $book["id"] ?>">Delete</a>
                                <a href="/editbook.php/book/<?= $book["id"] ?>">Edit</a>
                            </div>

                        </div>
                    
                        <table class="item-data">
                            <tbody>
                                <tr>
                                    <th>title:</th>
                                    <td><?= $book["title"] ?></td>
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
                                    <th>genre:</th>
                                    <td><?= $book["genre"] ?></td>
                                </tr>
                                
                                <?php if(count($bookmarks) > 0) : ?>
                                    <tr>
                                        <th>bookmarks:</th>
                                        <td>
                                            <?php foreach ($bookmarks as $bookmark) : ?>
                                                Page: <?= $bookmark["page_number"] ?> =
                                                "<?= $bookmark["comment"] ?>" <br />
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <tr>
                                    <th>total page number</th>
                                    <td><?= $book["total_page_number"] ?></td>
                                </tr>
                                <tr>
                                    <th>read page number</th>
                                    <td><?= $book["read_page_number"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

