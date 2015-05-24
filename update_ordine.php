<?php




if(isset($_POST['update'])){

    include'conn.php';

    $id=$_GET['idordine'];/*valore id corretto*/
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








    $sql= $connessione->exec("UPDATE ordine SET nome='$nomenuovo',cognome='$cognomenuovo'citta='$cittanuovo',indirizzo='$indirizzonuovo',cap='$capnuovo',email='$emailnuovo',telefono='$telefononuovo',data='$datanuovo',nome='$nomenuovo',gelato='$gelatonuovo',gusto='$gustonuovo',quantita='$quantitanuovo', WHERE id=$id");


 echo"ordine aggiornato con successo.";




}
else {
    $id=$_GET['idordine'];
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
    <title>Aggiornamento ordine: </title>

</head>
<body>

<h3>Aggiornamento ordine:</h3><br/>

<form method="POST" action="<?php $_PHP_SELF ?>">
    <table>


        <tr>
            <td> nome</td>

            <td><input type="text" name="nome"> </td>
        </tr>
        <tr>
            <td> cognome</td>
            <td><input type="text" name="cognome"> </td>
        </tr>
        <tr>
            <td> citt&agrave</td>
            <td><input type="text" name="citta"> </td>
        </tr>
        <tr>
            <td> indirizzo</td>
            <td><input type="text" name="indirizzo"> </td>
        </tr>
        <tr>
            <td> cap</td>
            <td><input type="text" name="cap"> </td>
        </tr>
        <tr>
            <td> email</td>
            <td><input type="text" name="email"> </td>
        </tr>
        <tr>
            <td> telefono</td>
            <td><input type="text" name="telefono"> </td>
        </tr>
        <tr>
            <td> data</td>
            <td><input type="text" name="data"> </td>
        </tr>
        <tr>
            <td> tipologia gelato</td>
            <td><input type="text" name="gelato"> </td>
        </tr>
        <tr>
            <td> gusto</td>
            <td><input type="text" name="gusto"> </td>
        </tr>
        <tr>
            <td> panna</td>
            <td> <input type="radio" name="panna"  value="si"/>  Si<input type="radio" name="panna" value="no"/> No</td>
        </tr>
        <tr>
            <td> quantita</td>
            <td>
                <form>
                    <select name="quantita" >
                        <option value="0.5">mezzo chilo</option>
                        <option value="1">un chilo</option>
                        <option value="2">due chili</option>
                        <option value="3">tre chili</option>
                        <option value="oltre">oltre i 3 richiedere disponibilit&agrave</option>
                    </select>
                </form>
            </td>
        </tr>


        <tr>
            <td><input type="submit" name="update" value="update"></td>

        </tr>


    </table>
</form>
<?php
}
?>
<br><br>
<a href="back_ordini.php">BACK</a>
</body>
</html>
