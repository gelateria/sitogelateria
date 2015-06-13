<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 21/05/15
 * Time: 12:07
 */
include'header.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style_certificazioni.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
<body>


<div id="phpsection" >
    <h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-4">Le nostre Certificazioni! </h1>
    <section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">



        <?php

        include("conn.php");


        $sql=('SELECT * FROM certificazione ORDER BY data_certificazione');

        foreach (($connessione->query($sql)) as $row) {

            //Formatto la data in ITA
    $data_it = date_format(date_create_from_format('Y-m-d', $row["data_certificazione"]), 'd-m-Y');

            //stampa tutto il DB riga per riga
            echo '<h3>' . $row['nome_certificazione'] . '</h3>
        <div>' . $data_it. '</div>
        <div>' . $row['nome_certificazione'] . '</div>
        <div> <img src=img/' . $row['logo_certificazione'] . ' width="200"/>';

}
?>

    </section>
</div>

</body>
</html>

<?php
include'footer.html';