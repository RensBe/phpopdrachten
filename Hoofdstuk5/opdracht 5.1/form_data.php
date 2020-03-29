<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
print_r($_GET);
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <table>
            <tr>
                <td>
                    Bedrijfsnaam:
                </td>
                <td>
                    <?php
                    echo $_GET["companyName"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Voornaam:
                </td>
                <td>
                    <?php
                    echo $_GET["firstName"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam:
                </td>
                <td>
                    <?php
                    echo $_GET["surName"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telefoon:
                </td>
                <td>
                    <?php
                    echo $_GET["telephoneNumber"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail:
                </td>
                <td>
                    <?php
                    echo $_GET["email"]
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Bericht:
                </td>
                <td>
                    <?php
                    echo $_GET["message"]
                    ?>
                </td>
            </tr>
        </table>
    </main>
<?php
include "../../includes/footer.php";
?>