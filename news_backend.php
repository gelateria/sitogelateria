<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 22/05/15
 * Time: 17:04
 */
// HEADER
include'header.php';

// CONNESSIONE
include("conn.php");


$sql=('SELECT * FROM news');
$row=$connessione->query($sql);



// ------------------------------------------------------- START  -----------------------------------------------------------------------------


// PAGINA SELECT NEWS!!! PRIMA PAGINA VISUALIZZATA



If(             // TUTTE LE QUERY PER ORDINARE I CAMPI A PIACERE !!!
    (isset($_GET['order_c']) and $sql=('SELECT * FROM news ORDER BY titolo'))
    or (isset($_GET['order']) and  $sql=('SELECT * FROM news ORDER BY idnews'))
    or (isset($_GET['order_data']) and  $sql=('SELECT * FROM news ORDER BY data_news'))
    or (empty($_GET) and $sql=('SELECT * FROM news'))
) {

    echo'
<html>
<head>
    <link rel="stylesheet" href="css/style_certificazioni.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div id="phpsection">

<h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-4"> NEWS </h1>
<section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">

<p> Inserisci Articolo:   <a href="news_backend.php?insert"> INSERT </a> </p>

    <table> <!-- Nomi campi tabella  indicizzabili con GET -->
        <td><a href="news_backend.php?order=id" > IDnews </a></td>
        <td> <a href="news_backend.php?order_data=data" > Data </a> </td>
        <td> <a href="news_backend.php?order_c=titolo" > Titolo </a></td >
        <td> Testo </td>
        <td>  Immagine </td>
        <td> ACTION </td>
    </tr>';


    // CONNESSIONE DELLA QUERY AL DB INSERITA NELLA VARIABILE ROW !!
    foreach (($connessione->query($sql)) as $row) {




        //stampa tutto il DB riga per riga
        echo '<td>' . $row['idnews']
            . '</td><td> ' . date("d-m-Y",strtotime($row["data_news"]))
            . '</td><td>' . $row['titolo']
            . '</td><td>' . $row['testo']
            .'</td><td><img src="img/'.$row["immagine"].'" width="200"/>'
            . '</td>';

        // LINK update AGGIORNA I DATI
        echo '<td><a href="news_backend.php?update=update
                                            &idnews=' . $row['idnews'] .
                                            '&titolo=' . $row['titolo'] .
                                            '&data_news=' . $row['data_news'] .
                                            '&testo=' . $row['testo'] .
                                            '&immagine=' . $row['immagine'] . '
                                             ">UPDATE</a><br> or<br> ';

        // LINK delete CANCELLA I DATI
        echo  '<a href="news_backend.php?delete=delete
            &idnews=' . $row['idnews'] .
        '&titolo=' . $row['titolo'] .
        '&data_news=' . $row['data_news'] .
        '&testo=' . $row ['testo'].
        '&immagine=' . $row ['immagine'] .
        '"> DELETE</a></td></tr> ';

    }
}
echo'</table></section></div></body></html>';

//------------------------------------------------------------------------------------------------------------------------------

//pagina INSERT News!!!!!




If(
(isset($_GET['insert']))){

// HTML FORM INSERIMENTO DATI

    echo "
<html>
<head>
    <link rel='stylesheet' href='css/style_certificazioni.css' type='text/css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
</head>
<body>
<div id='phpsection'>
    <h1 id='h1' class='1 col-lg-12 col-md-12 col-sm-12 col-xs-4'>Aggiungi news</h1>
        <section id='floatsection' class='col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8'>


              <form action='#' method='post' enctype='multipart/form-data' >

              <ul>
                 <li>Titolo
                     <input type='text' name='news' size='35' required />
                 </li>
                <li id='data'>
                    <span id='data_text'>Data</span>
                    <input type='date' name='data' required>
                </li>
                <li>
                     <textarea name='testo'  size='55' required>Inserisci qui le tue News ..
                     </textarea>
                </li>
                <li id='file'>
                    <input type='hidden' name='action' value='upload' />
                    <input type='file' name='user_file' />
                 </li>
                <li>
                        <input type='submit' name='submit' value='INSERISCI' />
                        or &nbsp;
                        Back to <a href='news_backend.php'>NEWS</a>
                </li>
            </ul>
            </form>

        </section></div></body></html>
        ";


    // INSERIMENTO DATI DICHIARAZIONE VARAIBILI E QUERY

    if(isset($_POST['submit'])&& isset($_FILES['user_file'])) {


        $news = (isset($_POST['news'])) ? $_POST['news'] : '';
        $data = (isset($_POST['data'])) ? $_POST['data'] : '';
        $testo = (isset($_POST['testo'])) ? $_POST['testo'] : '';


//------ UPLOAD IMMAGINE SU CARTELLA IMG----------------


        // DIRECTORY PATH CARTELLA IMMAGINI

        define("UPLOAD_DIR", "img/");

        //VARIABILE GLOBALE $_FILES che contiene il mio file caricato dal POST

        $file = $_FILES['user_file'];

        //SE NON SI è VERIFICATO ALCUN ERRORE NEL UPLOAD LA FUNZIONE IS_UPLOADED_FILE HA SPOSTATO IL FILE NELLA PATH TEMPORANEA

        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name'])) {

            //SPOSTO IL FILE DALLA PATH TEMPORANEA DEL PHP NELLA CARTELLA IMG

            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);

            echo"<p id='phpsection'>File caricato correttamente</p>";
        }else {echo"<br><p id='phpsection'>Errore nel upload del file</p>";
        }
// --------- Fine Upload IMG --------------------------

        $sql = $connessione->prepare("
                                  INSERT INTO news( `titolo`, `testo`,`data_news`,`immagine`)

                        VALUES ('".$news."','".$testo."','".$data."','".$file['name']."')");
        if ($sql->execute()) {

           $data_it= date("m-d-Y",strtotime($data));

            echo "<p id='phpsection'>Dato: ".$news."  ".$data_it." Correttamente Inserito!
                     <br> Torna alle News <a href='news_backend.php'> Back </a> </p> ";
        } else {
            die("<p id='phpsection'>Impossibile Salvare il Record:  ".$news."   ".$data."</p>");
        }
    }



    // chiusura pagina insert
}

// --------------------------------------------------------------------------------------------------------------------------------------------------

/// Pagina DELETE NEWS !!!!!

if(isset($_GET['delete'])) {


    $id=$_GET['idnews'];
    $titolo=$_GET['titolo'];
    $data=$_GET['data_news'];
    $data_it=date("m-d-Y",strtotime($data));


    echo"<html>
<head>
    <link rel='stylesheet' href='css/style_certificazioni.css' type='text/css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
</head>
<body>
<div id='phpsection'>
            <form action='#' method='post'>
            <p>Sicuro di voler eliminare la Certificazione: ". $titolo ." - " .$data_it. " ?
                 <input type='submit' name='annulla' value='NO' />
                <input type='submit' name='elimina' value='SI' />

          </form></div></body></html>
           ";



    // se si clicca su NO
    if(isset($_POST['annulla'])){



        echo"
            <p> Hai scelto di non eliminare la News: ". $titolo ."
          <br> Torna alle News <a href='news_backend.php'> Back </a>
          </p>
           ";


    }

    // se si clicca su si elimina il dato eseguendo la query

    if(isset($_POST['elimina'])){

        // esecuzione query cancellazione dato

        $sql= $connessione->exec(" DELETE FROM news WHERE idnews=".$id);


        echo"<br><br> La News ".$titolo." è stata Eliminata!
            <br> <a href='news_backend.php'> Back </a> " ;
        ;

    }



}

// -----------------------------------------------------------------------------------------------------------------------------------


// PAGINA UPDATE News !!!!!


if(isset($_GET['update'])){

// il get mi porta i valori  dei recor presenti nei link della pagina SELECT nei campi del form in questa pagina
    $id=$_GET['idnews'];
    $titolo=$_GET['titolo'];
   // $data=$_GET['data_news'];
    $data_it=date("d-m-Y",strtotime($_GET['data_news']));
    $testo=$_GET['testo'];
    $img=$_GET['immagine'];

//echo $id, $titolo, $data, $testo ;

//definizione condizione post
    if($_POST)
    {
        $idn= (isset($_POST['idn'])) ? $_POST['idn'] : '';
        $titolon = (isset($_POST['titolon'])) ? $_POST['titolon'] : '';

        $datan = (isset($_POST['datan'])) ? $_POST['datan'] : '';

       $data_en=date('Y-m-d',strtotime($datan));

        $teston =(isset($_POST['teston'])) ? $_POST['teston'] : '';


 // ---- UPLOAD IMMAGINE SU CARTELLA IMG -------------------------------

        // DIRECTORY PATH CARTELLA IMMAGINI

        define("UPLOAD_DIR", "img/");

        //VARIABILE GLOBALE $_FILES che contiene il mio file caricato dal POST

        $file = $_FILES['user_file'];

        //SE NON SI è VERIFICATO ALCUN ERRORE NEL UPLOAD  E LA FUNZIONE IS_UPLOADED_FILE HA SPOSTATO IL FILE NELLA PATH TEMPORANEA

        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name'])) {

            //SPOSTO IL FILE DALLA PATH TEMPORANEA DEL PHP NELLA CARTELLA IMG

            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);

            echo"<p>File caricato correttamente</p>";
        }else {echo"<p>Errore nel upload del file</p>";
        }

// ------ Fine Upload IMG ------------------------------------------------------------




// modifica del record nel db con update
        $sql= $connessione->exec("UPDATE news
    							SET titolo='".$titolon."' ,
    							data_news='".$data_en."' ,
    							testo='".$teston."',
    							immagine='".$file['name']."'
                              	WHERE idnews='".$id."'
                               ");

        $data_x=date('d-m-Y',strtotime($data_en));
        //stampo l'avvenuto aggiornamento
        echo "<br><br> Aggiornamento Record Effettuato !!!".$titolon." ".$data_x."
            <br> Torna alle News <a href='news_backend.php'> Back </a>";

    }
    else /// stampa  i campi per aggiornare i dati
    { echo'
<html>
<head>
    <link rel="stylesheet" href="css/style_certificazioni.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div id="phpsection">

<h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-4">Update News</h1>
<section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">
<form method="post" action="#" enctype="multipart/form-data">
        <ul>
            <li> IDnews
                <input type="text" name="'.$id.'" value="'.$id.'" size="5" />
            </li>
            <li> Titolo
                <input type="text" name="titolon" value="'.$titolo.'" size="35" />
            </li>
            <li> Data
                <input type="text" name="datan" value="'.$data_it.'" size="10">

            <li>
                <textarea name="teston" size="55" >'.$testo.'
                </textarea>
            </li>
            <li id="file">
                    <input type="hidden" name="action" value="upload" />
                    <input type="file" name="user_file" />
            </li>

            <li>
                <input type="submit" name"aggiorna" value="Update">
                or &nbsp;
                <a href="news_backend.php">BACK</a>
            </li>
       </ul>
</form></section> </div> ';

    }

    echo"
</body>
</html>";


}
include'footer.html';