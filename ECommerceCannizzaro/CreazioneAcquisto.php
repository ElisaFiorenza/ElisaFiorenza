<!DOCTYPE html>
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
        h1 {
            color: rgb(54, 107, 193);
            font-size: 50px;
        }
        h2 {
            color: rgb(58, 119, 159);
            font-size: 40px;
        }
        p {
            color: rgb(129, 30, 26);
            font-size: 35px;
        }
        strong {
            color: rgb(202, 68, 68);
            font-size: 30px;
        }
        .container {
            padding: 20px;
        }
        label {
            font-size: 20px;
            color: rgb(58, 119, 159);
            margin-right: 10px;
        }
        select {
            padding: 8px;
            margin: 10px 0;
            width: 300px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
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

    <h1>Acquista Prodotto</h1>

    <div class="container">
        <form action="InserimentoAcquisto.php" method="post">
            <p>Scegli l'utente nell'elenco</p>
            <select name="utente">
                <?php
                // Connessione al database
                $host_name="localhost";
                $username="root";
                $password="";
                $db_name="ECannizzaro";
                $con = mysqli_connect($host_name, $username, $password, $db_name);
                if (mysqli_connect_errno()) {
                    echo "Impossibile connettersi a MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Selezione dell’elenco degli utenti
                $query_sql = "SELECT DISTINCT nome, cognome FROM Utenti ORDER BY id";
                $result = mysqli_query($con, $query_sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option>" . $row['nome'] . " " . $row['cognome'] . "</option>";
                }
                ?>
            </select>
            <p>Scegli il prodotto desiderato nell'elenco</p>
            <select name="prodotto">
                <?php
                // Selezione elenco dei prodotti
                $query_sql = "SELECT DISTINCT modello, marca, prezzo FROM Prodotti ORDER BY id";
                $result = mysqli_query($con, $query_sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option>" . $row['modello'] . " - " . $row['marca'] . " - €" . $row['prezzo'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="invio" value="Acquista" />
        </form>
    </div>

</body>
</html>
