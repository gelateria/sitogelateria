<?php

    include("conn.php"); //connessione al db
    include("headeramm.php"); //header amministratore

if(isset($_GET['idutente'])) {

// il get mi porta i valori  in ricezione
    $idutente = $_GET['idutente'];
    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];
    $datanascita = $_GET['datanascita'];
    $citta = $_GET['citta'];
    $indirizzoresidenza = $_GET['indirizzoresidenza'];
    $telefono = $_GET['telefono'];
    $email = $_GET['email'];
    $nomeazienda = $_GET['nomeazienda'];
    $indirizzoazienda = $_GET['indirizzoazienda'];
    $cittaazienda = $_GET['cittaazienda'];
    $partitaiva = $_GET['partitaiva'];
    $username = $_GET['username'];
    $password = $_GET['password'];



//condizione post alla ricezione dei dati del form
    if ($_POST)
    {

      $idutente = $_POST['idutente'];
      $nome = $_POST['nome'];
      $cognome = $_POST['cognome'];
      $datanascita = $_POST['datanascita'];
      $citta = $_POST['citta'];
      $indirizzoresidenza = $_POST['indirizzoresidenza'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $nomeazienda = $_POST['nomeazienda'];
      $indirizzoazienda = $_POST['indirizzoazienda'];
      $cittaazienda = $_POST['cittaazienda'];
      $partitaiva = $_POST['partitaiva'];
      $username = $_POST['username'];
      $password = $_POST['password'];
// modifica del record nel db con update
        $sql = $connessione->exec("UPDATE utente SET nome='" . $nome . "' ,cognome='" . $cognome . "' ,datanascita='" . $datanascita . "',citta='" . $citta . "',indirizzoresidenza='" . $indirizzoresidenza . "',telefono='" . $telefono ."',email='" . $email ."',nomeazienda='" . $nomeazienda .
        "',indirizzoazienda='" . $indirizzoazienda ."',cittaazienda='" . $cittaazienda ."',partitaiva='" . $partitaiva ."',username='" . $username ."',password='" . $password .
         "'WHERE idutente='" . $idutente . "'");
        //stampo l'avvenuto aggiornamento
        echo "<br><br> Aggiornamento Record Effettuato
            <br> Torna agli utenti <a href='amm_utenti.php'> Back </a>";
    } else /// stampa  i campi da aggiornare
    {   echo '


<!--<html>
<head>

</head>
<body>
<div>-->
<h1>Update Utenti</h1>
<form method="post" action="#"> <!-- form aggiornamento utente -->
    <table>
        <tr>
            <td> IDutente</td>
            <td> Nome</td>
            <td> Cognome </td>
            <td> Data nascita </td>
            <td> Città </td>
            <td> Indirizzo residenza</td>
            <td> Telefono</td>
            <td> Email</td>
            <td> Nome azienda </td>
            <td> Indirizzo azienda </td>
            <td> Città azienda </td>
            <td> Partita iva </td>
            <td> Username </td>
            <td> Password </td>
        </tr>
        <tr>
            <td><input type="text" name="idutente" value="' . $idutente . '"> </td>
            <td><input type="text" name="nome" value="' . $nome . '"> </td>
            <td><input type="text" name="cognome" value="' . $cognome . '"> </td>
            <td><input type="date" name="datanascita" value="' . $datanascita . '"> </td>
            <td><input  type="text" name="citta" value="' . $citta . '" id="foto" ></td>
            <td><input type="text" name="indirizzoresidenza" value="' . $indirizzoresidenza . '"> </td>
            <td><input type="text" name="telefono" value="' . $telefono . '"> </td>
            <td><input type="email" name="email" value="' . $email . '"> </td>
            <td><input type="text" name="nomeazienda" value="' . $nomeazienda . '"> </td>
            <td><input  type="text" name="indirizzoazienda" value="' . $indirizzoazienda . '" id="foto" ></td>
            <td><input type="text" name="cittaazienda" value="' . $cittaazienda . '"> </td>
            <td><input type="text" name="partitaiva" value="' . $partitaiva . '"> </td>
            <td><input type="text" name="username" value="' . $username . '"> </td>
            <td><input type="password" name="password" value="' . $password . '"> </td>
        </tr>

    </table>
    <input type="submit" name="aggiorna" value="Update">
</form>
<!--</div>-->

</body>
 </html>

 ';
 include("footer.html"); //includo il footer
}}
