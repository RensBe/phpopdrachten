<?php

// eerste while loop telt af van 19
$task2 = "Lancering in: ";
$countdown = "";
$count = 20;
while ($count != 0):
    {
        $count -= 1;
        if($count != 0) {
            $countdown = $countdown . $count . ", ";
        }
        else
        {
            $countdown = $countdown.$count;
        }
    }
$task2 = $task2.$countdown;


//eerste for loop, doet hetzelfde als de vorige
$forCountDown = "";
$task3 = "Lancering in: ";
for($teller = 19; $teller != -1; $teller -= 1)
{
    if($teller != 0) {
        $forCountDown = $forCountDown . $teller . ", ";
    }
    else
    {
        $forCountDown = $forCountDown.$teller;
    }
}

//tweede while loop en telt op in iteraties
$task3 = $task3.$forCountDown;

$counter = 1;
$task4 = "";
while($counter != 7)
{
    $task4 = $task4."<h".$counter.">Dit is de ".$counter."e iteratie</h".$counter.">";
    $counter ++;
}


//tweede for loop, doet hetzelfde
$task5 = "<table><tr>";
for($tel = 1; $tel != 11; $tel ++)
{
    $task5 = $task5."<td>Dit is de ".$tel."e iteratie</td>";
}
$task5 = $task5."</tr></table>";

//derde while loop en telt af met jaren
$task6 = "";
$leeftijd = 19;
while($leeftijd != -1)
{
    $jaar = $leeftijd + 2001;
    if ($leeftijd == 19)
    {
        $task6 = $task6."<p>In ".$jaar." ben ik ".$leeftijd." jaar oud</p>";
    }
    else if ($leeftijd != 0)
    {
        $task6 = $task6."<p>In ".$jaar." was ik ".$leeftijd." jaar oud</p>";
    }
    else
    {
        $task6 = $task6."<p>In ".$jaar." ben ik geboren</p>";
    }
    $leeftijd = $leeftijd - 1;
}
endwhile;

//derde for loop doet hetzelfde als de vorige maar dan met extra situaties.
$task7 = "";
for ($age = 19; $age != -1; $age--)
{
    $year = $age + 2001;
    if ($age == 0)
    {
        $task7 = $task7."<p>in ".$year." ben ik geboren en was ik een baby</p> ";
    }
    else if($age == 2)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een peuter.";
    }
    else if($age == 4)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een kleuter.";
    }
    else if($age == 8)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een tiener.";
    }
    else if($age == 12)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een puber.";
    }
    else if($age == 18)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een adolescent.";
    }
    else if($age == 20)
    {
        $task7 = $task7."<p>in ".$year." was ik ".$age." jaar oud en werd ik een volwassen.";
    }
    else
    {
        $task7 = $task7."<p>In ".$year." was ik ".$age." jaar oud</p>";
    }
}