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
            VALUES ('" . implode("', '", $sqlData) . "', 1)";

        try {
            $sql = $sql;
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
}
?>
<html>
    <head>
        <title>BV:</title>
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
                <h1>Add new book</h1>

                <form action="/new.php" method="post">
                    <div class="form-row">
                        <label for="title">title:</label> 
                        <input type="text" id="title" name="title">
                    </div>
                    <div class="form-row">
                        <label for="author">author:</label> 
                        <input type="text" id="author" name="author">
                    </div>
                    <div class="form-row">
                        <label for="comment">review:</label> 
                        <input type="text" id="comment" name="comment">
                    </div>
                    <div class="form-row">
                        <label for="publishing_year">publishing year:</label> 
                        <input type="text" id="publishing_year" name="publishing_year">
                    </div>
                    <div class="form-row">
                        <label for="cover_image">cover:</label> 
                        <input type="text" id="cover_image" name="cover_image">
                    </div>
                    <div class="form-row">
                        <label for="genre">genre:</label> 
                        <input type="text" id="genre" name="genre">
                    </div>
                    <div class="form-row">
                        <input type="submit" value="Add">
                    </div>
                </form> 
            </div>
        </div>

    </body>
</html>

