<html>
<HEAD>
	<TITLE>I nostri prodotti</TITLE>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="stile.css">
	<style type="text/css">
	#uno{
		float: left;
		width: 600px;
		
	}
	#due{
		float: right;
		
	}
	#tre {
		float: right;
		
	}
	#box{
		margin: auto;
		width: 1000px;
		min-height: 1000px;
	

	}

	</style>
</HEAD>
<BODY>
	
	<?php include 'header.php';?>
	<!--il primo div si occuperà di mostrare la parte inerente a i nuovi
	gusti inseriti, e dentro ad esso ci sarà la possibilità di vedere il
	catalogo completo dei prodotti-->
   <div id="box">
	<div id="uno">
	  <?php

	  	/*Primo if si attiva dopo aver cliccato sul tasto per visionare l'elenco
	  	completo dei prodotti*/
	    if ((isset($_POST["submit"]))) {
				include("conn.php");

	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	  $sql="SELECT nome,nome_foto,descrizione,ingrediente FROM catalogo";
	    	   //stampa a video dei risultati
	    	   foreach (($connessione->query($sql)) as $row) {
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		?>
	    		<div class="row">
				  <div class="col-sm-10 col-md-9">
				    <div class="thumbnail">
				      <img src="img/<?php echo $row['nome_foto'];?>" alt="<?php echo $row['ingrediente'];?>">
				      <div class="caption">
				        <h3><?php echo $row['nome']; ?></h3>
				        <p><?php echo $row['descrizione']; ?></p>
				        <p><a href="formgelato.php" class="btn btn-primary" role="button">Ordina</a> <a href="#" class="btn btn-default" role="button">Commenta</a></p>
				      </div>
				    </div>
				  </div>
				</div><?php	    	
	    		

	    }
	}
	    /*ELSE si attiva all'entrata sulla pagina e farà visionare i nuovi
	    prodotti, in particolare gli ultim 3 prodotti*/
	    else{
				include("conn.php");
	    	  //creazione della query SELECT per visualizare i nuovi gelati
	    	   $sql = "SELECT nome,ingrediente,nome_foto,descrizione FROM catalogo
	    	     	  ORDER BY 'desc()' LIMIT 3";
	    	   //stampa a video dei risultati
	    	   foreach ($connessione->query($sql) as $row) {
	    	   	
	    		//aggiungere parte html per inserire i risultati nella tabella
	    		?>
	    		<div class="row">
				  <div class="col-sm-6 col-md-9">
				    <div class="thumbnail">
				      <img src="img/<?php echo $row['nome_foto'];?>" alt="<?php echo $row['ingrediente'];?>">
				      <div class="caption">
				        <h3><?php echo $row['nome']; ?></h3>
				        <p><?php echo $row['descrizione']; ?></p>
				        <p><a href="formgelato.php" class="btn btn-primary" role="button">Ordina</a> <a href="#" class="btn btn-default" role="button">Commenta</a></p>
				      </div>
				    </div>
				  </div>
				</div><?php
	    	}
	    
	    	?>

	    	<!--Form che permette di visionare il catalogo completo dei prodotti
	    	e che premuto attiverà il primo IF-->
	    	<form method="post" action="<?php $PHP_SELF ?>">
	    		<input class="btn btn-info" type="submit" value="Catalogo completo" name="submit" id="submit">
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
		    	  $sql=$connessione->exec("INSERT INTO catalogo (nome,nome_foto,ingrediente,descrizione)
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
	    			<input type="text" name="nome" required></td>
	    		</tr>
	    		<tr>
	    			<td>Ingredienti (separati da virgole)<br>
	    			<input type="text" name="ingredienti" required></td>
	    		</tr>
	    		<tr>
	    			<td>Descrizione<br>
	    			<input type="text" name="descrizione" required></td>
	    		</tr>
	    		<tr>
	    			<td>Inserisci una foto<br>
	    			<input type="file" name="foto" required></td>
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
			    	  $sql="SELECT nome,ingrediente,nome_foto,descrizione FROM catalogo
			    	        ORDER BY rand() limit 1 ";

		    	   //stampa a video dei risultati
		    	   foreach (($connessione->query($sql)) as $row) {
		    		//aggiungere parte html per inserire i risultati nella tabella
				    		?>
			    		<div class="row">
						  <div class="col-sm-6 col-md-4">
						    <div class="thumbnail">
						      <img src="img/'<?php echo $row['nome_foto'];?>" alt="<?php echo $row['ingrediente'];?>">
						      <div class="caption">
						        <h3><?php echo $row['nome']; ?></h3>
						        <p><?php echo $row['descrizione']; ?></p>
						        <p><a href="formgelato.php" class="btn btn-primary" role="button">Ordina</a> <a href="#" class="btn btn-default" role="button">Commenta</a></p>
						      </div>
						    </div>
						  </div>
						</div><?php
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
				        $sql="SELECT nome,ingrediente,nome_foto,descrizione FROM catalogo
				    	  WHERE (nome LIKE '%$key') OR (ingrediente LIKE '%$key%')";
				    	   //stampa a video dei risultati
				       	   foreach (($connessione->query($sql)) as $row) {
				    		//aggiungere parte html per inserire i risultati nella tabella
				    		?>
					    		<div class="row">
								  <div class="col-sm-6 col-md-4">
								    <div class="thumbnail">
								      <img src="img/'<?php echo $row['nome_foto'];?>" alt="<?php echo $row['ingrediente'];?>">
								      <div class="caption">
								        <h3><?php echo $row['nome']; ?></h3>
								        <p><?php echo $row['descrizione']; ?></p>
								        <p><a href="formgelato.php" class="btn btn-primary" role="button">Ordina</a> <a href="#" class="btn btn-default" role="button">Commenta</a></p>
								      </div>
								    </div>
								  </div>
								</div><?php
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	 <script src="js/bootstrap.min.js"></script>
</BODY>
</html>
