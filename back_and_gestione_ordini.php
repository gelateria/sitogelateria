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
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php

include'header.php';



include'conn.php';
?>


<div id="contenitore">
    <h1>Ordini effettuati</h1>
    <h4>Inserisci un valore per cercare l'ordine:</h4>

    <form method="post" action="<?php $_PHP_SELF ?>">
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="nome">Cerca ordine</label>
                    <input name="nome" type="text"  class="form-control" id="ricerca">
                    <input type="submit" class="btn btn-default" name="invia" value="cerca"/>
                </div>
            </div>
        </div>




    </form>


    <button type="text" class="btn btn-default" value="nuovo ordine"><a href="formgelato.php">nuovo ordine</button>


    <br/><br/><br/><br/>

    <table>
    <?php

    //metodo cerca


    if(isset($_POST['ricerca'])) {

        $ricerca = $_POST["ricerca"];


        foreach ($db->query("SELECT * FROM `sitogelateria`.`ordine` WHERE `nome` LIKE '%$ricerca%'") as $row) {

            echo
                '
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
                             </td>';
                        echo '<td>
                               <a href="delete_ordine.php?id=' . $row['idordine'] . '">CANCELLA </a>
                              </td>';
                        echo '<td><a href="update_ordine.php?id=' . $row['idordine'] . '&nome=' . $row['nome'] . '&cognome=' . $row['cognome'] .'&citta='. $row['citta'].'&indirizzo='. $row['indirizzo'].'&cap='. $row['cap'].'&email='. $row['email'].'&telefono='. $row['telefono']. '&data='.$row['data']. '&ora='.$row['ora'].'&gelato='. $row['gelato'].'&gusto='. $row['gusto'].'&panna='. $row['panna']. '&quantita='.$row['quantita'].'">UPDATE </a>
                              </td>
                        </tr>
                 ';
        }
    }//fine metodo cerca

    ?>
    </table>
</div><!--chiusura contenitore-->

<?php

include'footer.html';
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>


