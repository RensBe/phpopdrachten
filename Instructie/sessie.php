<?php
//het maken van een sessie
session_start();
$_SESSION["firstname"] = $_POST["firstname"];
$_SESSION["lastname"] = "Test";
$_SESSION["login"] = true;


// een sessie is altijd op elke pagina op te halen door middel van
session_start();
print_R($_SESSION);


// een sessie kan worden vernietigd met

session_destroy();