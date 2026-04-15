<?php
    $title = "Tiny dungeon: Zweite edition";
    $author = "Alan Bahr";
    $publishing_year = 2021;
    $comment = "ein schönes einsteigerfreundliches Regelwerk";
?>
<html>
    <head>
        <title>BV: <?= $title ?></title>
        <link rel="stylesheet" href="/media/styles/reset.css">
        <link rel="stylesheet" href="/media/styles/styles.css">
        <link rel="stylesheet" href="/media/styles/fonts.css">
        <link rel="stylesheet" href="/media/styles/layout.css">
    </head>
    <body>
        <div class="page-container">
            <div class="navigation">
                <a href="index.html">Home</a>
            </div>
            <div class="main-content">
                <h1><?= $title ?> von <?= $author ?></h1>

                <table class="item-data">
                    <tbody>
                        <tr>
                            <th>Title:</th>
                            <td><?= $title ?></td>
                        </tr>
                        <tr>
                            <th>Autor:</th>
                            <td><?= $author ?></td>
                        </tr>
                        <tr>
                            <th>Erscheinungsdatum:</th>
                            <td><?= $publishing_year ?></td>
                        </tr>
                        <tr>
                            <th>Bewertung</th>
                            <td><?= $comment ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>

