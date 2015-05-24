<?php

    include("conn.php");
    include("headeramm.php");

if(isset($_GET['idnews'])) {

// il get mi porta i valori  dei record presenti nei link della pagina select
    $id = $_GET['idnews'];
    $tito = $_GET['titolo'];
    $data = $_GET['data'];
    $testo = $_GET['testo'];
    $img = $_GET['immagine'];


//definizione condizione post
    if ($_POST)
    {
        $idn = (isset($_POST['idn'])) ? $_POST['idn'] : '';
        $titn = (isset($_POST['titn'])) ? $_POST['titn'] : '';
        $datan = (isset($_POST['datan'])) ? $_POST['datan'] : '';
        $testn = (isset($_POST['testn'])) ? $_POST['testn'] : '';
        $imge = (isset($_POST['imgn'])) ? $_POST['imgn'] : '';

// modifica del record nel db con update
        $sql = $connessione->exec("UPDATE news
    							SET titolo='" . $titn . "' ,
    							data_news='" . $datan . "' ,
    							testo='" . $testn . "',
    							immagine='" . $imge . "'
                              	WHERE idnews='" . $id . "'
                               ");

        // $sql = $connessione->exec("UPDATE `news` SET `titolo`=[$titn],`testo`=[$testn],`data_news`=[$datan],`immagine`=[$imgn] WHERE `idnews`=[$idn]");

        //stampo l'avvenuto aggiornamento
        echo "<br><br> Aggiornamento Record Effettuato
            <br> Torna alle certificazioni <a href='news_select.php'> Back </a>";
    } else /// stampa  i campi per aggiornare i dati
    {   echo '


<!--<html>
<head>
<style type="text/css">
    body{text-align: center}
        div{
    border: 3px solid black;
            max-width: 900px;
            height: 450px;
            margin: 0 auto;
            text-align: left;
            padding-left: 50px;
            padding-top: 30px;

        }

    </style>
</head>
<body>
<div>-->
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
            <td><input type="text" name="<?php  echo $id ?>" value="' . $id . '"> </td>
            <td><input type="text" name="titn" value="' . $tito . '"> </td>
            <td><input type="text" name="datan" value="' . $data . '"> </td>
            <td><input type="text" name="testn" value="' . $testo . '"> </td>
            <td><input  type="file" name="imgn" value="' . $img . '" id="foto" >
            </td>

            <td>
                <input type="submit" name="aggiorna" value="Update">
                <a href="news.php">BACK</a>
            </td>
        </tr>

    </table>
</form>
<!--</div>-->

</body>
 </html>

 ';
 include("footer.html");
}}
