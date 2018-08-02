<!--http://localhost:8080/api/demoes-->

<?php

require '../../vendor/autoload.php';
include '../includes/callRest.php';

echo "Test REST Calls<br>";
$base_url = "http://localhost:8080/api/";

$url = $base_url . 'courses';
echo 'POST URL: ' . $url . '<br>';

$data = array(
    "courseId" => "ID1",
    "courseName" => "New Name1"
);

echo 'Payload: <br>' . json_encode($data, JSON_PRETTY_PRINT) . '<br>';

try {
    //POST
    $res = postRequest($url, $data);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "<br><strong>Handle Error Flow:</strong>".$e;
}


//COMMON
$statusCode = $res->getStatusCode();
$body = $res->getBody();

if ($statusCode < 200 || $statusCode >=400) {
    echo "<br><strong>Handle Error Flow</strong>";
}else{
    echo $statusCode;
    echo "<br><strong>Handle Success Flow</strong>";
}



?>

<!---->
<?php
//
//
//
//try {
//
//    //Get
////    $res = getRequest($url, null);
//
//    //POST
//    $res = postRequest($url, $data);
//
//    //PUT
////    $res = putRequest($url . '/' . $data['demoId'], $data);
//
//    //DELETE
////    $res = deleteRequest($url . '/' . $data['demoId'], $data);
//
//
//} catch (\GuzzleHttp\Exception\GuzzleException $e) {
//    echo "<br><strong>Handle Error Flow:</strong>".$e;
//}
//
//
////COMMON
//$statusCode = $res->getStatusCode();
//$body = $res->getBody();
//
//if ($statusCode < 200 || $statusCode >=400) {
//    echo "<br><strong>Handle Error Flow</strong>";
//}else{
//    echo $statusCode;
//    echo "<br><strong>Handle Success Flow</strong>";
//}
//
//?>
