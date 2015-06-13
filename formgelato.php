<?php
//Apriamo una sessione per poter conservare i valori dei campi del form per un successivo ordine a nome della stessa persona
	//session_start();
	?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="formgelato.css" >
		<title>
			Ordine
		</title>
		<script language="javascript" type="text/javascript">
			/* Funzione per visualizzare/nascondere i tipi di coppetta selezionabili */
			function fToggle(elementId) {
				// Recupero l'elemento dall'Id
				var e = document.getElementById(elementId);
				// Se e' visibile lo nascondo
				if ( !e.style.display || e.style.display != "none" ) {
					e.style.display = "none";
				} else {
					// Altrimenti lo visualizzo
					e.style.display = "block";
				}
			}

			// =============== Funzione per impedire l'inserimento di caratteri NON numerici nel campo Telefono ===============//

			function onlyNumeric(evt){
   			/*Questa condizione ternaria è necessaria per questioni di compatibilità tra browser se "evt.which" non viene preso, usa "event.keyCode" */
   			var charCode=(evt.which)?evt.which:event.keyCode;
   			if(charCode>31 && (charCode<48 || charCode>57))
      		return false;
   			return true;
			}

		</script>
	</head>
	<body>
		<?php include 'header.php';?>
		<!-- Con questo tag si eviteranno problemi con caratteri accentati -->
		<meta charset="utf-8" />
		<h1 class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">Ordina del gelato</h1>
		<div>
		<!-- Form per la presa in carico di un ordine di gelato -->
		<table id="form" class="class=col-lg-11 col-md-11 col-sm-8 col-xs-4">
			<tr>
				<td>
					<form method="post" action="insertgelato.php">
						Nome 
				</td>
				<td>
					<input type="text" name="nome" autofocus value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['nome']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Cognome 
				</td>
				<td>
					<input type="text" name="cognome" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['cognome']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Citt&agrave
				</td>
				<td>
					<input type="text" name="citta" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['citta']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Indirizzo
				</td>
				<td>
					<input type="text" name="indirizzo" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['indirizzo']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					CAP
				</td>
				<td>
					<input type="text" name="cap" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['cap']; ?>" onkeypress="return onlyNumeric(event);" />
				</td>
			</tr>
			<tr>
				<td>
					Telefono 
				</td>
				<td>
					<input type="text" name="telefono" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['telefono']; ?>" onkeypress="return onlyNumeric(event);" maxlength="10" />
				</td>
			</tr>
			<tr>
				<td>
					E-mail (sar&agrave usata per confermare l'ordine)
				</td>
				<td>
					<input type="email" name="email" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['email']; ?>" placeholder="indirizzo@dominio.en" />
				</td>
			</tr>
			<tr>
				<td>
					Data consegna
				</td>
				<td>
					<input type="date" name="data" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['data']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Ora consegna (10:00 / 23:00)
				</td>
				<td>
					<input type="time" name="ora" min="10:00" max="23:00" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['ora']; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Gelato 
				</td>
				<td>
					<fieldset>
						Cono <input type="radio" name="gelato" value="cono">
							<a onclick="javascript:fToggle('menu1');"></a>
							<div id="menu1" style"display:none";>
						Coppetta<a onclick="javascript:fToggle('elenco1');"><input type="radio" name="gelato" value="coppetta"></a>
								<ol id="elenco1" style="display:none;">
									<li>Piccola<input type="radio" name="grandezza" value="piccola"></li>
									<li>Media<input type="radio" name="grandezza" value="media"></li>
									<li>Grande<input type="radio" name="grandezza" value="grande"></li>
								</ol>
							</div>
						Brioche <input type="radio" name="gelato" value="brioche">
					</fieldset>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					Gusto 
				</td>
				<td>
					Primo gusto
					<fieldset>
						<select name="gusto1">
							<option value="amarena"> Amarena </option>
							<option value="anguria"> Anguria </option>
							<option value="caffe"> Caff&egrave </option>
							<option value="cioccolato"> Cioccolato </option>
							<option value="cocco"> Cocco </option>
							<option value="fragola"> Fragola </option>
							<option value="lampone"> Lampone </option>
							<option value="nocciola"> Nocciola </option>
							<option value="stracciatella"> Stracciatella </option>
							<option value="vaniglia"> Vaniglia </option>
						</select>
					</fieldset>
				</td>
				<td>
					Secondo gusto
					<fieldset>
						<select name="gusto2">
							<option value="nessuno"> ------- </option>
							<option value="amarena"> Amarena </option>
							<option value="anguria"> Anguria </option>
							<option value="caffe"> Caff&egrave </option>
							<option value="cioccolato"> Cioccolato </option>
							<option value="cocco"> Cocco </option>
							<option value="fragola"> Fragola </option>
							<option value="lampone"> Lampone </option>
							<option value="nocciola"> Nocciola </option>
							<option value="stracciatella"> Stracciatella </option>
							<option value="vaniglia"> Vaniglia </option>
						</select>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					Panna
				</td>
				<td>
					<fieldset>
						S&iacute <input type="radio" name="panna" value="si">
						No <input type="radio" name="panna" value="no">
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					Quantit&agrave
				</td>
				<td>
					<input type="text" name="quantita" maxlength="1" onkeypress="return onlyNumeric(event);">
				</td>
				<td>
					<fieldset>
						Kg <input type="radio" name="kgopezzi" value="Kg">
						Pezzi <input type="radio" name="kgopezzi" value="Pezzi">
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					<input class="btn btn-primary col-lg-2 col-md-2 col-sm-4 col-xs-12" type="submit" value="Invia" name="form">
					<input class="btn btn-success col-lg-2 col-md-2 col-sm-4 col-xs-12" type="reset" value="Reset">
				</td>
			</tr>
			</form>
		</table>
		</div>
	    <?php include 'footer.html';?> 
	</body>
</html>