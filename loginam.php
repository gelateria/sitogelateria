<?php
session_start(); //start sessione database
include("conn.php"); //includo i dati per la connessione al database
if (isset($_POST['logout'])) { //se viene premuto il tasto di logout
    session_destroy(); //interrompo la sessione per il logout
    header("location:index.php"); //reindirizzamento all'index
}
if (isset($_SESSION['username'])) { //se la sessione è attiva
    echo'<script src="js/jquery.js"></script> <!-- richiamo libreria jquery -->
  <script>
      $(document).ready(function() { //funzione per nascondere il pulsante di login e mostrare quello di logout
          $("#logout").show();
          $("#loginb").hide();
});
  </script>' . "<div style='position:relative;left:1010px;'>Benvenuto " . $_SESSION['username'] . "</div>"; //stampo a video username utente
} else {
    echo'<script src="js/jquery.js"></script> <!-- richiamo libreria jquery -->
    <script>
        $(document).ready(function() { //funzione per nascondere il pulsante di logout e mostrare quello di login
            $("#logout").hide();
            $("#loginb").show();
});
    </script>';
    ;
}
if (isset($_POST['Vai'])) { //condizione accettata se viene premuto il tasto di login
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
    <link rel="stylesheet" href="stile.css" type="text/css"> <!--foglio di stile-->
    <meta charset="utf-8"> <!-- formattazione testo -->
    <form method="post" > <!-- inizio del form con metodo post -->
        <div style="float:right;">
            <font class="login">User</font> <input type="text" name="username" style="height:20px;width:100px;border-radius:5px;box-shadow:0px 0px 2px gray;border-style:none;" ><br> <!-- inserimento dati -->
            <font class="login" style="margin-top:5px;">Pass</font> <input  type="password" name="password" style="margin-top:5px;height:20px;width:100px;border-radius:5px;box-shadow:0px 0px 2px gray;border-style:none;" ><br>
            <input class="btn" type="submit" id="loginb" value="Vai" name="Vai" style="border-radius:5px;color:white;background-color:burlywood;height:30px;width:50px;border-style:outset;border-color:burlywood; margin-top:5px;line-height:10px;"> <!-- pulsante di login -->
            <input class="btn" type="submit" id="logout" value="logout" name="logout" style="border-radius:5px;color:black;margin-top:5px;background-color:white;height:30px;width:60px;border-style:outset;border-color:white;line-height:10px;"> <!-- link di logout -->
        </div>
    </form> <!-- chiusura form -->
    <?php
}
?>
