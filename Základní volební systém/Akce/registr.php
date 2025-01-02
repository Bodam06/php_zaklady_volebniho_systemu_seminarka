<?php
include('pripojeni.php');

$Jmeno = mysqli_real_escape_string($connect, $_POST['Jmeno']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$Heslo = mysqli_real_escape_string($connect, $_POST['Heslo']);
$Overeni_hesla = $_POST['Overeni_hesla'];
$stb = mysqli_real_escape_string($connect, $_POST['stb']);

if (isset($_FILES['Fotografie'])) {
    $Fotografie = $_FILES['Fotografie']['name'];
    $tmp_name = $_FILES['Fotografie']['tmp_name'];
} else {
    $Fotografie = '';
    $tmp_name = '';
}


if ($Heslo != $Overeni_hesla) {
    echo '<script>alert("Hesla se neshoduji"); window.location.href = "../Regi/Registrace.php";</script>';
} else {
    
    $hashedPassword = password_hash($Heslo, PASSWORD_BCRYPT);

    
    if (move_uploaded_file($tmp_name, "../uploads/$Fotografie")) {
        $sql = "INSERT INTO `user_data`(`Jmeno`, `e-mail`, `Heslo`, `Fotografie`, `Standart`, `Status`, `Hlasy`) 
                VALUES ('$Jmeno','$email','$hashedPassword','$Fotografie','$stb',0,0)";

        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo '<script>alert("Uživatel byl zaregistrován!"); window.location = "../";</script>';
        } else {
            echo '<script>alert("Nepodařilo se zaregistrovat!"); window.location.href = "../Regi/Registrace.php";</script>';
        }
    } else {
        echo '<script>alert("Nepodařilo se nahrát fotografii!"); window.location.href = "../Regi/Registrace.php";</script>';
    }
}
?>
