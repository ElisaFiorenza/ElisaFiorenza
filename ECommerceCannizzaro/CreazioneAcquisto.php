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
        <p>Accesso:</p>
        <p>Email:</p>
        <input type="text" name="email">
        <label>Password:</label>
        <input type="text" name="password"><br><br>
        <p>Inserisci i dati del prodotto desiderato:</p>
        <label>Modello:</label>
        <input type="text" name="modello">
        <label>Marca:</label>
        <input type="text" name="marca">
        </form>
    </body>
</html>