<?php
include("header.php");
//session_start();

include("conn.php"); // includere file per la connessione al db

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
        echo "ti sei registrato con successo. Clicca qui per effettuare il " . "<a href='#'>login</a>"; //messaggio di avvenuta registrazione
    } else {
        echo "registrazione fallita!! Ritenta. " . "<a href='registrazione.php'> indietro </a>"; //messaggio di risposta per la condizione non rispettata e collegamento alla pagina di registrazione
    }
} else {
    ?>
    <div id="reg" text align="center">
        <h2>Registrazione</h2>
    </div>
    <br>
    <br>
  <form class="form-horizontal" method="post">
 <fieldset>
    
   <div class="form-group">
   <label for="nome" class="col-sm-2 col-lg-2 control-label">Nome</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text" class="form-control" name="nome" placeholder="Inserisci il nome..." required>
   </div>
   </div>
    
   <div class="form-group">
   <label for="cognome" class="col-sm-2 col-lg-2 control-label">Cognome</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="cognome" placeholder="Inserisci il cognome..." required>
   </div>
   </div>
   
   <div class="form-group">
   <label for="datanascita" class="col-sm-2 col-lg-2 control-label">Data Di Nascita</label>
   <div class="col-sm-5 col-lg-5">
   <input type="date" class="form-control" name="datanascita" placeholder="Inserisci la tua data..." required>
   </div>
   </div>
  
    <div class="form-group">
   <label for="citta" class="col-sm-2 col-lg-2 control-label">Città</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="citta" placeholder="Inserisci la città..." required>
   </div>
   </div>
    
   <div class="form-group">
   <label for="indirizzoresidenza" class="col-sm-2 col-lg-2 control-label">Indirizzo Residenza</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="indirizzoresidenza" placeholder="Inserisci l'indirizzo di residenza..." required>
   </div>
   </div>
    
    <div class="form-group">
   <label for="telefono" class="col-sm-2 col-lg-2 control-label">Numero di Telefono</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text" class="form-control" name="telefono" placeholder="Inserisci il numero di telefono..." required>
   </div>
   </div>

   <div class="form-group">
   <label for="email" class="col-sm-2 col-lg-2 control-label">Email</label>
   <div class="col-sm-5 col-lg-5">
   <input type="mail"class="form-control"  name="email" placeholder="Inserisci l'indirizzo email..." required>
   </div>
   </div>
    
    
   <div class="form-group">
   <label for="nomeazienda" class="col-sm-2 col-lg-2 control-label">Nome Azienda</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="nomeazienda" placeholder="Inserisci il nome dell'azienda...">
   </div>
   </div>
    
   <div class="form-group">
   <label for="indirizzoazienda" class="col-sm-2 col-lg-2 control-label">Indirizzo Azienda</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="indirizzoazienda" placeholder="Inserisci l'indirizzo dell'Azienda...">
   </div>
   </div>

   <div class="form-group">
   <label for="cittaazienda" class="col-sm-2 col-lg-2 control-label">Città Azienda</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="cittaazienda" placeholder="Inserisci la città dell'azienda...">
   </div>
   </div>
    
   <div class="form-group">
   <label for="partitaiva" class="col-sm-2 col-lg-2 control-label">Partita Iva</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="partitaiva" placeholder="Inserisci la Partita Iva...">
   </div>
   </div>

   <div class="form-group">
   <label for="username" class="col-sm-2 col-lg-2 control-label">Username</label>
   <div class="col-sm-5 col-lg-5">
   <input type="text"class="form-control"  name="username" placeholder="Inserisci il tuo Username..." required>
   </div>
   </div>
    
   <div class="form-group">
   <label for="password" class="col-sm-2 col-lg-2 control-label">Password</label>
   <div class="col-sm-5 col-lg-5">
   <input type="password"class="form-control"  name="password" placeholder="Inserisci la Password..." required>
   </div>
   </div>


        <div id="form2" input align="center">
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
            </script>
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
            <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lf5ONwSAAAAAB9ySV52kZyv7G7rd7Uf7zVhhLHO">

            </script>
            <br>
        </div>
        <div id="form3" text align="center">
            <p>Presa visone dell'informativa che precede, presta il consenso al trattamento dei dati personali inseriti nel modulo di richiesta iscrizione e per quelli relativi alla utilizzazione del servizio come descritto nell'informativa
                <br><input type="checkbox" name="privacy" value="accettato" required="leggi la privacy e apponi la spunta"/></p>
            <br><input type="submit" value="registrati" name="invio"> <!-- pulsante per l'invio dei dati -->
            </form>
        </div>
        <br>
    <?php
    include("footer.html");
}

?>
