<link href="styleam.css" rel="stylesheet" type="text/css"> <!-- link css -->
<meta charset="utf-8"> <!-- meta testo -->
<div> <!-- div contenitore tabella ordini -->
    <table> <!-- tabella ordini -->
        <tr>

            <td class="td"> Nome </td>
            <td class="td"> Cognome  </td>
            <td class="td"> Città </td>
            <td class="td"> Indirizzo  </td>
            <td class="td"> Cap </td>
            <td class="td"> Email  </td>
            <td class="td"> Telefono </td>
            <td class="td"> Data  </td>
            <td class="td"> Ora </td>
            <td class="td"> Gelato  </td>
            <td class="td"> Gusto </td>
            <td class="td"> Panna  </td>
            <td class="td"> Quantità </td>
            <td class="td"> Cancellazione ord.  </td>
            <td class="td"> Aggiornamento ord. </td>
        </tr>
        <?php
        //inizio script php
        include("conn.php"); //includo i dati per la connessione al database
        include("headeramm.php");
        //condizione accettata se viene premuto il tasto del form
          $sql = $connessione->prepare("SELECT * FROM ordine ORDER BY data"); //preparazione query selezione
          $sql->execute(); //esecuzione query
          $result = $sql->fetchAll(); //array
          foreach ($result as $row) { //stampo a video i dati
              echo "<tr><td>" . $row['nome'] . "</td><td>" . $row['cognome'] . "</td><td>"
              . $row['citta'] . "</td><td>" . $row['indirizzo'] . "</td><td>"
              . $row['cap'] . "</td><td>" . $row['email'] . "</td><td>"
              . $row['telefono'] . "</td><td>" . $row['data'] . "</td><td>"
              . $row['ora'] . "</td><td>" . $row['gelato'] . "</td><td>"
              . $row['gusto'] . "</td><td>" . $row['panna'] ."</td><td>". $row['quantita']."</td>";
              echo '<td><a href="delete_ordine.php?idordine=' .$row['idordine'].'"> DELETE </a></td> '; //link cancellazione ordine
              echo  '<td><a href="update_ordine.php?idordine='.$row['idordine'].'&nome='.$row['nome'].'&cognome='.$row['cognome'].'&citta='.$row['citta'].'&indirizzo='.$row['indirizzo'].
                    '&cap='.$row['cap'].'&email='.$row['email'].'&telefono='.$row['telefono'].'&data='.$row['data'].
                    '&ora='.$row['ora'].'&gelato='.$row['gelato'].'&gusto='.$row['gusto'].'&panna='.$row['panna'].'&quantita='.$row['quantita'].'">UPDATE</a></td></tr>';//link aggiornamento ordine
          }

        ?> <!-- chiusura script php -->
    </table> <!-- chiusura tabella ordini -->
</div> <!-- chiusura div contenitore tabella utenti -->

<?php

include("footer.html");
?>
