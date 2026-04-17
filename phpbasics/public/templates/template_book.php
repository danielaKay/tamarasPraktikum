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
            echo "No records found.";
        }
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<html>
    <head>
        <title>BV: <?= $book["title"] ?></title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <script src="https://kit.fontawesome.com/09881e4f6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
    </head>
    <body>
        <div class="page-container">
            <div class="navigation">
                <a href="/index.php"><i class="fa-sharp fa-solid fa-home"></i>Home</a>
                <a href="/new.php">Add Book</a>
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

