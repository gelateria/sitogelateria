<?php
session_start(); //start sessione database
include("conn.php"); //includo i dtai per la connessione al database
if (isset($_POST['invio'])) { //condizione accettata se viene premuto il tasto del form
    $username = $_POST["username"]; //assegno i dati del form alle variabili
    $password = $_POST["password"];
    if (($username == "administrator") & ($password == "icecream")) { // condizione per login amministratore
        $today = date("F j, Y, g:i a"); //data di accesso
        setcookie("data_accesso", $today, time() + 3600); //assegno data di accesso ad un cookie
        $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //controllo errori
        $sql = $connessione->prepare("SELECT * FROM loginam WHERE username_am = :username AND password_am = :password"); //preparazione query selezione
        $sql->bindParam(':username', $username); //bind dei dati
        $sql->bindParam(':password', $password);
        $sql->execute(); //esecuzione query
        if ($row = $sql->fetch()) {//assegno i risultati della query ad un array
            $_SESSION["username"] = $row["username"]; // assegno le variabili di sessione
            $_SESSION["password"] = $row["password"];
            header('location:index_amministratore.php'); //reindirizzamento alla pagina di amministrazione
        }
    } else { //condizione per utente normale
        $today = date("F j, Y, g:i a"); //data di accesso
        setcookie("data_accesso", $today, time() + 3600); //assegno data di accesso ad un cookie
        $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //controllo errori
        $sql = $connessione->prepare("SELECT * FROM utente WHERE username= :username AND password= :password"); //preparazione query selezione
        $sql->bindParam(':username', $username); //bind dei dati
        $sql->bindParam(':password', $password);
        $sql->execute(); //esecuzione query
        if ($row = $sql->fetch()) {//assegno i risultati della query ad un array
            $_SESSION["username"] = $row["username"]; // assegno le variabili di sessione
            $_SESSION["password"] = $row["password"];
            header('location:index.php'); //reindirizzamento
        } else {
            echo "<div style='float:right;'> Nome utente o password errati. Clicca " . "<a href='index.php'>qui</a></div>"; // messaggio di risposta per la condizione non rispettata e collegamento alla pagina di login
        }
    }
} else {
    ?>
    <meta charset="utf-8"> <!-- formattazione testo -->
    <form method="post" > <!-- inizio del form con metodo post -->
        <div style="float:right;">
            User <input type="text" name="username" style="height:20px;width:100px;" ><br> <!-- inserimento dati -->
            Pass <input type="password" name="password" style="height:20px;width:100px;" ><br>
            <input type="submit" id="loginb" value="Vai" name="Vai"> <!-- pulsante di login -->
            <input type="submit" id="logout" value="logout" name="logout"> <!-- link di logout -->
        </div>
    </form> <!-- chiusura form -->
<?php
}
?>
