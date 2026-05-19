<?php

$students = [
    "Masum" => 100,
    "Rabbi" => 78,
    "Kalam" => 46,
    "Chowa" => 88,
    "Eva" => 75
];

echo "<table border='1' width=400 cellspacing=0>
<tr>
<th>Name</th>
<th>Score</th>
</tr>";

foreach($students as $name => $score){
    echo "<tr align=center>
    <td>$name</td>
    <td>$score</td>
    </tr>";
}

echo "</table>";

$maxScore = max($students);
$topStudent = array_search($maxScore, $students);

echo "<br>Top Student : $topStudent";
echo "<br>Highest Score : $maxScore";

?>