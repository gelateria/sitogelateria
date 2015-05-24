<?php
session_start(); //start sessione database
include("conn.php"); //includo i dtai per la connessione al database
if (isset($_POST['invio'])) { //condizione accettata se viene premuto il tasto del form
    $username = $_POST["username"]; //assegno i dati del form alle variabili
    $password = $_POST["password"];
    if (($username == "administrator") & ($password == "icecream")) { // condizione per login amministratore
        $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //controllo errori
        $sql = $connessione->prepare("SELECT * FROM loginam WHERE username_am = :username AND password_am = :password"); //preparazione query selezione
        $sql->bindParam(':username', $username); //bind dei dati
        $sql->bindParam(':password', $password);
        $sql->execute(); //esecuzione query
        if ($row = $sql->fetch()) {//assegno i risultati della query ad un array
            $_SESSION["username"] = $row["username"]; // assegno le variabili di sessione
            $_SESSION["password"] = $row["password"];
            header('location:index_amministratore.php'); //reindirizzamento alla pagina di amministrazione
        } else {
            echo "Nome utente o password errati. Clicca " . "<a href='#'>qui</a>"; // messaggio di risposta per la condizione non rispettata e collegamento alla pagina di login
        }
    } else { //condizione per utente normale
        $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //controllo errori
        $sql = $connessione->prepare("SELECT * FROM utente WHERE username= :username AND password= :password"); //preparazione query selezione
        $sql->bindParam(':username', $username); //bind dei dati
        $sql->bindParam(':password', $password);
        $sql->execute(); //esecuzione query
        if ($row = $sql->fetch()) {//assegno i risultati della query ad un array
            $_SESSION["username"] = $row["username"]; // assegno le variabili di sessione
            $_SESSION["password"] = $row["password"];
            header('location:news.php'); //reindirizzamento
        } else {
            echo "Nome utente o password errati. Clicca " . "<a href='#'>qui</a>"; // messaggio di risposta per la condizione non rispettata e collegamento alla pagina di login
        }
    }
} else {
    ?>
    <meta charset="utf-8"> <!-- formattazione testo -->
    Log in
    <form name="form_login" method="post" > <!-- inizio del form con metodo post -->
          Username <input type="text" name="username" > <!-- inserimento dati -->
          Password <input type="password" name="password">
        <input type="submit" value="invio" name="invio"><!-- pulsante per l'invio dei dati -->
    </form>
    <?php
}
?>
