<?php

session_start();
include('header.php');
include("conn.php"); // includo file per la connessione
if (isset($_POST['invio'])) { //condizione verificata se viene cliccato il tasto del form
    if ((isset($_POST['password'])) && (isset($_POST['username'])) && (isset($_POST['email']))) { //condizione rispettata se vengono inseriti i dati
        $nome = $_POST['nome']; //assegnazione dei dati ricevuti dal form alle variabili
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

        //query di inserimento dati al database
        $sql = $connessione->exec("INSERT INTO utente (idutente,nome,cognome,datanascita,citta,indirizzoresidenza,telefono,email,nomeazienda,indirizzoazienda,cittaazienda,partitaiva,username,password) VALUES (NULL,'" . $nome . "','" . $cognome."','". $datanascita ."','".$citta."','".$indirizzoresidenza."','".$telefono."','".$email."','".$nomeazienda."','".$indirizzoazienda."','".$cittaazienda."','".$partitaiva."','".$username."','".$password."')");
        $_SESSION["datanascita"] = $datanascita;
        echo "ti sei registrato con successo. Clicca qui per effettuare il " . "<a href='#'>login</a>"; //messaggio di avvenuta registrazione con connessione pagina login
    } else {
        echo "registrazione fallita!! Ritenta. " . "<a href='registrazione.php'> indietro </a>"; //messaggio di risposta per la condizione non rispettata e collegamento alla pagina di registrazione
    }
} else {
    ?>
    <meta charset="utf-8"> <!-- meta per il testo -->
    <h2>Registrazione</h2>
    <form name="registrazione" method="post"> <!-- inizio del form con metodo post -->
        <br/>
        <p>nome: <input type="text" name="nome" placeholder="campo obbligatorio" required></p> <!-- inserimento dati -->
        <br/>
        <p>cognome: <input type="text" name="cognome" placeholder="campo obbligatorio" required></p>
        <br/>
        <p>Data Di Nascita: <input type="date" name="datanascita" ></p>
        <br/>
        <p>Città: <input type="text" name="citta" placeholder="campo obbligatorio" required></p> <!-- inserimento dati -->
        <br/>
        <p>Indirizzo Residenza: <input type="text" name="indirizzoresidenza"></p>
        <br/>
        <p>Numero di Telefono: <input type="text" name="telefono" ></p>
        <br/>
        <p>Email: <input type="text" name="email" placeholder="campo obbligatorio" required></p>
        <br/>
        <p>Nome Azienda: <input type="text" name="nomeazienda"></p> <!-- inserimento dati -->
        <br/>
        <p>Indirizzo Azienda: <input type="text" name="indirizzoazienda"></p>
        <br/>
        <p>Città Azienda: <input type="text" name="cittaazienda"></p> <!-- inserimento dati -->
        <br/>
        <p>Partita Iva: <input type="text" name="partitaiva"></p>
        <br/>
        <p>Username: <input type="text" name="username" placeholder="campo obbligatorio" required></p> <!-- inserimento dati -->
        <br/>
        <p>Password: <input type="password" name="password" placeholder="campo obbligatorio" required></p>
        <br/>




    <label for="recaptcha_challenge_field">Verifica immagine</label>

    <input id="hash" type="hidden" name="humanverify[hash]" value="b5debf2428f4662fabd906f96261545b" />

        <script type="text/javascript">
            var RecaptchaOptions = {
            theme : 'blackglass',
            callback: function() {document.getElementById('recaptcha_response_field').tabIndex = 1;}
            ,lang : 'it'
        };
            function reloadRecaptcha(){
                if( typeof(Recaptcha) != 'undefined')
                {
                    Recaptcha.create("6Lf5ONwSAAAAAB9ySV52kZyv7G7rd7Uf7zVhhLHO", "recaptcha_block", RecaptchaOptions);
                }
            }
        </script>

            <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lf5ONwSAAAAAB9ySV52kZyv7G7rd7Uf7zVhhLHO">

            </script>
            <br>

    <p>Presa visone dell'informativa che precede, presta il consenso al trattamento dei dati personali inseriti nel modulo di richiesta iscrizione e per quelli relativi alla utilizzazione del servizio come descritto nell'informativa
                     <input type="checkbox" name="privacy" value="accettato" required="leggi la privacy e apponi la spunta"/></p>
        <input type="submit" value="registrati" name="invio"> <!-- pulsante per l'invio dei dati -->
    </form>
    <?php
}
include('footer.html');
?>
