<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
$message = "";
$showlogin = true;
// script.php wordt alleen geladen als er iets wordt verstuurt door het form.
if(isset($_POST['username']) || isset($_POST["password"])) {
    include "Script.php";
}
?>
    <main id="wrapper">
            <h2>Bergheen</h2>
            <?php
//            if else statement om ervoor te zorgen dat alleen een deel te zien is.
            if($showlogin == "true") {
            ?>
            <p>
                Login om onze adresgegevens + openingstijden te zien
            </p>
            <?php
//                de error message
                echo $message;
            ?>
<!--                form met daarin een table waar 2 input velden zijn voor de username en de password-->
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label title="username">username</label>
                        </td>
                        <td>
                            <input type="text" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label title="password">password</label>
                        </td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="login" name="login">
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        }
//            afsluiten van de if statement start else statement
        else
        {
        ?>
            <p>
                Welkom!
            </p>
<!--            table met 2 fieldsets om de gegevens te laten zien-->
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend>
                                Openingstijden
                            </legend>
                            <p>
                                Do: 22:00<br>
                                Vr: All Day<br>
                                Za: All Day<br>
                                Zo: 12:00
                            </p>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>
                                Adresgegevens
                            </legend>
                            <p>
                                Am Wriezener Bahnhof<br>
                                10243 Berlin<br>
                                Duitsland<br>
                                <br>
                            </p>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <p>
                Deze gegevens dien je ten alle tijden geheim te houden!
            </p>
<!--            afsluiten van de else statment-->
        <?php
        }
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>