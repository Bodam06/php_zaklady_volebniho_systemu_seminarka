<?php
session_start();
include('pripojeni.php');


if (isset($_SESSION['Status']) && $_SESSION['Status'] == 1) {
    echo '<script>alert("Již jste hlasoval, nemůžete hlasovat znovu."); window.location.href = "../Regi/plocha.php";</script>';
    exit(); 
}

$hlasy = $_POST['počethlasů'];
$celkovehlasy = $hlasy + 1;

$gid = $_POST['ID_strany'];
$uid = $_SESSION['ID'];

$updatehlasy = mysqli_query($connect, "UPDATE `user_data` SET `Hlasy` = '$celkovehlasy' WHERE `ID` = '$gid'");

$updastatus = mysqli_query($connect, "UPDATE `user_data` SET `Status` = '1' WHERE `ID` = '$uid'");

if ($updatehlasy && $updastatus) {
    $getstranu = mysqli_query($connect, "SELECT `Jmeno`, `Fotografie`, `Hlasy`, `ID` FROM `user_data` WHERE `Standart` = 'Strana'");
    $Strany = mysqli_fetch_all($getstranu, MYSQLI_ASSOC);
    $_SESSION['Strana'] = $Strany;
    $_SESSION['Status'] = 1;

    echo '<script>alert("Uživatel byl odvolán!"); window.location = "../Regi/plocha.php";</script>';
} else {
    echo '<script>alert("Nepodařilo se odvolat."); window.location.href = "../Regi/plocha.php";</script>';
}
?>
