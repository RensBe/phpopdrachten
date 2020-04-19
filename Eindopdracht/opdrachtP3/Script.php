<?php
//array aanmaken
$keys = array("Rens" => "RensBe", "Johannus" => "Wachtwoord", "Karel" => "I don't know", "Peter" => "w8word", "dingus" => "pingus", "zes" => "zes", "zeven" => "zeven", "acht" => "acht", "negen" => "negen", "tien" => "tien");
//values van de post in variabelen opslaan
$password = $_POST["password"];
$username = $_POST["username"];
//foreach statement waarin de correcte namen en wachtwoorden in variabelen worden opgeslagen.
foreach($keys as $name => $key)
{
    //als beide gegevens overeenkomen wordt de login niet meer zichtbaar en worden de gegevens bekend.
    if($name == $username && $key == $password)
    {
        $showlogin = false;
    }
    else
    {
//        bepaald wat de errormessage wordt op basis van hoeveel is ingevuld en of het goed/fout is.
        if(empty($_POST['username']) && empty($_POST["password"]))
        {
            $message = "U bent vergeten beide velden in te vullen";
        }
        else if(empty($_POST['username']))
        {
            $message = "U bent vergeten uw username in te vullen";
        }
        else if(empty($_POST["password"]))
        {
            $message = "U bent vergeten uw password in te vullen";
        }
        else
        {
            $message = "Foutieve username en / of wachtwoord";
        }
    }
}
?>