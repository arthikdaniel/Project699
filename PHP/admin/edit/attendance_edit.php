<?php include "../includes/mainheader.php" ?>



<?php
$resourceName = strtok(basename(__FILE__), "_");
$url = $base_url . $resourceName . "s/" . $_GET[$resourceName . "_id"];
//echo $url;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);
//print_r($json_result);
//echo sizeof($json_result);
$keyList = array_keys($json_result);
unset($keyList[sizeof($json_result) - 1]);
//var_dump($keyList);
?>


<?php include "../includes/editdata.php"; ?>

<div class="clearfix"></div>
<?php include "../includes/footer.php"; ?>


