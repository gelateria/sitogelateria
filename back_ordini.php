
<html>
<head>


    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    <!--<link rel="stylesheet" type="text/css" href="css/back_ordini.css">-->
    <meta charset="utf-8"> <!-- meta testo -->
</head>



<body>
    <?php include("headeramm.php"); ?>

     <div><!-- div contenitore tabella ordini -->

         <table class="table col-lg-10 col-md-5 col-sm-8 col-xs-4" > <!-- tabella ordini -->

             <thead>
                <tr>
                    <th class="td"> Nome </th>
                    <th class="td"> Cognome  </th>
                    <th class="td"> Città </th>
                    <th class="td"> Indirizzo  </th>
                    <th class="td"> Cap </th>
                    <th class="td"> Email  </th>
                    <th class="td"> Telefono </th>
                    <th class="td"> Data  </th>
                    <th class="td"> Ora </th>
                    <th class="td"> Gelato  </th>
                    <th class="td"> Gusto </th>
                    <th class="td"> Panna  </th>
                    <th class="td"> Quantità </th>
                    <th class="td"> Cancellazione ord.  </th>
                    <th class="td"> Aggiornamento ord. </th>
                </tr>
             </thead>
        <?php
        //inizio script php
        include("conn.php"); //includo i dati per la connessione al database

        //condizione accettata se viene premuto il tasto del form
          $sql = $connessione->prepare("SELECT * FROM ordine ORDER BY data"); //preparazione query selezione
          $sql->execute(); //esecuzione query
          $result = $sql->fetchAll(); //array
          foreach ($result as $row) { //stampo a video i dati
              echo "<tr><th>" . $row['nome'] . "</th><th>" . $row['cognome'] . "</th><th>"
              . $row['citta'] . "</th><th>" . $row['indirizzo'] . "</th><th>"
              . $row['cap'] . "</th><th>" . $row['email'] . "</th><th>"
              . $row['telefono'] . "</th><th>" . $row['data'] . "</th><th>"
              . $row['ora'] . "</th><th>" . $row['gelato'] . "</th><th>"
              . $row['gusto'] . "</th><th>" . $row['panna'] ."</th><th>". $row['quantita']."</th>";
              echo '<th><a href="delete_ordine.php?idordine=' .$row['idordine'].'"> DELETE </a></th> '; //link cancellazione ordine
              echo  '<th><a href="update_ordine.php?idordine='.$row['idordine'].'&nome='.$row['nome'].'&cognome='.$row['cognome'].'&citta='.$row['citta'].'&indirizzo='.$row['indirizzo'].
                    '&cap='.$row['cap'].'&email='.$row['email'].'&telefono='.$row['telefono'].'&data='.$row['data'].
                    '&ora='.$row['ora'].'&gelato='.$row['gelato'].'&gusto='.$row['gusto'].'&panna='.$row['panna'].'&quantita='.$row['quantita'].'">UPDATE</a></th></tr>';//link aggiornamento ordine
          }

        ?> <!-- chiusura script php -->
        </table> <!-- chiusura tabella ordini -->
         <button type="text" class="btn btn-default col-lg-5 col-md-5 col-sm-4 col-xs-4" value="nuovo ordine"><a href="formgelato.php">nuovo ordine</button>
</div> <!-- chiusura div contenitore tabella utenti -->

<?php

include("footer.html");
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body></html>
