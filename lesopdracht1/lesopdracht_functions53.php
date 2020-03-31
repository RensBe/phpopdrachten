<?php
/*************
 * Maak hier een functie genaamd "getTeacherName" die als return de juiste docent naam mee geeft.
 **************/

function getTeacherName($subject){
    //Zorg dat je hier de juiste docentnaam met een return terug stuurt.
    if($subject == "php")
    {
        return "Evers";
    }
    else
    {
        return "Wetering";
    }
}
?>