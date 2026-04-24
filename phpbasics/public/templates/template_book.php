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

    $tagnames = array();
    try {
        $sql = "SELECT * FROM tagname";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                
                $tagnames[] = $row;
            }
            unset($result);
        } else {
            echo "Tags: No records found.";
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $tags = array();
    try {
        $sql = "SELECT tag.id, tag.book_id, tagname.name, tagname.display_name, tagname.icon FROM tag INNER JOIN tagname ON tag.tagname_id=tagname.id WHERE tag.book_id = $bookId";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                
                $tags[] = $row;
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
    elseif (strtolower($book["genre"]) == strtolower("cyberpunk") )
        $cssGenre = "cyberpunk";
    elseif (strtolower($book["genre"]) == strtolower("survival horror") )
        $cssGenre = "survivalhorror";
    elseif (strtolower($book["genre"]) == strtolower("contemporary horror") )
        $cssGenre = "contemporaryhorror";
    elseif (strtolower($book["genre"]) == strtolower("occult horror") )
        $cssGenre = "occulthorror";
    elseif (strtolower($book["genre"]) == strtolower("dystopian fiction") )
        $cssGenre = "dystopianfiction";
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
                                <a class="button-link" href="/deletebook.php/book/<?= $book["id"] ?>">
                                <i class="fa-icon fa-sharp fa-solid fa-file-circle-xmark"></i>
                                Delete</a>
                                <a class="button-link" href="/editbook.php/book/<?= $book["id"] ?>">
                                <i class="fa-icon fa-sharp fa-solid fa-file-pen"></i>
                                Edit</a>
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

                <div class="card-container">
                    <div class="card-content">
                        
                        <div class="js-tag-manager tag-manager">
                            <div class="tag-list">
                                <?php if(count($tags) > 0) : ?>
                                    <?php foreach ($tags as $tag) : ?>

                                        <div class="js-tag-display tag-display">
                                            <a href="/index.php/filterbytag/<?= $tag['name'] ?>">
                                                <i class="fa-icon fa-sharp fa-solid <?= $tag['icon'] ?>"></i> 
                                                <span><?= $tag['display_name'] ?></span>
                                            </a>
                                            <span class="js-delete-tag">
                                                <i class="fa-icon fa-sharp fa-solid fa-trash-can"></i>
                                            </span>
                                            <input type="hidden" name="tagid" id="tagid" value="<?= $tag["id"] ?>" />
                                        </div>

                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>


                            <div>
                                <select name="tagselect" id="tagselect" class="tagselect">
                                    <?php if(count($tagnames) > 0) : ?>
                                        <?php foreach ($tagnames as $tagname) : ?>
                                            <option value="<?= $tagname['id'] ?>">
                                                 <i class="fa-icon fa-sharp fa-solid fa-trash-can"></i>
                                                 <?= $tagname['display_name'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>

                                <input type="hidden" name="bookid" id="bookid" value="<?= $book["id"] ?>" />
                                <input class="js-add-tag" type="submit" value="Add tag">
                            </div>
                        </div>
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

