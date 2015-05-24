<html>
<HEAD>
	<TITLE>I nostri prodotti</TITLE>
	<link rel="stylesheet" type="text/css" href="stile.css">
	<style type="text/css">

	</style>
</HEAD>
<BODY>
	<div>
	<?php include 'header.php';?>
	<!--il primo div si occuperà di mostrare la parte inerente a i nuovi
	gusti inseriti, e dentro ad esso ci sarà la possibilità di vedere il
	catalogo completo dei prodotti-->
	<div id="uno">
	  <?php
	  	/*Primo if si attiva dopo aver cliccato sul tasto per visionare l'elenco
	  	completo dei prodotti*/
	    if ((isset($_POST["submit"]))) {
				include("conn.php");
	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	  $sql="SELECT nome,dati_foto,descrizione,ingredienti FROM catalogo";
	    	   //stampa a video dei risultati
	    	   foreach ($connessione->query($sql) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['dati_foto'] ) . '" width=300px /><br>'."Nome: ".
	    		$row['nome']."<br>Ingredienti: ".$row['ingredienti'];

	    }
	}
	    /*ELSE si attiva all'entrata sulla pagina e farà visionare i nuovi
	    prodotti, in particolare gli ultim 3 prodotti*/
	    else{
				include("conn.php");
	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	  $sql="SELECT nome,ingredienti,dati_foto,descrizione FROM catalogo
	    	     	  ORDER BY 'desc()' LIMIT 3";

	    	   //stampa a video dei risultati
	    	   foreach ($connessione->query($sql) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['dati_foto'] ) . '" width=300px /><br>'."Nome: ".
	    		$row['nome']."<br>Ingredienti: ".$row['ingredienti'];
	    	}?>
	    	<!--Form che permette di visionare il catalogo completo dei prodotti
	    	e che premuto attiverà il primo IF-->
	    	<form method="post" action="<?php $PHP_SELF ?>">
	    		<input type="submit" value="Catalogo completo" name="submit" id="submit">
	    	</form>
	    <?php
	    }
		?>

	</div>
	<div id="tre">
		<?php
	  	/*Primo if si attiva dopo aver cliccato sul tastoper l'inserimento
	  	dei nuovi prodotti*/
	    if ((isset($_POST["carica"]))) {

	    	$nome=$_POST['nome'];
	    	 $ingredienti=$_POST['ingredienti'];
	    	  $descrizione=$_POST['descrizione'];
	    	   $foto=$_POST['foto'];
					include("conn.php");
		    	  //creazione della query SELECT per visualizare i nuovi gelati
		    	  $sql=$connessione->exec("INSERT INTO catalogo (nome,dati_foto,ingredienti,descrizione)
		    	  	VALUES ('$nome','$foto','$ingredienti','$descrizione')");
		    	  echo "Abbiamo inserito il gusto: ".$nome;
		    	  //echo '<a href="#form">Inserisci nuovo gusto</a>';
	    	}

	    /*ELSE si attiva all'entrata sulla pagina e farà visionare i nuovi
	    prodotti, in particolare gli ultim 3 prodotti*/
	    else{
	    	?>
	    	<!--Form che permette di inserire nuovi gusti-->
	    	<form method="post" action="<?php $PHP_SELF ?>" id="form">
	    	<table>
	    		<tr>
	    			<td>Nome<br>
	    			<input type="text" name="nome"></td>
	    		</tr>
	    		<tr>
	    			<td>Ingredienti (separati da virgole)<br>
	    			<input type="text" name="ingredienti"></td>
	    		</tr>
	    		<tr>
	    			<td>Descrizione<br>
	    			<input type="text" name="descrizione"></td>
	    		</tr>
	    		<tr>
	    			<td>Inserisci una foto<br>
	    			<input type="file" name="foto"></td>
	    		</tr>
	    		<tr>
	    			<td><input type="submit" value="Carica" name="carica" id="carica"></td>
	    		</tr>
	    	</table>
	    	</form>

	    <?php
	    }
	    ?>
	</div>
	<div id="due">
	 <!--Questo div si occuperà della parte inerente la ricerca di un gusto
	 in particolare, attraverso l'utilizzo di una barra di ricerca, con la
	 presenza di un tasto che permette la selezione di un gusto a caso-->
	 <?php


	  	/*Primo if si attiva dopo aver cliccato sul tasto per la ricerca*/
	    if ((isset($_POST["cerca"])) || (isset($_POST["lucky"]))) {

	    	$key=$_POST['key'];
	    	//if lucky serve per l'estrazione del gelato a caso
	    	if ((isset($_POST["lucky"]))) {
	    		?>
	    		<form method="post" action="<?php $PHP_SELF ?>">
	    		<input type="text" name="key" size="45"><br>
	    		 <input type="submit" value="Cerca" name="cerca" id="cerca">
	    		  <input type="submit" value="Tenta la fortuna" name="lucky" id="lucky">
	    		   </form>
	    		    <?php
							include("conn.php");
			    	  //creazione della query SELECT per visualizare i nuovi gelati
			    	  $sql="SELECT nome,ingredienti,dati_foto,descrizione FROM catalogo
			    	        ORDER BY rand() limit 1 ";

		    	   //stampa a video dei risultati
		    	   foreach ($connessione->query($sql) as $row) {
		    		//aggiungere parte html per inserire i risultati nella tabella
		    		echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['dati_foto'] ) . '" width=300px /><br>'."Nome: ".
	    			$row['nome']."<br>Ingredienti: ".$row['ingredienti'];
	    	 		}
	    	}
	    	else{
	    		?>
	    		<form method="post" action="<?php $PHP_SELF ?>">
	    		<input type="text" name="key" size="45"><br>
	    		 <input type="submit" value="Cerca" name="cerca" id="cerca">
	    		  <input type="submit" value="Tenta la fortuna" name="lucky" id="lucky">
	    			</form>
				     <?php
				      include("conn.php");
				        //creazione della query SELECT per visualizare i risultati
				        $sql="SELECT nome,ingredienti,dati_foto,descrizione FROM catalogo
				    	  WHERE (nome LIKE '%$key') OR (ingredienti LIKE '%$key%')";
				    	   //stampa a video dei risultati
				       	   foreach ($connessione->query($sql) as $row) {
				    		//aggiungere parte html per inserire i risultati nella tabella
				    		echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['dati_foto'] ) . '" width=100px /><br>'."Nome: ".
				    		$row['nome']."<br>Ingredienti: ".$row['ingredienti'];
	    		}
	    	}

	    }
	    /*ELSE si attiva all'entrata sulla pagina e verranno visualizzati
	    la barra di ricerca e il tasto del gelato fortunato*/
	    else{
	    	?>
	    	<!--Form che permette di scrivere la parola da ricercare,
	    	tasto di ricerca più gelato fortunato-->
	    	<form method="post" action="<?php $PHP_SELF ?>">
	    		<input type="text" name="key" size="45"><br>
	    		 <input type="submit" value="Cerca" name="cerca" id="cerca">
	    		  <input type="submit" value="Tenta la fortuna" name="lucky" id="lucky">
	    	</form>
	    <?php
	    }
	    ?>

	</div>
	</div>
	<?php include 'footer.html';?>
</BODY>
</html>
