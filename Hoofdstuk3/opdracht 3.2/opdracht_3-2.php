<!--
* User: Rens Bedijn
* Date: 5-2-2020
* Time: 13:43 PM
* File: index.php
-->

<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
<main id="wrapper">
    <h2>Uitwerkingen</h2>
    <?php
    $trafficlight = "groen";
    $ambulanceComing = false;
    $driveOn = true;

    if($trafficlight == "groen" && $ambulanceComing == false)
    {
        $driveOn = true;
        echo "<p>U mag doorrijden</p>";
    }
    else
    {
        $driveOn = false;
        echo "<p>U moet stoppen</p>";
    }

    $countryName = "";
    $currentAge = 18;
    //begin if statement, checkt of het lang België is
    if ($countryName == "België")
    {
        //if in if statement, checkt leeftijd
        if ($currentAge >= 18)
        {
            echo "Je mag alle drank drinken";
        }
        elseif ($currentAge >= 16)
        {
            echo "Je mag alleen zwakke drank drinken";
        }
        else
        {
            echo "Je mag niets drinken";
        }
    }
    //checkt of het land Bulgarije of Nederland is
    elseif ($countryName == "Bulgarije" || $countryName == "Nederland")
    {
        //checkt leeftijd
        if ($currentAge >= 18)
        {
            echo "Je mag alle drank drinken";
        }
        else
        {
            echo "Je mag niets drinken";
        }
    }
    //checkt of het land Cyprus is
    elseif ($countryName == "Cyprus")
    {
        //checkt leeftijd
        if ($currentAge >= 17)
        {
            echo "Je mag alle drank drinken";
        }
        else
        {
            echo "Je mag niets drinken";
        }
    }
    //checkt of het lang Zweden is
    elseif ($countryName == "Zweden")
    {
        //checkt leeftijd
        if ($currentAge >= 20)
        {
            echo "Je mag alle drank drinken";
        }
        elseif ($currentAge >= 18)
        {
            echo "Je mag alleen zwakke drank drinken";
        }
        else
        {
            echo "Je mag niets drinken";
        }
    }
    //als er iets mis is met de benaming van het land wordt het gegooid in de else.
    else
    {
        echo "We weten niet in welk lang jij woont";
    }
    ?>
</main>
</body>
</html>