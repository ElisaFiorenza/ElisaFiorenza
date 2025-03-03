<html>
<head>
    <title>E-commerce Cannizzaro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(177, 209, 237);
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
        p {
            color: rgb(129, 30, 26);
            font-size: 35px;
        }
        label, input {
            font-size: 20px;
            color: rgb(58, 119, 159);
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cc0000;
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

    <p>Inserisci i dati dell'utente</p>
    <form action="inserimentoutente.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>Cognome:</label>
        <input type="text" name="cognome">
        <label>Email:</label>
        <input type="text" name="email">
        <label>Password:</label>
        <input type="text" name="password"><br><br>
        <input type="submit" value="Inserisci">
    </form>
</body>
</html>