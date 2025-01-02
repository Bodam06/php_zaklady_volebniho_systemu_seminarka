<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminární práce - volební systém</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<?php
session_start();
include('pripojeni.php'); 


$Jmeno = mysqli_real_escape_string($connect, $_POST['Jmeno']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$Heslo = $_POST['Heslo']; 
$stb = mysqli_real_escape_string($connect, $_POST['stb']);


$sql = "SELECT * FROM `user_data` WHERE `Jmeno` = '$Jmeno' AND `e-mail` = '$email' AND `Standart` = '$stb'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

 
    if (password_verify($Heslo, $data['Heslo'])) {

        $_SESSION['ID'] = $data['ID'];
        $_SESSION['Status'] = $data['Status'];
        $_SESSION['data'] = $data;

      
        $sql = "SELECT `Jmeno`, `Fotografie`, `Hlasy`, `ID` FROM `user_data` WHERE `Standart` = 'Strana'";
        $resultStrana = mysqli_query($connect, $sql);
        if (mysqli_num_rows($resultStrana) > 0) {
            $Strana = mysqli_fetch_all($resultStrana, MYSQLI_ASSOC);
            $_SESSION['Strana'] = $Strana;
        }

       
        echo '<script>window.location = "../regi/plocha.php";</script>';
    } else {
        
        echo '<script>alert("Nesprávné heslo"); window.location.href = "../";</script>';
    }
} else {
   
    echo '<script>alert("Uživatel neexistuje"); window.location.href = "../";</script>';
}
?>

</body>
