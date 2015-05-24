<?php
	 $nome=$_POST["nome"];
	 $cognome=$_POST["cognome"];
	 $citta=$_POST["citta"];
	 $indirizzo=$_POST["indirizzo"];
	 $cap=$_POST["cap"];
	 $email=$_POST["email"];
	 $telefono=$_POST["telefono"];
	 $data=$_POST["data"];
	 $ora=$_POST["ora"];
	 $gelato=$_POST["gelato"];
	 $gusto1=$_POST["gusto1"];
	 $gusto2=$_POST["gusto2"];
	 $panna=$_POST["panna"];
	 $quantita=$_POST["quantita"];
	 $kgopezzi=$_POST["kgopezzi"];

     // Controllo che l'utente abbia compilato tutti i campi necessari per completare l'ordine

	 if (($nome=="") OR ($cognome=="") OR ($citta=="") OR ($indirizzo=="") OR ($cap=="") OR ($email=="") OR ($telefono=="") OR ($data=="") OR ($ora=="") OR ($gelato=="") OR ($gusto1=="") OR ($panna=="") OR ($quantita=="") OR ($kgopezzi==""))
		 {
	  	  echo"Campi mancanti<br><br>";
	  	  echo'<a href="formgelato.php"> Torna indietro </a>';
	 	} //Chiusura primo controllo su eventuali campi vuoti

// CONTROLLO CHIUSO
	 else {
	 	   //Controllo in merito all'eventuale scelta di un gelato che NON sia una coppetta
	 	   if ($gelato=='cono' || $gelato=='brioche')
	 	   		{
	 	   		//Controlliamo adesso che il numero di telefono inserito sia composto almeno da 9 caratteri e da non più di 10. Eviteremo di inserire nel database numeri errati, immessi dall'utente per distrazione o altro
		 		$lunghezzanumero = strlen($telefono);
				if ($lunghezzanumero <9) {
					echo"Numero incorretto<br>";
					echo'<a href="formgelato.php"> Torna indietro </a>';
					}
					// CONTROLLO CHIUSO
				elseif ($lunghezzanumero>10) {
				echo"Numero incorretto<br>";
				echo'<a href="formgelato.php"> Torna indietro </a>';
				}
				// CONTROLLO CHIUSO
				else {
	 	    		  //A questo punto creo la connessione al mysql. L'istruzione restituirà un valore di tipo "vero o falso"
	 	    		  include('conn.php');
	 	    		  //Inserisco un controllo per verificare che la connessione al mysql sia avvenuta con successo
	 	    	 	  if (!$connessione) {
	 					   	    echo"Connessione a MySQL fallita";
	 						  }
	 						  // CONTROLLO CHIUSO
	 						  else {
	 						  	    echo"Sei connesso a MySQL";
	 						  	    echo"<br><br><br>";
		 //Adesso mi collego al database tramite PDO, funzione che richiede tre parametri: stringa di connessione fatta prima, user e password (nel nostro caso solo due parametri dato che non abbiamo inserito alcuna password)
		                include('conn.php');
		 //Sono necessari dei controlli riguardanti il gusto del gelato (singolo o doppio) e la quantità. Il primo è riferito ai gusti
								    if ($gusto2=="nessuno") {
										$gusto = $gusto1;
										}
										// CONTROLLO CHIUSO
									else {
										$gusto = $gusto1  .' ' .'piu' .' ' .$gusto2;
										}
										// CONTROLLO CHIUSO
		 //Con il seguente controllo operiamo sulla quantità di gelato da inserire nella tabella degli ordini, sia essa espressa in Kg o in numero di pezzi
		 							if ($kgopezzi=="Kg") {
										$somma = $quantita .' ' .'Kg';
										}
										// CONTROLLO CHIUSO
									else {
		  								$somma = $quantita .' ' .'pezzi';
										}
										// CONTROLLO CHIUSO
		 //A connessione riuscita si passa all'inserimento dei valori nella tabella specificata
								    $inserimento=$connessione->exec("INSERT INTO ordine (idordine,nome,cognome,citta,indirizzo,cap,email,telefono,data,ora,gelato,gusto,panna,quantita)
									  								    VALUES('null','$nome','$cognome','$citta','$indirizzo','$cap','$email','$telefono','$data','$ora','$gelato','$gusto','$panna','$somma')");
								    echo"Ordine inserito correttamente";
								  } //Chiusura else interno per inserimento database
					}
		} //Chiusura else controllo numero telefono
	else { // SI RIPETE L'INSERIMENTO PER IL CASO SPECIFICO DELLA COPPETTA
	       // SI INSERIRANNO CONTROLLI AL FINE DI CAPIRE QUALE DIMENSIONE E' DESIDERATA DAL CLIENTE
		  {
	 	   		//Controlliamo adesso che il numero di telefono inserito sia composto almeno da 9 caratteri e da non più di 10. Eviteremo di inserire nel database numeri errati, immessi dall'utente per distrazione o altro
		 		$lunghezzanumero = strlen($telefono);
				if ($lunghezzanumero <9) {
					echo"Numero incorretto<br>";
					echo'<a href="formgelato.php"> Torna indietro </a>';
					}
					// CONTROLLO CHIUSO
				elseif ($lunghezzanumero>10) {
				echo"Numero incorretto<br>";
				echo'<a href="formgelato.php"> Torna indietro </a>';
				}
				// CONTROLLO CHIUSO
				else {
	 	    		  //A questo punto creo la connessione al mysql. L'istruzione restituirà un valore di tipo "vero o falso"
							include('conn.php');
	 	    		  //Inserisco un controllo per verificare che la connessione al mysql sia avvenuta con successo
	 	    	 	  if (!$connessione) {
	 					   	    echo"Connessione a MySQL fallita";
	 						  }
	 						  // CONTROLLO CHIUSO
	 						  else {
	 						  	    echo"Sei connesso a MySQL";
	 						  	    echo"<br><br><br>";
	 	 //A questo punto possiamo leggere dal form il checkbox grandezza inerente la coppetta
	 						  	    $grandezza=$_POST["grandezza"];
	 								if ($grandezza=="piccola")
	 								{
	 								 $coppetta = $gelato .' ' .'piccola';
	 								}
	 								elseif ($grandezza=="media")
	 								{
	 								 $coppetta = $gelato .' ' .'media';
	 								}
	 								else
	 								{
	 								 $coppetta = $gelato .' ' .'grande';
	 								}

		 //Adesso mi collego al database tramite PDO, funzione che richiede tre parametri: stringa di connessione fatta prima, user e password (nel nostro caso solo due parametri dato che non abbiamo inserito alcuna password)
		                include('conn.php');
		 //Sono necessari dei controlli riguardanti il gusto del gelato (singolo o doppio) e la quantità. Il primo è riferito ai gusti
								    if ($gusto2=="nessuno") {
										$gusto = $gusto1;
										}
										// CONTROLLO CHIUSO
									else {
										$gusto = $gusto1  .' ' .'piu' .' ' .$gusto2;
										}
										// CONTROLLO CHIUSO
		 //Con il seguente controllo operiamo sulla quantità di gelato da inserire nella tabella degli ordini, sia essa espressa in Kg o in numero di pezzi
		 							if ($kgopezzi=="Kg") {
										$somma = $quantita .' ' .'Kg';
										}
										// CONTROLLO CHIUSO
									else {
		  								$somma = $quantita .' ' .'pezzi';
										}
										// CONTROLLO CHIUSO
		 //A connessione riuscita si passa all'inserimento dei valori nella tabella specificata
								    $inserimento=$connessione->exec("INSERT INTO ordine (idordine,nome,cognome,citta,indirizzo,cap,email,telefono,data,ora,gelato,gusto,panna,quantita)
									  								    VALUES('null','$nome','$cognome','$citta','$indirizzo','$cap','$email','$telefono','$data','$ora','$coppetta','$gusto','$panna','$somma')");
								    echo"Ordine inserito correttamente";
								  } //Chiusura else interno per inserimento database
					}
		} //Chiusura else controllo tipo gelato: coppetta
	  }//Chiusura else controllo numero telefono
	}//Chiusura else globale (dal controllo dei campi in poi)
	?>
