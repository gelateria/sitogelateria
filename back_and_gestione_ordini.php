<html>

<head>
    <style>
        h1{
            text-align: center;
        }
        #contenitore{
            /*background-image: url("");*/

            width: 100%;
            height: 100%;
        }

        table, td, tr {

            border: 2px solid black;
            align-self: center;
        }

        }
        td{


            text-align: center;
            padding: 5px;
            background-color: aquamarine;

        }
        tr{
            background-color: beige;

            width: 5000px;


        }
    </style>
</head>

<body>
<?php

include'header.php';
include'conn.php';




?>

<div id="contenitore">
    <h1>Ordini effettuati:</h1>
    <h4>Inserisci un valore per cercare l'ordine:</h4>

    <form method="post" action="<?php $_PHP_SELF ?>">
        <input name="ricerca">

        <input type="submit" name="invia" value="cerca"/>

    </form>



    <br/><br/><br/><br/>


    <?php

    //metodo cerca


    if(isset($_POST['ricerca'])) {

        $ricerca = $_POST["ricerca"];


        /*SELECT * FROM `sitogelateria`.`ordine` WHERE `nome` LIKE '%$ricerca%'*/
        foreach ($db->query("SELECT * FROM `sitogelateria`.`ordine` WHERE `nome` LIKE '%$ricerca%'") as $row) {

            echo
                '<table>
                        <tr>
                             <td>
                              '.$row['idordine'].'
                             </td>
                             <td>
                              '.$row['nome'].'
                             </td>
                             <td>
                              '.$row['cognome'].'
                             </td>
                              <td>
                              '.$row['citta'].'
                             </td>
                              <td>
                              '.$row['indirizzo'].'
                             </td>
                              <td>
                              '.$row['cap'].'
                             </td>
                              <td>
                              '.$row['email'].'
                             </td>
                              <td>
                              '.$row['telefono'].'
                             </td>
                              <td>
                              '.$row['data'].'
                             </td>
                              <td>
                              '.$row['ora'].'
                             </td>
                              <td>
                              '.$row['gelato'].'
                             </td>
                             <td>
                              '.$row['gusto'].'
                             </td>
                             <td>
                              '.$row['panna'].'
                             </td>
                             <td>
                              '.$row['quantita'].'
                             </td>







                     ';




            echo '

                         <td><a href="delete_ordine.php?id=' . $row['idordine'] . '">CANCELLA </a></td>

                    ';

            echo '

                         <td><a href="update_ordine.php?id=' . $row['idordine'] . '&nome=' . $row['nome'] . '&cognome=' . $row['cognome'] .'&citta='. $row['citta'].'&indirizzo='. $row['indirizzo'].'&cap='. $row['cap'].'&email='. $row['email'].'&telefono='. $row['telefono']. '&data='.$row['data']. '&ora='.$row['ora'].'&gelato='. $row['gelato'].'&gusto='. $row['gusto'].'&panna='. $row['panna']. '&quantita='.$row['quantita'].'">UPDATE </a></td>
                        </tr>
                    </table>';




        }
    }//fine metodo cerca




    ?>
    <!--istruzione per stampare una tabella con dentro i dati del database
    if($x=1){
          echo "<table>
                      <tr>
                           <td>$x </td>
                       </tr>
                 </table>";
      }

  -->






</div><!--chiusura contenitore-->

<?php

include'footer.html';
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
