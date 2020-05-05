<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <form action="checklogin.php" method="post">
            <?php
            echo $message;
            ?>
        <table>
            <tr>
                <td>
                    Username:
                </td>
                <td>
                    <input name="username" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input name="password" type="password">
                </td>
            </tr>
        </table>
            <input type="submit" value="versturen" name="send">
        </form>
    </main>
<?php
include "../../includes/footer.php";
?>