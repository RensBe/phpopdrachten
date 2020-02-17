<!--
* User: Rens Bedijn
* Date: 5-2-2020
* Time: 13:43 PM
* File: index.php
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../../css/index.css" rel="stylesheet" type="text/css">
    <title>
        opdr 3.1
    </title>
</head>
<body>
<header>
    <h1><?php echo "Uitwerkingen van PHP-opdrachten"; ?></h1>
</header>
<aside>
    <h2>
        Menu
    </h2>
    <ul>
        <li>Hoofdstuk 2
            <ul>
                <li>
                    <a href="hoofdstuk2/opdracht 2.1/opdracht_2-1.php">Opdracht 2.1</a>
                </li>
                <li>
                    <a href="hoofdstuk2/opdracht_2-2.php">Opdracht 2.2</a>
                </li>
            </ul>
        </li>
        <li>Hoofdstuk 3
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </li>
        <li>Hoofdstuk 4
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </li>
        <li>Hoofdstuk 5
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </li>
    </ul>
</aside>
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