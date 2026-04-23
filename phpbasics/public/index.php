<?php

    $urlParams = explode("/", $_SERVER['REQUEST_URI']);
    echo $_SERVER['REQUEST_URI'] . "<br />";
    if(count($urlParams) > 2) $urlController = $urlParams[2];
    if(count($urlParams) > 3) $urlParam = $urlParams[3];
    // if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
    // if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

    if (isset($urlController) && isset($urlParam)) {
        if($urlController == "book") {
            $bookId = $urlParam;
            include('templates/template_book.php');
        } elseif ($urlController == "api") {

            $apiTarget = explode("?", $urlParam)[0];
            $apiUrlData = explode("?", $urlParam)[1];
            $apiParamData = explode("&", $apiUrlData);
            $apiParams = array();
            foreach($apiParamData as $param) {
                $paramArray = explode("=", $param);
                $apiParams[$paramArray[0]] = urldecode($paramArray[1]);
            }

            if($_SERVER['REQUEST_METHOD'] == "POST" && $apiTarget == "tags" && $apiParams["name"] != "" && $apiParams["book_id"] != "") {
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

                $sql = "INSERT INTO tag (`name`, `display_name`, `book_id`)
                    VALUES ('" . $apiParams["name"] . "', '" . $apiParams["display_name"] . "', " . $apiParams["book_id"] . ");";

                try {
                    $sql = $sql;
                    $conn->exec($sql);
                } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }


            } elseif($_SERVER['REQUEST_METHOD'] == "DELETE" && $apiTarget == "tags" && $apiParams["id"] != "") {
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

                $sql = "DELETE FROM tag WHERE id = " . $apiParams["id"] . ";";

                try {
                    $sql = $sql;
                    $conn->exec($sql);
                } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
                
            }
            else {
                echo "param error" . "<br />";
            }

        } else {
            include('templates/template_overview.php');
        }
    } else {
        include('templates/template_overview.php');
    }

?>
