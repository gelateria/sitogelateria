<?php

/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 22/05/15
 * Time: 16:52
 */


// HEADER
  include'headeramm.php';

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

        echo'<h1> Certificazioni Conseguite </h1>

<p> Inserisci Certificazione:   <a href="certificazione_backend.php?insert"> INSERT </a> </p>

    <table>
        <tr><!-- Nomi campi tabella  indicizzabili con GET -->
        <td><a href="certificazione_backend.php?order" > IDcert </a></td>
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
                . '</td><td> ' . $row['data_certificazione']
                .'</td><td> <img src="../img/'.$row["logo_certificazione"].'" width="200"/>'  //  LE FOTO SI VEDONO!!
                . '</td>';

            // LINK update AGGIORNA I DATI
            echo '<td><a href="certificazione_backend.php?update=update
                                                                &id_certificazione=' . $row['id_certificazione'] .
                                                                '&nome_certificazione=' . $row['nome_certificazione'] .
                                                                '&data_certificazione=' . $row['data_certificazione'] .
                                                                '&descrizione_certificazione=' . $row['descrizione_certificazione'] .
                                                                '&logo_certificazione=' . $row['logo_certificazione'] . '
                                                                ">UPDATE</a> or ';

            // LINK delete CANCELLA I DATI
           echo '<a href="certificazione_backend.php?delete=delete
                                                    &id_certificazione=' . $row['id_certificazione'] .
                                                    '&nome_certificazione=' . $row['nome_certificazione'] .
                                                    '&data_certificazione=' . $row['data_certificazione'] .
                                                    '"> DELETE</a></td></tr> ';

        }
            }
echo'</table>';

//------------------------------------------------------------------------------------------------------------------------------

//pagina INSERT CERTIFICAZIONE!!!!!




  If(
  (isset($_GET['insert']))){

      // HTML FORM INSERIMENTO DATI

  echo "
             <h1>Aggiungi Certificazione</h1>

         <div>
              <form action='#' method='post' >

                 <p>Certificazione
                     <input type='text' name='certificazione' required />
                 </p>
                <p>Data
                    <input type='date' name='data' required>
                </p>
                <p>Descrizione
                     <input type='text' name='description' maxlength='100' required>
                </p>
                <p>
                Logo
                    <input name='foto' type='file' >
                 </p>
                       <p> <input type='submit' name='submit' value='INSERISCI' />
                        or &nbsp;
                        Back to <a href='certificazione_backend.php'>Certificazione</a>
                        </p>
            </form>
        </div>";

      // INSERIMENTO DATI DICHIARAZIONE VARAIBILI E QUERY

      if(isset($_POST['submit'])) {


          $cert = (isset($_POST['certificazione'])) ? $_POST['certificazione'] : '';
          $data_cert = (isset($_POST['data'])) ? $_POST['data'] : '';
          $descr = (isset($_POST['description'])) ? $_POST['description'] : '';
          // UPLOAD IMMAGINE SU CARTELLA IMG

           // FUNZIONAAAAAAAAAAAA


         // DIRECTORY PATH CARTELLA IMMAGINI

          define("UPLOAD_DIR", "../img/");

        //VARIABILE GLOBALE $_FILES che contiene il mio file caricato dal POST

          $file = $_FILES['user_file'];

          //SE NON SI è VERIFICATO ALCUN ERRORE NEL UPLOAD LA FUNZIONE IS_UPLOADED_FILE HA SPOSTATO IL FILE NELLA PATH TEMPORANEA

          if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name'])) {

              //SPOSTO IL FILE DALLA PATH TEMPORANEA DEL PHP NELLA CARTELLA IMG

              move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);

                      echo"<p>File caricato correttamente</p>";
          }else {echo"<p>Errore nel upload del file</p>";
            }


          $sql = $connessione->prepare("
                                  INSERT INTO certificazione( `nome_certificazione`, `data_certificazione`,`descrizione_certificazione`,`logo_certificazione`)

                        VALUES ('".$cert."','".$data_cert."','".$descr."','".$file['name']."')");
          if ($sql->execute()) {

              // NON FUNZIONA IL REDIRECT!! PERCHè?!?!?!?!?!

             // header("location:certificazione_backend.php");

              echo "Dato: ".$cert.", ".$data_cert." Correttamente Inserito
                     <br> Torna alle certificazioni <a href='certificazione_backend.php'> Back </a>  ";
          } else {
              die('Impossibile Salvare il Record:  .'.$cert." ,  ".$data_cert);
          }
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
            <form action='#' method='post'>
            <p>Sicuro di voler eliminare la Certificazione: ". $cert_ ." - " .$data_. " ?
                 <input type='submit' name='annulla' value='NO' />
                <input type='submit' name='elimina' value='SI' />

          </form>
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
$logo=$_GET['logo_certificazione'];


//definizione condizione post
    if($_POST)
    {
        $idn= (isset($_POST['idn'])) ? $_POST['idn'] : '';
        $certn = (isset($_POST['certn'])) ? $_POST['certn'] : '';
        $datan = (isset($_POST['datan'])) ? $_POST['datan'] : '';
        $descrn =(isset($_POST['descrn'])) ? $_POST['descrn'] : '';
        $logon =(isset($_POST['logon'])) ? $_POST['logon'] : '';

// modifica del record nel db con update
        $sql= $connessione->exec("UPDATE certificazione
    							SET nome_certificazione='".$certn."' ,
    							data_certificazione='".$datan."' ,
    							descrizione_certificazione='".$descrn."',
    							logo_certificazione='".$logon."'
                              	WHERE id_certificazione='".$id."'
                               ");

    //stampo l'avvenuto aggiornamento
    echo "<br><br> Aggiornamento Record Effettuato !!!
            <br> Torna alle certificazioni <a href='certificazione_backend.php'> Back </a>";

}
else /// stampa  i campi per aggiornare i dati
{ echo'



<h1>Update Certificazione</h1>
<form method="post" action="#">
    <table>
        <tr>
            <td> IDcertificazione</td>
            <td> Certificazione</td>
            <td> Data </td>
            <td> Descrizione </td>
            <td> Logo </td>
            <td>Action</td>
        </tr>
        <tr>
            <td><input type="text" name="<?php  echo $id ?>" value="'.$id.'"> </td>
            <td><input type="text" name="certn" value="'.$cert.'"> </td>
            <td><input type="text" name="datan" value="'.$data.'"> </td>
            <td><input type="text" name="descrn" value="'.$descr.'"> </td>
            <td><input  type="file" name="logon"  id="foto" >
            </td>

            <td>
                <input type="submit" name"aggiorna" value="Update">
                <a href="certificazione_backend.php">BACK</a>
            </td>
        </tr>

    </table>
</form> ';

}

    echo"
</body>
</html>";


}
include'footer.html';
