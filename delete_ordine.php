<?php
include'conn.php';
/*collegamento al database effettuato*/

/*ora comunichiamo con il db.*/

$id=$_GET['idordine'];

$sql=$connessione->exec("DELETE FROM ordine WHERE idordine=".$id);



echo"record eliminato.";



?>

<a href="back_ordini.php">BACK</a>
