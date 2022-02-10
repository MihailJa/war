<?php
include './UnitInterface.php';
include './Battle.php';
include './Unit.php';
include './Army.php';


$army1 = new Army('Александр Ярославич');
$army1->addUnit(new Pehota(100, 10, 10), 200)->addUnit(new Luchniki(100, 5, 20), 30)->addUnit(new Konnica(300, 30, 30), 15);

$army2 = new Army('Ульф Фасе');
$army2->addUnit(new Pehota(100, 10, 10), 90)->addUnit(new Luchniki(100, 5, 20), 65)->addUnit(new Konnica(300, 30, 30), 25);

$units1 = $army1->getUnitsString();
$units2 = $army2->getUnitsString();
$battle = new Battle($army1, $army2);
$battle->addIce();
$result = $battle->fightSum();
//$result = $battle->fightEveryLine();
?>

<table border="1">
    <tr>
        <th></th>
        <th><?=$army1->getName()?></th>
        <th><?=$army2->getName()?></th>
    </tr>
    <tr>
        <th>Army units:</th>
        <td><?=$units1?></td>
        <td><?=$units2?></td>
    </tr>

    <tr>
        <th>Health after <?=$result['duration']?> hits:</th>
        <td><?=$result['health1']?></td>
        <td><?=$result['health2']?></td>
    </tr>
    <tr>
        <th>Result</th>
        <td><?=$result['health1'] > $result['health2'] ? 'WINNER' : 'LOOSER'?></td>
        <td><?=$result['health2'] > $result['health1'] ? 'WINNER' : 'LOOSER'?></td>
    </tr>
</table>
