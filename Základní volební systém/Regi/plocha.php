<?php

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: ../");
    exit();
}
$data = isset($_SESSION['data']) ? $_SESSION['data'] : null;
if (isset($_SESSION['Status']) && $_SESSION['Status'] == 1) {
    $Status = '<b class="text-success">Odvoleno</b>';
} else {
    $Status = '<b class="text-danger">Neodvoleno</b>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminární práce - plocha</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary text-light">
    <div class="container my-5">
        <a href="../"><button class="btn btn-dark text-light px-3">Zpátky</button></a>
        <a href="logout.php"><button class="btn btn-dark text-light px-3">Odhlásit se</button></a>
        <a href="../Akce/graf.php"><button class="btn btn-dark text-light px-3">Výsledky</button></a>
        <h1 class="my-3">Volební systém</h1>   
        <div class="row my-5">
            <div class="col-md-7">
                <?php
                if (isset($_SESSION['Strana']) && is_array($_SESSION['Strana']) && count($_SESSION['Strana']) > 0) {
                    $Strany = $_SESSION['Strana'];
                    for ($i = 0; $i < count($Strany); $i++) {
                ?>
                        <div class="row">
                            <div class="col-md-4">
                               <img src="../uploads/<?php echo htmlspecialchars($Strany[$i]['Fotografie']); ?>" alt="Fotografie strany <?php echo htmlspecialchars($Strany[$i]['Jmeno']); ?>"> 
                            </div>
                
                            <div class="col-md-8">
                                <strong class="text-light h5">Název strany: </strong> 
                                <?php echo htmlspecialchars($Strany[$i]['Jmeno']); ?>
                                <br>
                                <strong class="text-light h5">Počet hlasů: </strong> 
                                <?php echo htmlspecialchars($Strany[$i]['Hlasy']); ?><br>
                            </div>
                         </div>
                         
                         <form action="../Akce/odvolani.php" method="POST">
                            <input type="hidden" name="počethlasů" value="<?php echo htmlspecialchars($Strany[$i]['Hlasy']); ?>">
                            <input type="hidden" name="ID_strany" value="<?php echo htmlspecialchars($Strany[$i]['ID']); ?>">

                            <?php
                            if (isset($_SESSION['Status']) && $_SESSION['Status'] == 1) {
                            ?>
                                <button type="submit" class="bg-success my-3 text-white px-3">Odvolat</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" class="bg-danger my-3 text-white px-3">Zvolit tuto stranu</button>
                            <?php
                            }
                            ?>
                         </form>
                         <hr>
                <?php
                    }
                } else {
                ?> 
                    <div class="container">
                        <p>V systému nejsou žádné strany</p>
                    </div>
                <?php 
                }
                ?>
            </div>
            
            <div class="col-md-5">
               <!-- Profil voliče --> 
                <?php if ($data): ?>
                    <img src="../uploads/<?php echo htmlspecialchars($data['Fotografie']); ?>" alt="Volič obrazek">
                    <br><br>
                    <strong class="text-light h5">Jméno: </strong><?php echo htmlspecialchars($data['Jmeno']); ?><br><br>
                    <strong class="text-light h5">e-mail: </strong><?php echo htmlspecialchars($data['e-mail']); ?><br><br>
                    <strong class="text-light h5">Status: </strong><?php echo $Status; ?><br><br>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
