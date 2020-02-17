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
    $road = "Elfstedentocht";
    $roadFries = "Alvestêdetocht";
    $distance = 200;
    $kind = "schaatstocht";
    $ice = "natuurijs";
    $organiser = "Koningklijke vereniging De Friesche Elf Steden";
    $place = "Leeuwarden";
    $province = "Friesland";
    $timesRidden = 15;
    $firstTime = 1909;
    $maxInYear = 1;
    $verhaal = "De ".$road." (Fries: ".$roadFries.") is een ".$distance." kilometer lange ".$kind." over ".$ice." die wordt georganiseerd door de ".$organiser.". ".$place.", de hoofdstad van ".$province.", is start- en aankomstplaats. De ".$road." is inmiddels ".$timesRidden." maal verreden en werd voor het eerst in ".$firstTime." gereden en wordt maximaal ".$maxInYear." keer per winter gehouden.";
    echo "<p>".$verhaal."</p>";
?>
</main>
</body>
</html>