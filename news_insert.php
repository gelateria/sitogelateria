<?php
include("conn.php");





if(isset($_POST['submit'])) {


    $titolo = (isset($_POST['titolo'])) ? $_POST['titolo'] : '';
    $data = (isset($_POST['data'])) ? $_POST['data'] : '';
    $testo = (isset($_POST['testo'])) ? $_POST['testo'] : '';
    $foto=(isset($_POST['foto'])) ? $_POST['foto'] : '';

    $sql = $connessione->prepare("
                                  INSERT INTO news (titolo,data_news,testo,immagine)

                        VALUES ('".$titolo."','".$data."','".$testo."','".$foto."')");
    if ($sql->execute()) {
        echo "Dato: ".$titolo.", ".$data.", ".$testo." Correttamente Inserito";
    } else {
        die('Impossibile Salvare il Record:  .'.$titolo." , ".$data.", ".$testo);
    }
}


?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Inserisci News </title>
    <style type="text/css">

        body{
            text-align: center
            }

        div{
            border: 3px solid black;
            min-width: 350px;
            min-height: 250px;
            margin: 0 auto;
            text-align: left;
            padding-left: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
            }

     #titolo{
              width: 700px;
              height: 20px;
                 }


    textarea{
            width:700px;
            height: 300px;
            }

    </style>
</head>
<body>
<h1>Inserisci News Gelateria</h1>

<div>
    <form action='#' method='post' >

        <p>Titolo<br>
            <input type='text' name='titolo' id="titolo" required />
        </p>

        <p>Data<br>
            <input type="date" name="data" required>

        </p>
        <p>Testo<br>
            <textarea name="testo" id="testo" required >Inserisci qui il tuo articolo..
                </textarea>
        </p>
        <p>Immagine<br>
            <input name="foto" type="file" id="foto" >

        </p>


        <input type='submit' name="submit" value='INSERISCI' />
        or &nbsp;
        Back to <a href='news_select.php'> News </a>



    </form>
</div>

</body>
</html>