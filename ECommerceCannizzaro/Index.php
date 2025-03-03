<html>
<head>
    <title>E-commerce Cannizzaro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(177, 209, 237);
            color: #333;
            text-align: center;
        }
        nav {
            background-color: #ff4444;
            padding: 15px 0;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }
        h1 {
            color:rgb(54, 107, 193);
            font-size: 50px;
        }
        h2 {
            color:rgb(58, 119, 159);
            font-size: 40px;
        }
        p {
            color:rgb(129, 30, 26);
            font-size: 35px;
        }
        strong {
            color:rgb(202, 68, 68);
            font-size: 30px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="CreazioneUtente.php">Registra Utente</a></li>
            <li><a href="CreaProdotto.php">Inserisci Prodotto</a></li>
            <li><a href="CreazioneAcquisto.php">Acquista Prodotto</a></li>
            <li><a href="elenco_utenti.php">Elenco Utenti</a></li>
        </ul>
    </nav>

    <h1>Benvenuto nell'E-Commerce del Cannizzaro!</h1>
    <p>Seleziona un'opzione dal menu sopra.</p>

    <?php
    $host_name="localhost";
    $username="root";
    $password="";
    $db_name="ECannizzaro";
    $con = mysqli_connect($host_name, $username, $password, $db_name);
    if (mysqli_connect_errno()) {
        echo "Impossibile connettersi a MySQL: " . mysqli_connect_error();
        exit();
    }
    
    $query = "SELECT COUNT(*) as totale FROM Acquisti";
    $result = mysqli_query($con, $query);
    foreach($result as $row){
        echo "<h2>Numero di Acquisti: " . "</h2>" . "<strong>" . $row['totale'] . "</strong>";
    }
    echo "<h2>Prodotti disponibili:</h2>";
    $query2 = "SELECT modello, marca, prezzo FROM Prodotti ORDER BY id";
    $result2 = mysqli_query($con, $query2);
    foreach($result2 as $row2){
        echo "<p><strong>" . $row2['modello'] . " - " . $row2['marca'] . " - €" . $row2['prezzo'] . "</strong></p>";
    }
    ?>
</body>
</html>
