<link href="styleam.css" rel="stylesheet" type="text/css"> <!-- link css -->
<meta charset="utf-8"> <!-- meta testo -->

<div> <!-- div contenitore tabella utenti -->
    <table> <!-- tabella utenti -->
        <tr>
            <td class="td"> ID  </td>
            <td class="td"> Nome </td>
            <td class="td"> Cognome  </td>
            <td class="td"> Data di nascita </td>
            <td class="td"> Città  </td>
            <td class="td"> Residenza </td>
            <td class="td"> Telefono  </td>
            <td class="td"> Email </td>
            <td class="td"> Azienda  </td>
            <td class="td"> Indirizzo azienda </td>
            <td class="td"> Città azienda  </td>
            <td class="td"> Partita iva </td>
            <td class="td"> Username  </td>
            <td class="td"> Password </td>
            <td class="td"> Cancellazione user  </td>
            <td class="td"> Aggiornamento user  </td>
        </tr>
        <?php
        //inizio script php
        include("conn.php"); //includo i dati per la connessione al database
        include("headeramm.php");
        if (isset($_POST['but1'])) { //condizione accettata se viene premuto il tasto del form
            $user = $_POST['user']; //assegno variabile POST
            $sql = $connessione->prepare("SELECT * FROM utente WHERE username = :user"); //preparazione query selezione con condizione user
            $sql->bindParam(':user', $user, PDO::PARAM_STR, 7); //bind variabile
            $sql->execute(); //esecuzione query
            $result = $sql->fetchAll(); //array
            foreach ($result as $row) { //stampo a video i dati
                echo "<tr><td>" . $row['idutente'] . "</td><td>" . $row['nome'] . "</td><td>"
                . $row['cognome'] . "</td><td>" . $row['datanascita'] . "</td><td>"
                . $row['citta'] . "</td><td>" . $row['indirizzoresidenza'] . "</td><td>"
                . $row['telefono'] . "</td><td>" . $row['email'] . "</td><td>"
                . $row['nomeazienda'] . "</td><td>" . $row['indirizzoazienda'] . "</td><td>"
                . $row['cittaazienda'] . "</td><td>" . $row['partitaiva'] . "</td><td>"
                . $row['username'] . "</td><td>" . $row['password'];
                echo '</td><td><a href="amm_delete.php?idutente=' . $row['idutente'] . '"> DELETE </a></td>'; //link cancellazione utente
                echo  '<td><a href="amm_updateutenti.php?idutente='.$row['idutente'].'&nome='.$row['nome'].'&cognome='.$row['cognome'].'&datanascita='.$row['datanascita'].'&citta='.$row['citta'].
                      '&indirizzoresidenza='.$row['indirizzoresidenza'].'&telefono='.$row['telefono'].'&email='.$row['email'].'&nomeazienda='.$row['nomeazienda'].
                      '&indirizzoazienda='.$row['indirizzoazienda'].'&cittaazienda='.$row['cittaazienda'].'&partitaiva='.$row['partitaiva'].'&username='.$row['username'].'&password='.$row['password'].'">UPDATE</a></td></tr>';

            }
        } else {
            $sql = $connessione->prepare("SELECT * FROM utente"); //preparazione query selezione
            $sql->execute(); //esewcuzione query
            $result = $sql->fetchAll(); //array
            foreach ($result as $row) { //stampo a video i dati
                echo "<tr><td>" . $row['idutente'] . "</td><td>" . $row['nome'] . "</td><td>"
                . $row['cognome'] . "</td><td>" . $row['datanascita'] . "</td><td>"
                . $row['citta'] . "</td><td>" . $row['indirizzoresidenza'] . "</td><td>"
                . $row['telefono'] . "</td><td>" . $row['email'] . "</td><td>"
                . $row['nomeazienda'] . "</td><td>" . $row['indirizzoazienda'] . "</td><td>"
                . $row['cittaazienda'] . "</td><td>" . $row['partitaiva'] . "</td><td>"
                . $row['username'] . "</td><td>" . $row['password'];
                echo '</td><td><a href="amm_delete.php?idutente=' . $row['idutente'] . '"> DELETE </a></td> '; //link cancellazione utente
                echo  '<td><a href="amm_updateutenti.php?idutente='.$row['idutente'].'&nome='.$row['nome'].'&cognome='.$row['cognome'].'&datanascita='.$row['datanascita'].'&citta='.$row['citta'].
                      '&indirizzoresidenza='.$row['indirizzoresidenza'].'&telefono='.$row['telefono'].'&email='.$row['email'].'&nomeazienda='.$row['nomeazienda'].
                      '&indirizzoazienda='.$row['indirizzoazienda'].'&cittaazienda='.$row['cittaazienda'].'&partitaiva='.$row['partitaiva'].'&username='.$row['username'].'&password='.$row['password'].'">UPDATE</a></td></tr>';
            }
        }
        ?> <!-- chiusura script php -->
        <?php
        session_start(); //start sessione database
        if (isset($_POST['logout'])){ //se viene premuto il tasto di logout
        session_destroy(); //interrompo la sessione per il logout
          header("location:index.php"); //reindirizzamento all'index
        }
        if (isset($_SESSION['username'])){ //se la sessione è attiva
          echo'<script src="js/jquery.js"></script> <!-- richiamo libreria jquery -->
          <script>
              $(document).ready(function() { //funzione per nascondere il pulsante di login e mostrare quello di logout
                  $("#logout").show();
                  $("#loginb").hide();
        });
          </script>'."<div style='position:relative;left:1010px;'>Benvenuto ".$_SESSION['username']."</div>"; //stampo a video username utente
        }
        else{
             echo'<script src="js/jquery.js"></script> <!-- richiamo libreria jquery -->
            <script>
                $(document).ready(function() { //funzione per nascondere il pulsante di logout e mostrare quello di login
                    $("#logout").hide();
                    $("#loginb").show();
        });
            </script>';
        ;
        }
        ?>
        <meta charset="utf-8"> <!-- formattazione testo -->
        <form method="post" > <!-- inizio del form con metodo post -->
            <div style="float:right;">
                <input type="submit" id="logout" value="logout" name="logout"> <!-- link di logout -->
            </div>
        </form> <!-- chiusura form -->  
  </table> <!-- chiusura tabella utenti -->
</div> <!-- chiusura div contenitore tabella utenti -->
<form name="form_login" method="post" > <!-- inizio del form con metodo post -->
    Campo di ricerca<br><br>
    Inserisci user:         <input type="text" name="user"><br><br> <!-- campo di ricerca tramite user -->
    <input type="submit" Value="Ricerca" name="but1"> <!-- pulsante di invio per il form -->
    <input type="submit" value="Refresh utenti" > <!-- Pulsante per richiamare nuovamente tutti gli utenti dopo la ricerca -->
</form> <!-- chiusura form -->
<?php
include("footer.html");
?>
