<html>
<head>
    <title>E-commerce Cannizzaro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="CreazioneUtente.php">Registra Utente</a></li>
            <li><a href="CreaProdotto.php">Inserisci Prodotto</a></li>
            <li><a href="acquista_prodotto.php">Acquista Prodotto</a></li>
            <li><a href="elenco_utenti.php">Elenco Utenti</a></li>
        </ul>
    </nav>
<form action="InserimentoAcquisto.php" method="post">
<p>Scegli l'utente nell'elenco</p>
<select name="utente">
<p>Scegli il prodotto desiderato nell'elenco</p>
<select name="prodotto">
<?php
// Definizione delle variabili
$host_name="localhost";
$username="root";
$password="";
$db_name="utenze";
// Connessione al server e al database
$con = mysqli_connect($host_name, $username, $password, $db_name);
if (mysqli_connect_errno()) {
echo "Impossibile connettersi a MySQL: " . mysqli_connect_error();
exit();
}
// Selezione dell’elenco degli utenti
$query_sql = "SELECT DISTINCT nome, cognome FROM Utenti ORDER BY id";
$result = mysqli_query($con, $query_sql);
foreach($result as $row){
echo "<option>".$row['cognome']. $row['cognome'] "</option>";

// Selezione elenco dei prodotti
$query_sql = "SELECT DISTINCT modello, marca, prezzo FROM Prodotto ORDER BY id";
$result = mysqli_query($con, $query_sql);
foreach($result as $row){
echo "<option>".$row['modello']. $row['marca'] . $row['prezzo'] ."</option>";
}
?>
</select>
<input type="submit" name="invio" value="Cerca" />
</form>
</body>