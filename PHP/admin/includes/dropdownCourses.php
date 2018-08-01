<?php
include "header.php";
include "callRest.php";
?>
<?php
//http://localhost:8080/courses/
$json_string = CallAPI("GET", "http://localhost:8080/courses", false);
$json_result = json_decode($json_string, true);


foreach ($json_result['_embedded']['courses'] as $course) {
//    echo $course[courseName];
//    echo '$('#myselect').append(';
    echo '<option value="'.$course[courseId].'">' . $course[courseName] . '</option>';

}
?>
<select id="myselect"></select>



<script>
    $.post("php_file.php",{ajax: true},function(data, status){
        alert(data); // correct json
        $.each($.parseJSON(data), function(key,value){
            alert(value); // I get [Object object]
        });
    });
</script>



<?php
include "footer.php";
?>


