<?php include "../includes/mainheader.php" ?>



<?php

require '../../vendor/autoload.php';

$resourceName = strtok(basename(__FILE__), "_");
$url = $base_url . $resourceName . "s/" . $_GET[$resourceName . "_id"];

$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);

$keyList = array_keys($json_result);
unset($keyList[sizeof($json_result) - 1]);
?>


<?php include "../includes/editdata.php"; ?>

<div class="clearfix"></div>
<?php include "../includes/footer.php"; ?>


