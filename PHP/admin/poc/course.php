<?php
/**
 * Created by IntelliJ IDEA.
 * User: arthik.daniel
 * Date: 17/07/18
 * Time: 11:30 AM
 */

//Get Course Names
$json_string = CallAPI("GET", "http://localhost:8080/courses/", false);
//print_r($json_string);
$json_result = json_decode($json_string, true);
//print_r($json_result);
//echo $json_result;
//
//echo "\nHello World";
//echo $json_string;

//Displays Course Name : Java
//echo $json_result['_embedded']['courses'][0]['courseName'];
echo "<table border='1'>
<tr><x></x>
<th>Course Name</th>
</tr>";
foreach ($json_result['_embedded']['courses'] as $course) {
    echo $course[courseName];
    echo "<tr>";
    echo "<td>" . $course[courseName] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo $json_result['_embedded']['courses'][0]['_links'];

?>