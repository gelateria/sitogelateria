<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 21/05/15
 * Time: 12:07
 */
include'header.php';
?>


<h1>Le nostre Certificazioni! </h1>

<div>
    <section>
        <?php

        include("conn.php");


        $sql=('SELECT * FROM certificazione ORDER BY data_certificazione');

        foreach (($connessione->query($sql)) as $row) {

            //stampa tutto il DB riga per riga
            echo '<h3>' . $row['nome_certificazione'] . '</h3>
        <div>' . $row['data_certificazione'] . '</div>
        <div>' . $row['logo_certificazione'] . '</div>
        <div>' . $row['nome_certificazione'] . '</div>';

        } ?>


    </section>
</div>


<?php
include'footer.html';
