<?php
$col="mysql:localhost;dbname=sitogelateria";

$db=new PDO($col,'root','2654274');
/*collegamento al database effettuato*/

/*ora comunichiamo con il db.*/

$id=$_GET[("id")];

$sql=$db->exec("DELETE  FROM `sitogelateria`.`ordine` WHERE `id`=".$id);



echo"record eliminato.";



?>

<a href="back_and_gestione_ordini.php">BACK</a>