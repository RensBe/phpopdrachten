<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <?php
            $day = date("l");
            switch($day)
            {
                case "Monday":
                    echo "It's Monday";
                    break;
                case "Tuesday":
                    echo "it's Teusday";
                    break;
                case "Wednesday":
                    echo "it's Wednesday";
                    break;
                case "Thursday":
                    echo "it's Thursday";
                    break;
                case "Friday":
                    echo "it's Friday";
                    break;
                case "Saturday":
                    echo "it's Saturday";
                    break;
                case "Sunday":
                    echo "it's Sunday";
                    break;
                default:
                    echo "How did you manage to do this?";
                    break;
            }
        ?>
    </main>
<?php
include "../../includes/footer.php";
?>