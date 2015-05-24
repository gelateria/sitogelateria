<html>
	<head>
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
		</script>
	</head>
	<body>
		<?php include 'header.php';?>
		<!-- Con questo tag si eviteranno problemi con caratteri accentati -->
		<meta charset="utf-8" />
		<h1>Ordina del gelato</h1>
		<div>
		<!-- Form per la presa in carico di un ordine di gelato -->
		<table>
			<tr>
				<td>
					<form method="post" action="insertgelato.php">
						Nome
				</td>
				<td>
					<input type="text" name="nome" autofocus>
				</td>
			</tr>
			<tr>
				<td>
					Cognome
				</td>
				<td>
					<input type="text" name="cognome">
				</td>
			</tr>
			<tr>
				<td>
					Città
				</td>
				<td>
					<input type="text" name="citta">
				</td>
			</tr>
			<tr>
				<td>
					Indirizzo
				</td>
				<td>
					<input type="text" name="indirizzo">
				</td>
			</tr>
			<tr>
				<td>
					CAP
				</td>
				<td>
					<input type="text" name="cap">
				</td>
			</tr>
			<tr>
				<td>
					Telefono
				</td>
				<td>
					<input type="number" name="telefono">
				</td>
			</tr>
			<tr>
				<td>
					E-mail (sarà usata per confermare l'ordine)
				</td>
				<td>
					<input type="email" name="email" placeholder="indirizzo@dominio.en">
				</td>
			</tr>
			<tr>
				<td>
					Data consegna
				</td>
				<td>
					<input type="date" name="data">
				</td>
			</tr>
			<tr>
				<td>
					Ora consegna (10:00 / 23:00)
				</td>
				<td>
					<input type="time" name="ora" min="10:00" max="23:00">
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
							<option value="caffe"> Caffè </option>
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
							<option value="caffe"> Caffè </option>
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
						Sì <input type="radio" name="panna" value="si">
						No <input type="radio" name="panna" value="no">
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					Quantità
				</td>
				<td>
					<input type="text" name="quantita">
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
					<input type="submit" value="Invia">
					<input type="reset" value="Reset">
				</td>
			</tr>
			</form>
		</table>
		</div>
	<?php include 'footer.html';?>
	</body>
</html>
