<?php
    // print_r($_POST) . "<br />";
    // echo count($_POST) . "<br />";

    if(count($_POST) > 0) {

        $servername = "database";
        $username = "tamara";
        $password = "daniela";
        $dbname = "tamara";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Could not connect. " . $e->getMessage());
        }

        $sqlColumns = array();
        $sqlData = array();

        foreach ($_POST as $key => $value) {
            array_push($sqlColumns, $key);
            array_push($sqlData, $value);
        }

        $sql = "INSERT INTO book (" . implode(", ", $sqlColumns) . ", user_id)
            VALUES ('" . implode("', '", $sqlData) . "', 1);";

        try {
            $sql = $sql;
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    // echo "--" . var_dump($row) . "--<br />";
                }
                unset($result);
            } else {
                echo "Tags: No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $sql = "SELECT LAST_INSERT_ID();";
        $newId = "";
        try {
            $sql = $sql;
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while($row = $result->fetch()) {
                    
                    $newId = $row[0];
                }
                unset($result);
            } else {
                echo "Tags: No records found.";
            }
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        header('Location: /index.php/book/' . $newId);
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
        <link rel="stylesheet" href="/media/styles/theme_addbook.css">
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
                        <h1>Add new book</h1>
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
                                    <input type="text" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="author">author:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="author" name="author">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="comment">review:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="comment" name="comment">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="publishing_year">publishing year:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="publishing_year" name="publishing_year">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="cover_image">cover:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="cover_image" name="cover_image">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="genre">genre:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="genre" name="genre">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="total_page_number">total page number:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="total_page_number" name="total_page_number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="key">
                                    <label for="read_page_number">read page number:</label> 
                                </div>
                                <div class="value">
                                    <input type="text" id="read_page_number" name="read_page_number">
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="submit" value="Add">
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

