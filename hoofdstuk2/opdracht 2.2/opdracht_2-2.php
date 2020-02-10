<!--
* User: Rens Bedijn
* Date: 7-2-2020
* Time: 13:43 PM
* File: opdracht_2-2.php
-->
<?php
$text1 = "Hallo";
$text2 = "een makkelijke taal";
$text3 = "toch zo'n makkelijke taal";
$text4 = "wat is";
$text5 = "PHP";
$text6 = "Nooit gedacht dat";
$text7 = "De installatie is best ingewikkeld";
$text8 = "Fijn";
$text9 = "?";
$text10 = ".";
$text11 = ",";
$text12 = "<br>";
$text13 = "is";
$text14 = "Vind je niet";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h2>
            Taak 2
        </h2>
        <p>
            <?php
                echo $text1.$text11." ".$text4." ".$text5." ".substr($text3,0,4)." ".$text2.$text10.$text12;
                echo $text7.$text10." ".$text8." ".substr($text3,0,4).$text9.$text12;
                echo $text6." ".$text5." ".$text3." ".$text13.$text10;
            ?>
        </p>
        <h2>
            Taak 3
        </h2>
        <p>
            <?php
                echo $text1.", ".$text3." ".$text4.", ondanks ".$text6." ".$text2.$text8
            ?>
        </p>
        <p>
            <?php
                echo $text7." ".$text5." ".$text4." eigenlijk ".$text2." blijkt te zijn!"
            ?>
        </p>
    </body>
</html>