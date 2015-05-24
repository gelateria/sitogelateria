-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mag 24, 2015 alle 14:07
-- Versione del server: 5.6.24
-- Versione PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sitogelateria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `idgelato` int(11) NOT NULL,
  `nome` char(25) NOT NULL,
  `ingrediente` varchar(600) NOT NULL,
  `descrizione` varchar(600) NOT NULL,
  `dati_foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `certificazione`
--

CREATE TABLE IF NOT EXISTS `certificazione` (
  `id_certificazione` int(11) NOT NULL,
  `nome_certificazione` varchar(50) NOT NULL,
  `data_certificazione` date NOT NULL,
  `descrizione_certificazione` text,
  `logo_certificazione` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `certificazione`
--

INSERT INTO `certificazione` (`id_certificazione`, `nome_certificazione`, `data_certificazione`, `descrizione_certificazione`, `logo_certificazione`) VALUES
(1, 'Certificazione ISO 9001', '2015-07-01', 'Certificazione ISO 9001', ''),
(2, 'Miglior Gelato 2015 ITALIA', '2015-05-12', 'Miglior Gelato 2015 ITALIA', ''),
(3, 'Gelato Biologico ITALIA', '2015-05-04', 'Gelato Biologico ITALIA', ''),
(4, 'MAXI CUP EUROPE', '2015-05-10', 'MAXI CUP EUROPE', ''),
(5, 'Fiera Del Gelato di Carrapipi', '1492-03-08', 'Fiera Del Gelato di Carrapipi', ''),
(9, 'Real Sicilian IceCream', '2015-05-29', 'Real Sicilian IceCream', ''),
(10, 'King IceCream', '2015-05-20', 'King IceCream', ''),
(11, '1 PREMIO PALLE DI GELATO', '2015-05-05', '1 PREMIO PALLE DI GELATO', 0x63657274342e6a7067),
(13, '2 PREMIO PANNA ACIDA', '2015-04-09', '2 PREMIO PANNA ACIDA', 0x63657274322e6a7067);

-- --------------------------------------------------------

--
-- Struttura della tabella `loginam`
--

CREATE TABLE IF NOT EXISTS `loginam` (
  `idam` int(11) NOT NULL,
  `username_am` varchar(20) NOT NULL,
  `password_am` varchar(30) NOT NULL,
  `partitaiva_am` char(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `loginam`
--

INSERT INTO `loginam` (`idam`, `username_am`, `password_am`, `partitaiva_am`) VALUES
(1, 'administrator', 'icecream', '04155690821');

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idnews` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `testo` text NOT NULL,
  `data_news` date NOT NULL,
  `immagine` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`idnews`, `titolo`, `testo`, `data_news`, `immagine`) VALUES
(2, 'Grande Inaugurazione Gelateria IceCream', 'Grande Apertura Ice Cream!! Gelati AGGRATIS !!             ', '2015-05-05', ''),
(3, 'Fiera elle Crepes Gelato a MONTECUPPINO', '', '0000-00-00', ''),
(5, 'ciao', 'Il sito ....                ', '2014-05-05', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE IF NOT EXISTS `ordine` (
  `idordine` int(11) NOT NULL,
  `nome` char(50) NOT NULL,
  `cognome` char(50) NOT NULL,
  `citta` char(50) NOT NULL,
  `indirizzo` char(150) NOT NULL,
  `cap` char(5) NOT NULL,
  `email` char(60) NOT NULL,
  `telefono` char(50) NOT NULL,
  `data` date NOT NULL,
  `ora` time(6) NOT NULL,
  `gelato` char(50) NOT NULL,
  `gusto` char(50) NOT NULL,
  `panna` char(10) NOT NULL,
  `quantita` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`idordine`, `nome`, `cognome`, `citta`, `indirizzo`, `cap`, `email`, `telefono`, `data`, `ora`, `gelato`, `gusto`, `panna`, `quantita`) VALUES
(1, 'Ignazio', 'asd', 'asd', 'asd', 'asd', 'asd@libero.it', 'asd', '2015-05-06', '00:00:00.000000', 'cono', 'amarena', 'si', '3'),
(2, 'alessandro', 'la rosa', 'palermo', 'via ammiraglio rizzo', '90100', 'ilpalermitano@libero.it', '333', '2015-05-25', '00:00:00.000000', 'vaschetta', 'nocciola', 'no', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `idutente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `datanascita` date NOT NULL,
  `citta` char(34) NOT NULL,
  `indirizzoresidenza` varchar(150) NOT NULL,
  `telefono` char(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomeazienda` varchar(50) DEFAULT NULL,
  `indirizzoazienda` varchar(150) DEFAULT NULL,
  `cittaazienda` varchar(34) DEFAULT NULL,
  `partitaiva` char(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`idutente`, `nome`, `cognome`, `datanascita`, `citta`, `indirizzoresidenza`, `telefono`, `email`, `nomeazienda`, `indirizzoazienda`, `cittaazienda`, `partitaiva`, `username`, `password`) VALUES
(26, 'sdf', 'dsf', '2015-05-05', 'sad', 'sad', 'sad', 'sad@gmail.com', 'sad', 'sad', 'asd', 'sad', 'asd', 'asd'),
(27, 'as', 'as', '2015-05-19', 'as', '', '', 'as', '', '', '', '', 'as', 'as'),
(28, 'alessandro', 'la rosa', '1981-04-07', 'palermo', 'via ammiraglio rizzo', '333', 'ilpalermitano@libero.it', 'ajeje', 'via ammiraglio', 'palermo', '025225424', 'ajeje', 'ajeje');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`idgelato`);

--
-- Indici per le tabelle `certificazione`
--
ALTER TABLE `certificazione`
  ADD PRIMARY KEY (`id_certificazione`);

--
-- Indici per le tabelle `loginam`
--
ALTER TABLE `loginam`
  ADD PRIMARY KEY (`idam`);

--
-- Indici per le tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`idordine`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`idutente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `idgelato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `certificazione`
--
ALTER TABLE `certificazione`
  MODIFY `id_certificazione` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT per la tabella `loginam`
--
ALTER TABLE `loginam`
  MODIFY `idam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `idordine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
