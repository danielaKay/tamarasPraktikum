<?php
    $urlParams = explode("/", $_SERVER['REQUEST_URI']);
    if(count($urlParams) > 2) $urlController = $urlParams[2];
    if(count($urlParams) > 3) $urlParam = $urlParams[3];
    // if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
    // if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

    if(isset($urlParam) && $urlParam != "") {

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

        $sql = "DELETE FROM book WHERE id = " . $urlParam . ";";

        try {
            $sql = $sql;
            $conn->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        header('Location: /index.php');
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
        <link rel="stylesheet" href="/media/styles/theme_deletebook.css">
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
                        <h1>Delete book</h1>
                    </div>
                </div>

                <div class="card-container">
                    <div class="card-content">
                        <p>Book deleted</p>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

