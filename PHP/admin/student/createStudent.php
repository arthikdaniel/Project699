<?php


$arr = array(
    "studentId" => "ST99",
    "firstName" => "Soundarya",
    "lastName" => "Kanchari",
    "dob" => "1994-01-22",
    "rankScores" => array(
        array(
            "beltColor" => "White",
            "awardedDate" => "2018-02-22"
        )
    )
);

//https://stackoverflow.com/questions/8238502/convert-post-array-to-json-format
//$json_string1 = json_encode($_POST);

echo var_dump($arr);
$json_string1 = json_encode($arr);
echo var_dump($json_string);



$json_string = CallAPI("POST", "http://localhost:8080/students", $json_string1);
$json_result = json_decode($json_string, true);

?>


<pre id="json1"></pre>
<script>
    var MyJSNumVar = <?php Print($json_string); ?>;
    document.getElementById("json1").innerHTML = JSON.stringify(MyJSNumVar, undefined, 2);
</script>

