<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 21/05/15
 * Time: 13:18
 */
include("conn.php");
include'header.php';


?>

<h1>Tutte Le News! </h1>

<div>
    <section>
        <?php



$sql=('SELECT * FROM news ORDER BY data_news');

foreach (($connessione->query($sql)) as $row){
    //stampa tutto il DB riga per riga
    echo '<h3>' . $row['titolo'] . '</h3>
                     <div>' . $row['data_news'] . '</div>
                     <div>' . $row['immagine'] . '</div>
                     <div>' . $row['testo'] . '</div>';

}
// LINK delete

//echo '<td><a href="news_delete.php?delete=delete
  //          &idnews=' . $row['idnews'] .
    //'&titolo=' . $row['titolo'] .
    //'&data_news=' . $row['data_news'] .
    //'&testo=' . $row ['testo'].
    //'&immagine=' . $row ['immagine'] .
   // '"> DELETE</a></td></tr> ';

?>


    </section>
</div>
</body>
</html>
<?php
include'footer.html';
