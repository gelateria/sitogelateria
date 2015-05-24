
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Select News </title>
    <style type="text/css">
    body{text-align: center}
        div{
    border: 3px solid black;
            max-width: 350px;
            height: 250px;
            margin: 0 auto;
            text-align: left;
            padding-left: 50px;
            padding-top: 30px;

        }

    </style>
</head>
<body>
<h1> NEWS </h1>

<p> Inserisci Articolo:   <a href="news_insert.php"> INSERT </a> </p>

    <table> <!-- Nomi campi tabella  indicizzabili con GET -->
        <td><a href="news_select.php?order=id" > IDnews </a></td>
        <td> <a href="news_select.php?order_c=titolo" > Titolo </a></td >
        <td> <a href="news_select.php?order_data=data" > Data </a> </td>
        <td class="td"> Testo </td>
        <td class="td">  Immagine </td>
        <td class="td"> ACTION </td>
    </tr>


  <?php

  include("conn.php");


    If(
        (isset($_GET['order_c']) and $sql=('SELECT * FROM news ORDER BY titolo'))
        or (isset($_GET['order']) and  $sql=('SELECT * FROM news ORDER BY idnews'))
        or (isset($_GET['order_data']) and  $sql=('SELECT * FROM news ORDER BY data_news'))
        or (empty($_GET) and $sql=('SELECT * FROM news'))
    ) {

        foreach (($connessione->query($sql)) as $row) {

            //stampa tutto il DB riga per riga
            echo '<td>' . $row['idnews'] . '</td><td>' . $row['titolo'] . '</td><td>' . $row['data_news'] . '</td><td> ' . $row['testo'] . '</td><td> ' . $row['immagine'] . '</td>';

            // LINK update_form.php
            echo  '<td><a href="news_update.php?idnews='.$row['idnews'].'&titolo='.$row['titolo'].'&data='.$row['data_news'].'&testo='.$row['testo'].'&immagine='.$row['immagine'].'">UPDATE</a> or ';
              
            // LINK delete_form.php
            echo '<a href="news_delete.php?idnews=' . $row['idnews'] . '"> DELETE</a></td></tr> ';
        }
    }
  ?>
</table></body></html>
