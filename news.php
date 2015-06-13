<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 21/05/15
 * Time: 13:18
 */
include("conn.php");
//include'header.php';


?>
    <html>
    <head>
        <link rel="stylesheet" href="css/style_certificazioni.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    <body>
    <div id="phpsection">
        <h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-12">Tutte Le News! </h1>


         <section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">
        <?php

//  $newDateString = date_format(date_create_from_format('Y-m-d', $dateString), 'd-m-Y'));
//date("m-d-Y",strtotime($row["data_news"]))
        $sql=('SELECT * FROM news ORDER BY data_news');

        foreach (($connessione->query($sql)) as $row) {

$newDateString = date_format(date_create_from_format('Y-m-d', $row["data_news"]), 'd-m-Y');

            //stampa tutto il DB riga per riga
            echo '<h3>' . $row['titolo'] . '</h3>'.
                     '<div>' . $newDateString . '</div>'.
                     '<img src=img/' . $row['immagine'] . ' width="200"/>'.
                '<div>' . $row['testo'] . '</div>'
                     ;

        }
        ?>


        </section>
    </div>
</body>
</html>

<?php
//include'footer.html';