<?php include "../includes/mainheader.php" ?>

<?php
$resourceName = strtok(basename(__FILE__), "_");
$url = $base_url . $resourceName . "s/" . $_GET[$resourceName . "_id"];
//echo $url;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);

unset($json_string);//prevent memory leaks for large json.
$keyList = array_keys($json_result);
unset ($json_result[$keyList[sizeof($json_result) - 1]]); //Getting rid of '_links';
unset($keyList[sizeof($json_result) - 1]);

?>

<?php include "../includes/viewdata.php"; ?>

<div class="clearfix"></div>
<?php include "../includes/footer.php"; ?>



