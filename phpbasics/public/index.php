<?php

$books = [
    [
        "title" => "Tiny dungeon: Zweite edition",
        "author" =>"Alan Bahr",
        "publishing_year" => 2021,
        "comment" => "ein schönes einsteigerfreundliches Regelwerk",
    ],
    [
        "title" => "Investigators handbook",
        "author" =>"Sandy Petersen",
        "publishing_year" => 2016,
        "comment" => "ein gutes Buch wenn man Coc spielen möchte",
    ],
    [
        "title" => "Jäger die Vergeltung",
        "author" =>"Justin Achilli",
        "publishing_year" => 2000,
        "comment" => "eine interesannte perspektive in WOD",
    ],
];
?>

<html>
    <head>
        <title>Bücher-Verwaltung: Übersicht</title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
    </head>
    <body>
        <div class="page-container">
            <div class="navigation">
                <a href="">Home</a>
            </div>
            <div class="main-content">
                <h1>Bücher-Verwaltung: Übersicht</h1>
                <blockquote>
                    <?php
                        echo 'Hello World!';
                    ?>
                </blockquote>
                <div class="item-summary-list">
                    <?php foreach ($books as $key => $book) : ?>
                        <div class="item-summary">
                            <div class="data">
                                <span class="key">Title:</span>
                                <span class="value">
                                    <a href="item_0<?= $key+1 ?>.php">
                                        <?= $book["title"] ?>
                                    </a>
                                </span>
                            </div>
                            <div class="data">
                                <span class="key">Author:</span>
                                <span class="value">
                                    <?= $book["author"] ?>
                                </span>
                            </div>
                            <div class="data">
                                <span class="key">Review:</span>
                                <span class="value">
                                    <?= $book["comment"] ?>
                                </span>
                            </div>
                            <div class="data">
                                <span class="key">Erscheinungsdatum:</span>
                                <span class="value">
                                    <?= $book["publishing_year"] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach ?>    
                </div>

            </div>
        </div>

    </body>
</html>

