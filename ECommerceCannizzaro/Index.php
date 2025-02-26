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
            <li><a href="CreazioneAcquisto.php">Acquista Prodotto</a></li>
            <li><a href="elenco_utenti.php">Elenco Utenti</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Benvenuto nel nostro e-commerce</h1>
        <p>Seleziona un'opzione dal menu sopra.</p>

        <?php
        // Definizione delle variabili
        $host_name="localhost";
        $username="root";
        $password="";
        $db_name="ECannizzaro";
        // Connessione al server e al database
        $con = mysqli_connect($host_name, $username, $password, $db_name);
        if (mysqli_connect_errno()) {
        echo "Impossibile connettersi a MySQL: " . mysqli_connect_error();
        exit();
    }
        
        // Query per il numero di acquisti
        $query = "SELECT COUNT(*) as totale FROM Acquisti";
        $result = mysqli_query($con, $query);
        foreach($result as $row){
        echo "<h2>Numero di Acquisti: " . $row['totale'] . "</h2>";
        }
        echo "<h2>Prodotti disponibili:</h2>";
        $query2 = "SELECT modello, marca, prezzo FROM Prodotti ORDER BY id";
        $result2 = mysqli_query($con, $query2);
        foreach($result2 as $row2){
            echo "<tr> <td>" . $row2['modello'] . " - </td>";
            echo "<td>" . $row2['marca'] . " - </td>";
            echo "<td>" . $row2['prezzo'] . "</td></tr><br><br>";
            }
        ?>
        </form>
    </div>
</body>
</html>
