<?php


include'header.php';
include'conn.php';



if(isset($_POST['update'])){




    $id=$_GET['id'];/*valore id corretto*/
    $nomenuovo=$_POST["nome"];
    $cognomenuovo =$_POST["cognome"];
    $cittanuovo =$_POST["citta"];
    $indirizzonuovo =$_POST["indirizzo"];
    $capnuovo =$_POST["cap"];
    $emailnuovo =$_POST["email"];
    $telefononuovo =$_POST["telefono"];
    $datanuovo =$_POST["data"];
    $gelatonuovo =$_POST["gelato"];
    $gustonuovo =$_POST["gusto"];

    $quantitanuovo =$_POST["quantita"];







    $sql= $db->exec("UPDATE `ordine` SET `nome`='$nomenuovo' WHERE `id`=$id");

    //$sql= $db->exec("UPDATE `sitogelateria`.`ordine` SET `nome`='$nomenuovo',`cognome`='$cognomenuovo'`citta`='$cittanuovo',`indirizzo`='$indirizzonuovo',`cap`='$capnuovo',`email`='$emailnuovo',`telefono`='$telefononuovo',`data`='$datanuovo',`nome`='$nomenuovo',`gelato`='$gelatonuovo',`gusto`='$gustonuovo',`quantita`='$quantitanuovo', WHERE `id`=$id");


 echo"ordine aggiornato con successo.";




}
else {
    $id=$_GET['id'];
    $nomenuovo=$_GET["nome"];
    $cognomenuovo =$_GET["cognome"];
    $cittanuovo =$_GET["citta"];
    $indirizzonuovo =$_GET["indirizzo"];
    $capnuovo =$_GET["cap"];
    $emailnuovo =$_GET["email"];
    $telefononuovo =$_GET["telefono"];
    $datanuovo =$_GET["data"];
    $oranuovo =$_GET["ora"];
    $gelatonuovo =$_GET["gelato"];
    $gustonuovo =$_GET["gusto"];
    $pannanuovo =$_GET["panna"];
    $quantitanuovo =$_GET["quantita"];

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        form {
            padding: 0 0 0 10px;
        }
        #panna {

        }
    </style>

    <title>Aggiornamento ordine: </title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<h3>Aggiornamento ordine:</h3><br/>

<form id="form" method="POST" action="<?php $_PHP_SELF ?>">
    <fieldset >
       <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input name="nome" type="text"  class="form-control" id="nome" placeholder="Inserisci il nome...">
                </div>
            </div>
       </div>
       <div class="row">
          <div class="col-sm-5 col-lg-5">
            <div class="form-group">
                <label for="cognome">Cognome</label><br/>
                <input name="cognome" type="text" class="form-control" id="cognome" placeholder="Inserisci il cognome...">
            </div>
          </div>
       </div>

        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Citt&agrave</label><br/>
                    <input type="text" name="email" class="form-control" id="citta" placeholder="Inserisci la citt&agrave...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Indirizzo</label><br/>
                    <input type="text" name="indirizzo" class="form-control" id="indirizzo" placeholder="Inserisci l'indirizzo...">
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                   <label for="email">Cap</label><br/>
                   <input type="text" name="cap" class="form-control" id="cap" placeholder="Inserisci il Cap...">
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Email</label><br/>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Inserisci l'e-mail...">
                </div>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Telefono</label><br/>
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Inserisci il telefono...">
                </div>
           </div>
        </div>
        <div class="row">
             <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Data</label><br/>
                    <input type="text" name="data" class="form-control" id="data" placeholder="Inserisci la data...">
                </div>
             </div>
        </div>
        <div class="row">
          <div class="col-sm-5 col-lg-5">
            <div class="form-group">
                <label for="email">Ora</label><br/>
                <input type="text" name="ora" class="form-control" id="ora" placeholder="Inserisci l'ora...">
            </div>
          </div>
        </div>
        <div class="row">
             <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Tipologia gelato</label><br/>
                    <input name="gelato" type="text" class="form-control" id="gelato" placeholder="Seleziona la tipologia di gelato...">
                </div>
             </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">gusto</label><br/>
                    <input type="text" name="gusto" class="form-control" id="gusto" placeholder="Inserisci il gusto...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="email">Panna</label><br/>
                    <input type="text" name="panna" class="form-control" id="data">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="form-group">
                    <label for="stato">Quantit&agrave</label>
                    <select name="quantita" class="form-control" id="stato">
                        <option>mezzo chilo</option>
                        <option>Un chilo</option>
                        <option>Due chili</option>
                        <option>Richiedere per maggiori quantit&agrave</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-lg-5">
                <div class="checkbox">
                    <label for="stato">Panna</label>
                    <select name="quantita" class="form-control" id="panna">
                        <option>Si</option>
                        <option>No</option>
                    </select>
                    </label>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-default">Invia</button>
    </fieldset>
</form>
<?php
}
?>
<br><br>
<a href="back_and_gestione_ordini.php">BACK</a>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<?php

include'footer.html';
?>

</body>
</html>