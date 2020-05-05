<?php
//includes van de pagina
include "../../includes/header.php";
include "../../includes/menu.php";
$scorePlayer = 0;
$scoreComputer = 0;
session_start();
if (isset($_SESSION["user1"]))
{
    $scoreComputer += $_SESSION["user2"];
    $scorePlayer += $_SESSION["user1"];
}
?>
    <main id="wrapper">
        <h2>Uitwerkingen</h2>
        <p>
            maak je keuze
        </p>
        <form id="gameFrm" method="get" action="opdracht_6-2.php">
            <div class="float"><input type="radio"
                                      onchange="document.getElementById('gameFrm').submit();" name="keuze"
                                      value="steen">steen</div>
            <div class="float"><input type="radio"
                                      onchange="document.getElementById('gameFrm').submit();" name="keuze"
                                      value="papier">papier</div>
            <div class="float"><input type="radio"
                                      onchange="document.getElementById('gameFrm').submit();" name="keuze"
                                      value="schaar">schaar</div>
        <br>
        <br>
        <br>
        <?php
            if (isset($_GET['keuze'])) {
                echo "Jij koos: ".$_GET['keuze']."<br>";
                $keuzecomputer = rand(0,2);
                switch ($keuzecomputer){
                    case 0:
                        echo "computer koos Steen <br>";
                        $computer = 'steen';
                        break;
                    case 1:
                        echo "computer koos Papier <br>";
                        $computer = 'papier';
                        break;
                    case 2:
                        echo "computer koos Schaar <br>";
                        $computer = 'schaar';
                        break;
                }
                if ($computer == $_GET["keuze"])
                {
                    echo "Gelijkspel <br>";
                    echo "Computer: ".$scoreComputer.". Speler: ".$scorePlayer;
                }
                else if($computer == 'steen' && $_GET['keuze'] == "papier" || $computer == "papier" && $_GET['keuze'] == "schaar" || $computer == "schaar" && $_GET['keuze'] == "steen")
                {
                    echo "Gewonnen! <br>";
                    $scorePlayer += 1;
                    echo "Computer: ".$scoreComputer.". Speler: ".$scorePlayer;
                }
                else
                {
                    echo "verloren... <br>";
                    $scoreComputer += 1;
                    echo "Computer: ".$scoreComputer.". Speler: ".$scorePlayer;
                }
            }
            session_start();
            $_SESSION['user1'] = $scorePlayer;
            $_SESSION['user2'] = $scoreComputer;
        ?>
        </form>
    </main>
<?php
include "../../includes/footer.php";
?>