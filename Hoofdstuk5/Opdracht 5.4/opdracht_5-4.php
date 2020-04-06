<?php
//includes van de pagina
include "../../includes/header.php";
echo "<link href='Style.css' rel='stylesheet' type='text/css'>";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h3>Stoplicht</h3>
<!--        laad de gegevens op dezelfde pagina-->
        <form action="opdracht_5-4.php" method="post">
            <table>
                <tr>
                    <th>
                        Komt er een ambulance aan?
                    </th>
                    <td>
<!--                        radiobuttonlist voor de ambulance-->
                        <input type="radio" name="ambulance" value="ja">Ja
                        <input type="radio" name="ambulance" value="nee">Nee
                    </td>
                </tr>
                <tr>
                    <th>
                        stoplichtkleur?
                    </th>
                    <td>
<!--                        radiobuttonlist voor het stoplicht-->
                        <input type="radio" name="trafficLightColor" value="rood">Rood
                        <input type="radio" name="trafficLightColor" value="groen">Groen
                        <input type="radio" name="trafficLightColor" value="oranje">Oranje
                    </td>
                </tr>
                <tr>
                    <td>
<!--                        submit knop-->
                        <input type="submit" name="submit" value="verzend">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <br>
        <br>
        <?php
//        laat de gegevens zien
        include "functions.php";
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>