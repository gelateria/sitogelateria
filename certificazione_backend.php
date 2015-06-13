<?php

/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 22/05/15
 * Time: 16:52
 */


// HEADER
  include'header.php';

// CONNESSIONE
  include("conn.php");


// ------------------------------------------------------- START  -----------------------------------------------------------------------------


// PAGINA SELECT CERTIFICAZIONE!!! PRIMA PAGINA VISUALIZZATA


//VARIABILI E QUERY FUORI DALL IF ALTRIMENTI NON FA


$sql=('SELECT * FROM certificazione');
$row=$connessione->query($sql);


    If(             // TUTTE LE QUERY PER ORDINARE I CAMPI A PIACERE !!!
        (isset($_GET['order_c']) and $sql=('SELECT * FROM certificazione ORDER BY nome_certificazione'))
        or (isset($_GET['order']) and  $sql=('SELECT * FROM certificazione ORDER BY id_certificazione'))
        or (isset($_GET['order_data']) and $sql=('SELECT * FROM certificazione ORDER BY data_certificazione'))
        or (empty($_GET) and $sql=('SELECT * FROM certificazione'))
        ) {

        echo '
<html>
<head>
    <link rel="stylesheet" href="css/style_certificazioni.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div id="phpsection">

<h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-4"> Certificazioni Conseguite </h1>
<section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">

<p> Inserisci Certificazione:   <a href="certificazione_backend.php?insert"> INSERT </a> </p>

    <table id="table_cert">
        <tr ><!-- Nomi campi tabella  indicizzabili con GET -->
        <td ><a href="certificazione_backend.php?order" > IDcert </a></td>
        <td> <a href="certificazione_backend.php?order_c" > Certificazione </a></td >
        <td> Descrizione </td>
        <td> <a href="certificazione_backend.php?order_data" > Data </a> </td>
        <td>  Logo  </td>
        <td> ACTION </td>
        </tr>';


        // CONNESSIONE DELLA QUERY AL DB INSERITA NELLA VARIABILE ROW !!
        foreach (($connessione->query($sql)) as $row) {

            //stampa tutto il DB riga per riga
            echo '<tr><td>' . $row['id_certificazione']
                . '</td><td>' . $row['nome_certificazione']
                . '</td><td>' . $row['descrizione_certificazione']
                . '</td><td #td_data> ' . date('d-m-Y',strtotime($row['data_certificazione'])) // Cambio in Formato Data ITA
                .'</td><td> <img src="img/'.$row["logo_certificazione"].'" width="200"/>'  //  LE FOTO SI VEDONO!!
                . '</td>';

            // LINK update AGGIORNA I DATI
            echo '<td><a href="certificazione_backend.php?update=update
                                                                &id_certificazione=' . $row['id_certificazione'] .
                                                                '&nome_certificazione=' . $row['nome_certificazione'] .
                                                                '&data_certificazione=' . $row['data_certificazione'] .
                                                                '&descrizione_certificazione=' . $row['descrizione_certificazione'] .
                                                                '&logo_certificazione=' . $row['logo_certificazione'] . '
                                                                ">UPDATE</a><br> or <br>';

            // LINK delete CANCELLA I DATI
           echo '<a href="certificazione_backend.php?delete=delete
                                                    &id_certificazione=' . $row['id_certificazione'] .
                                                    '&nome_certificazione=' . $row['nome_certificazione'] .
                                                    '&data_certificazione=' . $row['data_certificazione'] .
                                                    '"> DELETE</a></td></tr> ';

        }
            }
echo'</table></section></div></body></html>';

//------------------------------------------------------------------------------------------------------------------------------

//pagina INSERT CERTIFICAZIONE!!!!!




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
             <h1 id='h1' class='1 col-lg-12 col-md-12 col-sm-12 col-xs-4'>Aggiungi Certificazione</h1>


         <section id='floatsection' class='col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8'>
              <form method='post' action='#' enctype='multipart/form-data' >

               <ul>
                  <li>  Certificazione
                     <input type='text' name='certificazione' size='35' required/>
                 </li>

                 <li id='data'>
                    <span id='data_text'>Data</span>
                    <input type='date' name='data' required >
                 </li>

                 <li>
                    Descrizione
                     <input type='text' name='description' maxlength='100' required size='35'>
                 </li>

                 <li id='file'>
                    <input type='hidden' name='action' value='upload' />
                    <input type='file' name='user_file' />
                </li>

                 <li>
                    <input type='submit' name='submit' value='INSERISCI' /><br><br>
                      <br>
                     Torna alle Certificazioni <a href='certificazione_backend.php'>BACK</a>
                </li>
            </ul>
            </form>
        </section></div></body></html>";

      // INSERIMENTO DATI DICHIARAZIONE VARAIBILI E QUERY

      if(isset($_POST['submit']) && isset($_FILES['user_file'])) {


          $cert = (isset($_POST['certificazione'])) ? $_POST['certificazione'] : '';
          $data_cert = (isset($_POST['data'])) ? $_POST['data'] : '';
          $descr = (isset($_POST['description'])) ? $_POST['description'] : '';


//------ UPLOAD IMMAGINE SU CARTELLA IMG ---------------

           // FUNZIONAAAAAAAAAAAA


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
// --------------- Fine Upload IMG -------------

          $sql = $connessione->prepare("
                                  INSERT INTO certificazione( `nome_certificazione`, `data_certificazione`,`descrizione_certificazione`,`logo_certificazione`)

                        VALUES ('".$cert."','".$data_cert."','".$descr."','".$file['name']."')");



          if ($sql->execute()) {

              // NON FUNZIONA IL REDIRECT!! PERCHè?!?!?!?!?!

             // header("location:certificazione_backend.php");

              $data_it=date('d-m-Y',strtotime($data_cert));

              echo "<p id='phpsection'>Dato : ".$cert."  ".$data_it."  Correttamente Inserito
                     <br> Torna alle certificazioni <a href='certificazione_backend.php'> Back </a></p>  ";
          } else {
              die('<p id="phpsection">Impossibile Salvare il Record:  '.$cert.'  - '.$data_it.'</p>');
          }

/*
          // UPLOAD IMMAGINE SU CARTELLA IMG
          define("UPLOAD_DIR", "../img/");

              if(isset($_FILES['user_file']))
              {
                  $file = $_FILES['user_file'];
                  if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
                  {
                      move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);
                     $sql_file= INSERT INTO certificazione(logo_certificazione );
                      echo"File caricato correttamente";
                  }else {echo"errore";}
              }
*/





      }



  // chiusura pagina insert
  }

// --------------------------------------------------------------------------------------------------------------------------------------------------

   /// Pagina DELETE CERTIFICAZIONE !!!!!

if(isset($_GET['delete'])) {




         $id=$_GET['id_certificazione'];
        $cert_=$_GET['nome_certificazione'];
        $data_=$_GET['data_certificazione'];




        echo"
<html>
<head>
    <link rel='stylesheet' href='css/style_certificazioni.css' type='text/css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
</head>
<body>
<div id='phpsection'>
            <form action='#' method='post'>
            <p>Sicuro di voler eliminare la Certificazione: ". $cert_ ." - " .$data_. " ?
                 <input type='submit' name='annulla' value='NO' />
                <input type='submit' name='elimina' value='SI' />

          </form></div></body></html>
           ";



       // se si clicca su NO
        if(isset($_POST['annulla'])){



          echo"
            <p> Hai scelto di non eliminare la Certificazione: ". $cert_ ."
          <br> Torna alle certificazioni <a href='certificazione_backend.php'> Back </a>
          </p>
           ";


        }

    // se si clicca su si elimina il dato eseguendo la query

        if(isset($_POST['elimina'])){

                // esecuzione query cancellazione dato

           $sql= $connessione->exec(" DELETE FROM certificazione WHERE id_certificazione=".$id);


            echo"<br><br> La Certificazione ".$cert_." è stata Eliminata!
            <br> <a href='certificazione_backend.php'> Back </a> " ;
             ;

      }



                               }

// -----------------------------------------------------------------------------------------------------------------------------------


// PAGINA UPDATE!!!!!


if(isset($_GET['update'])){

// il get mi porta i valori  dei recor presenti nei link della pagina SELECT nei campi del form in questa pagina
$id=$_GET['id_certificazione'];
$cert=$_GET['nome_certificazione'];
$data=$_GET['data_certificazione'];
$descr=$_GET['descrizione_certificazione'];
$foto=$_GET['logo_certificazione'];


    $data_it = date_format(date_create_from_format('Y-m-d', $data), 'd-m-Y');


//definizione condizione post
    if($_POST)
    {
        $idn= (isset($_POST['idn'])) ? $_POST['idn'] : '';
        $certn = (isset($_POST['certn'])) ? $_POST['certn'] : '';
        $datan = (isset($_POST['datan'])) ? $_POST['datan'] : '';
        $descrn =(isset($_POST['descrn'])) ? $_POST['descrn'] : '';

$data_en = date_format(date_create_from_format('d-m-Y', $datan), 'Y-m-d');

//---------- UPLOAD IMMAGINE SU CARTELLA IMG----------

// FUNZIONAAAAAAAAAAAA


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
//------ Fine Upload IMg ---------------------------

// modifica del record nel db con update
        $sql= $connessione->exec("UPDATE certificazione
    							SET nome_certificazione='".$certn."' ,
    							data_certificazione='".$data_en."' ,
    							descrizione_certificazione='".$descrn."',
    							logo_certificazione='".$file['name']."'
                              	WHERE id_certificazione='".$id."'
                               ");


        $data_x = date_format(date_create_from_format('Y-m-d', $data_en), 'd-m-Y');



    //stampo l'avvenuto aggiornamento
    echo "<br><br> Aggiornamento Record Effettuato: ".$data_x."  ".$certn."
            <br> Torna alle certificazioni <a href='certificazione_backend.php'> Back </a>";

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

<h1 id="h1" class="h1 col-lg-12 col-md-12 col-sm-12 col-xs-4">Update Certificazione</h1>
<section id="floatsection" class="col-lg-12 col-md-12 col-sm-11 col-xs-4 col-xs-offset-8 col-xs-pull-8">

<form method="post" action="#" enctype="multipart/form-data">
    <p>IDcertificazione
            <input type="text" name="<?php  echo $id ?>" value="'.$id.'" size="5">
         </p>
         <br>
        <p>
             Certificazione
             <input type="text" name="certn" value="'.$cert.'" size="35">
         </p>
         <br>
         <p> Data
            <input type="text" name="datan" value="'.$data_it.'" size="10">
         </p>
            <br>
        <p> Descrizione
            <input type="text" name="descrn" value="'.$descr.'" size="35">
          </p>
          <br>
           <p id="file">
                    <input type="hidden" name="action" value="upload" />

                    <input type="file" name="user_file" />
        </p>
        <br><br>
             <p>

                <input type="submit" name"aggiorna" value="Update">
                <br><br>
                Torna alle Certificazioni <a href="certificazione_backend.php">BACK</a>
         </p>
</form></section> </div>';

}

    echo"
</body>
</html>";


}
include'footer.html';
