<?php include "../includes/mainheader.php" ;


require '../../vendor/autoload.php';

?>


<?php

$calbackURL = $_POST['callBackURL'];
unset($_POST['callBackURL']);

$resourceName = $_POST['resourceName'];
unset($_POST['resourceName']);

$url = $base_url . $resourceName . "s/";
//$resource_url = $base_url . $resourceName . "s/" . $_POST[$resourceName . 'Id'];
//    unset($_POST[$resourceName.'id']);


foreach ($_POST as $key => $value) {
    $data[$key] = $value;
}


echo 'URL: ' . $url . '<br>';
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
    echo $body;
    echo "<br><strong>Handle Success Flow</strong>";
}

?>




