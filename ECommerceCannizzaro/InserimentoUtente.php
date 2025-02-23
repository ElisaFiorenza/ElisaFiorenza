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
            <li><a href="inserisci_prodotto.php">Inserisci Prodotto</a></li>
            <li><a href="acquista_prodotto.php">Acquista Prodotto</a></li>
            <li><a href="elenco_utenti.php">Elenco Utenti</a></li>
        </ul>
    </nav>

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
    // Acquisizione dei dati dal form HTML
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Inserimento dell'utente
    $sql = "INSERT INTO utenti (nome, cognome, email, password) ";
    $sql .= "VALUES ('$nome', '$cognome', '$email', '$password')";
    $result = mysqli_query($con,$sql);
    if ($result) {
    echo "Utente aggiunto correttamente" ;
    } else {
    echo "Errore nell'inserimento: " . mysqli_error($con);
    }
    ?>
    </body>
</html>