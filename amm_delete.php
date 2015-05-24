<?php
include("conn.php"); // connessione al db
$id = $_GET[("idutente")]; // assegnazione variabile ricevuta con il metodo GET
$sql = $connessione->exec("DELETE FROM utente WHERE idutente=" . $id); // query cancellazione tramite id
echo 'Cancellazione eserguita! Reindirizzamento..'; 
?>
<script>
    window.setTimeout("location=('amm_utenti.php');", 3500); //script javascript per reindirizzamento
</script>
