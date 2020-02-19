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