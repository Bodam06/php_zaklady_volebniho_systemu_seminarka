<?php

$connect = mysqli_connect("localhost", "root", "", "velebni_system1");
if ($connect) 
{
    echo "Pripojeno";
}
else
{
    die(mysqli_connect_error($connect));
    echo "Nepripojeno";
}
?>