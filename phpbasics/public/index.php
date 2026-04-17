<?php

    $urlParams = explode("/", $_SERVER['REQUEST_URI']);
    if(count($urlParams) > 2) $urlController = $urlParams[2];
    if(count($urlParams) > 3) $urlParam = $urlParams[3];
    if (isset($urlController)) echo "urlController: " . $urlController . "<br />";
    if (isset($urlParam)) echo "urlParam " . $urlParam . "<br />";

    if (isset($urlController) && isset($urlParam)) {
        $bookId = $urlParam;
        include('templates/template_book.php');
    } else {
        include('templates/template_overview.php');
    }

?>
