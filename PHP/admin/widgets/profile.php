<?php
/*
Logic:
Get Address & Contact Information for Enrolled Student
Return this value to Widget
*/
?>

<?php
$url = $base_url ."students/".$student_id;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);

if ($debug == "true") {
    echo $student_id.'<br>'.$url.'<br>'.print_r($json_result);
    var_dump($json_result);
}
?>


<div class="card border-dark" style="width: 25rem;">
    <div class="card-header">
        <h5>Profile Details</h5>
    </div>
    <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['full_name'] ?></h6>
        <div class="row">
            <div class="col-sm-2 col-md-4">
                <img src="http://placehold.it/100x120" alt="Profile Pic" class="img-rounded img-responsive"/>
            </div>

            <div class="col-sm-4 col-md-8">
                <small><cite
                            title="<?php echo $json_result['contactInfo']['city'] . ', ' . $json_result['contactInfo']['province'] . ', ' . $json_result['contactInfo']['country'] ?>">
                        <?php echo $json_result['contactInfo']['city'] . ', ' . $json_result['contactInfo']['province'] . ', ' . $json_result['contactInfo']['country'] ?>
                        <i class="fa fa-map-marker"></i></cite>
                    <p>
                        <i class="fa fa-envelope"></i> <?php echo $json_result['contactInfo']['emailId'] ?><br/>
                        <i class="fa fa-globe"></i> <a
                                href="<?php echo $json_result['contactInfo']['website'] ?>"><?php echo $json_result['contactInfo']['website'] ?></a><br/>
                        <i class="fa fa-gift"></i>
                        <?php echo date_format(date_create($json_result['dob']), "d-M-Y"); ?><br/><br/>
                        <i class="fa fa-edit"></i> <a href="/admin/view/student_view.php?student_id="<?php echo $student_id;?> class="card-link">View / Modify Profile Details</a>
                    </p>
                </small>
            </div>
        </div>
    </div>
</div>
