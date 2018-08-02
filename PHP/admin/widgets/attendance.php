<?php
/*
Logic:
Get all courses start date and end date and MandatoryHours
Get Total of HoursAttended for all attendances for Student which group by Course
Calculate Percentage (HoursAttended vs MandatoryHours)
Return this value to Widget
*/


//Get All Attendance Information for the Student grouped by CourseID
$url = $base_url . "widget/StudAttendWidget/" . $student_id;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);


//Create Widget Data Map
$totalHoursAttended = array();
foreach ($json_result as $attendance) {
    $json_result = json_decode(CallAPI("GET", $base_url . "courses/" . $attendance[courseId], false), true);
    $mandatoryHours = (double)($json_result)['mandatoryHours'];
    $totalHours = (double)$attendance[totalHours];
//    echo $totalHours;
    $totalHoursAttended[$attendance[courseId]] = array();
    $totalHoursAttended[$attendance[courseId]]['courseName'] = ($json_result)['courseName'];
    $totalHoursAttended[$attendance[courseId]]['totalHours'] = $totalHours;
    $totalHoursAttended[$attendance[courseId]]['mandatoryHours'] = $mandatoryHours;
    $totalHoursAttended[$attendance[courseId]]['percentage'] = $totalHours * 100 / $mandatoryHours;
}

if ($debug == "true") {
//    echo $student_id.'<br>'.$url.'<br>'.print_r($json_result);
//    var_dump($json_result);
//    //Check Final Map Output is OK
//    var_dump($totalHoursAttended);
}
?>

<div class="card  border-dark" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Attendance Details</h5>
        <?php
        foreach ($totalHoursAttended as $key => $course) {
//            echo '<h6 class="card-subtitle mb-2 text-muted">'.$key.'</h6>';
            echo '<a href="/admin/listing/attendance_list.php?student_id=' . $student_id . '&course_id=' . $key . '" class="card-link">View Course Details</a>';
            echo '
                <div class="card-text" style="width: 200px;height: 150px">
                    <div id="' . $key . '-circle" data-animation="1" data-animationStep="5" data-percent="' . $course[percentage] . '"></div>
                </div> <br>';

        } ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        <?php
        foreach ($totalHoursAttended as $key => $course) {
        ?>
        $("#<?php echo $key;?>-circle").circliful({
            animation: 0,
            animationStep: 6,
            foregroundBorderWidth: 10,
            backgroundBorderWidth: 10,
            backgroundColor: "none",
            fillColor: '#eee',
            icon: '<?php echo $course[courseName]?>',
            iconColor: '#3498DB',
            iconSize: '30',
            iconPosition: 'middle',
            progressColor: {20: '#152cc4', 40: '#FF6C00', 70: '#56ff3a'},
            percentageTextSize: 30
        });
        <?php
        }
        ?>
    });
</script>




