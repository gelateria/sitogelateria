<?php
//connessione al db
include("conn.php");
//header
include 'headeramm.php';

//                               ------------------------------------------INIZIO---------------------------------------

// Variabili e Query
$sql=('SELECT * FROM news');
$row=$connessione->query($sql);

if //query per ordinare i campi

(isset($_GET['news_t']) and $sql=('SELECT * FROM news ORDER BY titolo')
        or (isset($_GET['news']) and  $sql=('SELECT * FROM news ORDER BY idnews'))
or (isset($_GET['news_text']) and $sql=('SELECT * FROM testo'))
or (isset($_GET['news_data']) and $sql=('SELECT * FROM news ORDER BY data_news'))
or (isset($_GET['news_img']) and $sql='SELECT * FROM news ORDER BY immagine')
or (empty($_GET) and $sql=('SELECT * FROM news'))
        ) {
    echo'<h1> News Conseguite </h1>

<p> Inserisci News:   <a href="news_backend.php?insert"> INSERT </a> </p>

    <table><tr> <!-- Nomi campi tabella  indicizzabili con GET -->
        <td><a href="news_backend.php?news" > IDcert </a></td>
        <td> <a href="news_backend.php?news_t" > Titolo </a> </td>
        <td> <a href="news_backend.php?news_text" > Testo </a></td >
        <td><a href="news_backend.php?news_data"> Data</a> </td>
        <td><a href="news_backend.php?news_img"> Immagine</a> </td>
        </tr>
';}
// CONNESSIONE DELLA QUERY AL DB
foreach (($connessione->query($sql)) as $row) {

    //stampa tutto il DB riga per riga
    echo '<tr><td>' . $row['idnews']
        . '</td><td>' . $row['titolo']
        . '</td><td>' . $row['testo']
        . '</td><td> ' . $row['data_news']
        . '</td><td>'.$row['immagine']
         . '</td>';

    // LINK update AGGIORNA I DATI
    echo '<td><a href="news_backend.php?update=update
            &idnews=' . $row['idnews'] .
        '&titolo=' . $row['titolo'] .
        '&data_news=' . $row['data_news'] .
        '&testo=' . $row['testo'] .
        '$immagine='.$row['immagine'].
       '">UPDATE</a></tr> or ';

    // LINK delete CANCELLA I DATI
    echo '<td><a href="news_backend.php?delete=delete
            &idnews=' . $row['idnews'] .
        '&titolo=' . $row['titolo'] .
        '&data_news=' . $row['data_news'] .
        '&testo=' . $row ['testo'].
        '&immagine=' . $row ['immagine'] .
        '"> DELETE</a></td></tr> ';

}

//------------------------------------------------------------------------------------------------------------------------------

//pagina INSERT news!!!!!




If(
(isset($_GET['insert']))){

// HTML FORM INSERIMENTO DATI

echo "
             <h1>Aggiungi news</h1>

         <div>
              <form action='#' method='post' >

                 <p>Titolo
                     <input type='text' name='news' required />
                 </p>
                <p>Data
                    <input type='date' name='data' required>
                </p>
                <p>Testo
                     <input type='text' name='testo' maxlength='100' required>
                </p>
                <p>
                Immagine
                    <input name='foto' type='file' >
                 </p>
                       <p> <input type='submit' name='submit' value='INSERISCI' />
                        or &nbsp;
                        Back to <a href='news_backend.php_backend.php'>NEWS</a>
                        </p>
            </form>
        </div>";
echo'</table>';

    // INSERIMENTO DATI DICHIARAZIONE VARAIBILI E QUERY

    if(isset($_POST['submit'])) {


        $news = (isset($_POST['news'])) ? $_POST['news'] : '';
        $data = (isset($_POST['data'])) ? $_POST['data'] : '';
        $testo = (isset($_POST['testo'])) ? $_POST['testo'] : '';
        $img=(isset($_POST['foto'])) ? $_POST['foto'] : '';

        $sql = $connessione->prepare("
                                  INSERT INTO news( `titolo`, `testo`,`data_news`,`immagine`)

                        VALUES ('".$news."','".$data."','".$testo."','".$img."')");
        if ($sql->execute()) {


            echo "Dato: ".$news.", ".$data." Correttamente Inserito
                     <br> Torna alle news <a href='news_backend.php'> Back </a>  ";
        } else {
            die('Impossibile Salvare il Record:  .'.$news." ,  ".$data);
        }
    }



    // chiusura pagina insert
}
// --------------------------------------------------------------------------------------------------------------------------------------------------

/// Pagina DELETE CERTIFICAZIONE !!!!!

if(isset($_GET['delete'])) {


    $id = $_GET['idnews'];
    $news_ = $_GET['titolo_news'];
    $testo_ = $_GET['testo_news'];
    $data_ = $_GET['data_news'];


    echo "
            <form action='#' method='post'>
            <p>Sicuro di voler eliminare la news: " . $id_news . " - " . $data_news . " ?
                 <input type='submit' name='annulla' value='NO' />
                <input type='submit' name='elimina' value='SI' />

          </form>
           ";


    // se si clicca su NO
    if (isset($_POST['annulla'])) {


        echo "
            <p> Hai scelto di non eliminare la news: " . $news_ . "
          <br> Torna alle news <a href='news_backend.php'> Back </a>
          </p>
           ";


    }
}
// se si clicca su si elimina il dato eseguendo la query

if(isset($_POST['elimina'])){

    // esecuzione query cancellazione dato

    $sql= $connessione->exec(" DELETE FROM news WHERE idnews=".$id);


    echo"<br><br> La News ".$news_." è stata Eliminata!
            <br> <a href='news_backend.php'> Back </a> " ;
    ;

}

// -----------------------------------------------------------------------------------------------------------------------------------


// PAGINA UPDATE!!!!!


if(isset($_GET['update'])){

// il get mi porta i valori  dei recor presenti nei link della pagina SELECT nei campi del form in questa pagina
    $id=$_GET['idnews'];
    $news=$_GET['titolo'];
    $data=$_GET['data_news'];
    $testo=$_GET['testo'];
    $img=$_GET['immagine'];


//definizione condizione post
    if($_POST)
    {
        $idn= (isset($_POST['idn'])) ? $_POST['idn'] : '';
        $titn = (isset($_POST['titn'])) ? $_POST['titn'] : '';
        $datan = (isset($_POST['datan'])) ? $_POST['datan'] : '';
        $testn =(isset($_POST['testn'])) ? $_POST['testn'] : '';
        $imgn =(isset($_POST['imgn'])) ? $_POST['imgn'] : '';

// modifica del record nel db con update
        $sql= $connessione->exec("UPDATE news
    							SET titolo='".$titn."' ,
    							data_news='".$datan."' ,
    							testo='".$testn."',
    							immagine='".$imgn."'
                              	WHERE idnews='".$id."'
                               ");

        //stampo l'avvenuto aggiornamento
        echo "<br><br> Aggiornamento Record Effettuato !!!
            <br> Torna alle certificazioni <a href='news_backend.php'> Back </a>";

    }
    else /// stampa  i campi per aggiornare i dati
    { echo'



<h1>Update News</h1>
<form method="post" action="#">
    <table>
        <tr>
            <td> IDnews</td>
            <td> Titolo</td>
            <td> Data </td>
            <td> Testo </td>
            <td> Immagine </td>
            <td>Action</td>
        </tr>
        <tr>
            <td><input type="text" name="<?php  echo $id ?>" value="'.$id.'"> </td>
            <td><input type="text" name="titn" value="'.$titn.'"> </td>
            <td><input type="text" name="datan" value="'.$datan.'"> </td>
            <td><input type="text" name="testn" value="'.$testn.'"> </td>
            <td><input  type="file" name="imgn"  id="foto" >
            </td>

            <td>
                <input type="submit" name"aggiorna" value="Update">
                <a href="news_backend.php">BACK</a>
            </td>
        </tr>

    </table>
</form> ';

    }

    echo"
</body>
</html>";


}
include('footer.html');
?>
