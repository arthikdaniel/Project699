<?php
/*
Logic:

*/
?>


<?php
//Get All Rank Scores for the Student
$json_string = CallAPI("GET", "http://localhost:8080/students/" . $student_id, false);
$json_result = json_decode($json_string, true);
//print_r($json_string);

echo "<table border='1'>
<tr>
<th>Rank Information</th>
</tr>";
foreach ($json_result['rankScores'] as $score) {
    echo $score[completed];
    echo "<tr>";
    echo "<td>" . $score[beltColor] . "  ".$score[comments] ."</td>";
    echo "</tr>";
}
echo "</table>";

?>
