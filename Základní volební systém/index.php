<?php

session_start();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volební systém</title>



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://example.com/your-image.jpg'); 
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        header {
            background-color: rgba(0, 115, 230, 0.8); 
            color: white;
            padding: 1rem 0;
            text-align: center;
        }
        nav {
            background-color: rgba(0, 91, 181, 0.8); 
            padding: 0.5rem;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 1rem;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            text-align: center;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.6); 
            border-radius: 10px;
        }
        .container h1 {
            color: #fff;
        }
        .container p {
            font-size: 1.2rem;
            color: #ddd;
        }
        footer {
            background-color: rgba(0, 115, 230, 0.8); 
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Vítejte ve volebním systému</h1>
</header>

<nav>
    <ul>
        <li><a href="../Regi/Registrace.php">Registrace</a></li>
        <li><a href="../prihlas.php">Přihlášení</a></li>
        <li><a href="../Akce/graf.php">Výsledky</a></li>
    </ul>
</nav>
<br>
<div class="container">
    <h1>Vítejte!</h1>
    <p>Tento systém vám umožní registrovat se, hlasovat a sledovat výsledky studentských voleb.</p>
</div>

<footer>
    <p>&copy; 2025 Volební systém. Všechna práva vyhrazena...Ha ha bro</p>
</footer>

</body>
</html>
