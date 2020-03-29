<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
print_r($_GET);
?>
    <main id="wrapper">
        <h2>Uitshcrijfformulie KW1C</h2>
        <table>
            <tr>
                <td>
                    Voor en achternaam
                </td>
                <td>
<!--                    doet steeds hetzelfde haalt de waardes op en plaatst ze in de html-->
                    <?php
                        echo $_GET["firstSurName"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Studentennummer
                </td>
                <td>
                    <?php
                        echo $_GET["studentNumber"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Datum van uitschrijving
                </td>
                <td>
                    <?php
                        echo $_GET["dateDeregistration"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Reden van uitschrijving
                </td>
                <td>
                    <?php
                        echo $_GET["reasonDeregistration"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Leerjaar
                </td>
                <td>
                    <?php
                        echo $_GET["year"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Aanmelden bij de succesklas
                </td>
                <td>
<!--                    kijkt of het boxje is gechecked (het heeft de value "Ja")-->
                    <?php
                        if($_GET["succesklas"] == "Ja")
                        {
//                            als het waar is dan echot hij de value ("Ja")
                            echo $_GET["succesklas"];
                        }
                        else
                        {
//                            anders echot hij nee
                            echo "Nee";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Verwijderen gegevens
                </td>
                <td>
<!--                    doet hetzelfde als de vorige maar dan voor delete-->
                    <?php
                    if($_GET["delete"] == "Ja")
                    {
                        echo $_GET["delete"];
                    }
                    else
                    {
                        echo "Nee";
                    }
                    ?>
                </td>
            </tr>
        </table>
        Reden van uitschrijving<br>
        <?php
        echo $_GET["reasonFull"]
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>