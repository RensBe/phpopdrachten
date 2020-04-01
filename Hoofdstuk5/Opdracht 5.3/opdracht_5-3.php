<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
<!--        form met table voor de uitlijning-->
        <form action="form_data_5-3.php" method="post">
            <table>
                <tr>
                    <td>
<!--                        steeds een label toegevoegd-->
                        <label>Wat is je naam:</label>
                    </td>
                    <td>
<!--                        steeds een input met het juiste datatype-->
                        <input type="text" name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Wat is je leeftijd:</label>
                    </td>
                    <td>
                        <input type="number" name="age">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Gemeente:</label>
                    </td>
                    <td>
                        <input type="text" name="gemeente">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Aantal inwoners in gemeente:</label>
                    </td>
                    <td>
                        <input type="number" name="citizens">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
<!--                        radio button lijst-->
                        Ken je mensen die besmet zijn in je woonplaats?<input type="radio" name="knowInfected" value="Ja">Ja<input type="radio" name="knowInfected" value="Nee">Nee
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Aantal mensen besmet in je gemeente? * <input type="number" name="infected">
                    </td>
                </tr>
            </table>
<!--            submit knop-->
            <input type="submit" value="verzend">
            <p>
                * Zie aantallen per gemeente per 100.000 bewoners <a href="https://www.rivm.nl/">site RIVM</a>
            </p>
        </form>
    </main>
<?php
include "../../includes/footer.php";
?>