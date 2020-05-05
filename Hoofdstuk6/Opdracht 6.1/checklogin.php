<?php
$authUsers = Array(
    "Abu" => "bekend",
    "Nordin" => "onbekend",
    "BasZ" => "654321",
    "Rosalie" => "bloemblaadjes"
);

foreach($authUsers as $name => $password)
{
    if ($_POST['username'] == $name && $_POST['password'] == $password)
    {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header('location: welkom.php');
    }
}

if(!isset($_SESSION["username"]))
{
    $message = "Ongeldige username/wachtwoord
    {$_POST['username']}, probeer het nog eens.";
    include "opdracht_6-1.php";
}
?>