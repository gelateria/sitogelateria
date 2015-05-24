<?php
include 'conn.php';
if(isset($_GET['idnews'])) {


    $id = $_GET['idnews'];



    echo "
            <form action='#' method='post'>
            <p>Sicuro di voler eliminare la Certificazione:?
                 <input type='submit' name='annulla' value='NO' />
                <input type='submit' name='elimina' value='SI' />

          </form>
           ";


    // se si clicca su NO
    if (isset($_POST['annulla'])) {


        echo "
            <p> Hai scelto di non eliminare la Certificazione
          <br> Torna alle certificazioni <a href='news_select.php'> Back </a>
          </p>
           ";


    }

    // se si clicca su si elimina il dato eseguendo la query

    if (isset($_POST['elimina'])) {

        // esecuzione query cancellazione dato

        $sql = $connessione->exec(" DELETE FROM news WHERE idnews=" . $id);


        echo "<br><br> La News è stata Eliminata!
            <br> <a href='news_select.php'> Back </a> ";;

    }
}
