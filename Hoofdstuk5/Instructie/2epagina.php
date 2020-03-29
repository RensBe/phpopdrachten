<?php

//laad alle info die is meegnomen
print_r($_GET);

//als er post wordt gebruikt dan moeten de GET veranderd worden in POST
echo $_GET["firstname"];
echo $_GET["lastname"];

//post is iets veiliger omdat het info niet in de url laat zien.


if($_GET["subject"] == "php")
{
    echo "hello php";
}