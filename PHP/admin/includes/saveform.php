<?php include "../includes/mainheader.php" ?>



<table>
    <?php




        foreach ($_POST as $key => $value) {

            echo "<tr>";
            echo "<td>";
            echo $key;
            echo "</td>";
            echo "<td>";
            echo $value;
            echo "</td>";
            echo "</tr>";
        }


//    echo json_encode($_POST);

    $calbackURL = $_POST['callBackURL'];
    unset($_POST['callBackURL']);

    $json_string = json_encode($_POST);
    echo $json_string;

//    echo $_POST['attendance_id'];

    $resourceName = $_POST['resourceName'];
    $url = $base_url . $resourceName . "s/" .$_POST['attendance_id'];

    $json_string2 = CallAPI("PUT", $url , json_encode($_POST));
    $json_result2 = json_decode($json_string2, true);

//    var_dump($json_result);



//    header("location:".$_POST['callBackURL']."");

    ?>
</table>


<pre id="json"></pre>
<script>
    var MyJSNumVar = <?php Print($json_string); ?>;
    document.getElementById("json").innerHTML = JSON.stringify(MyJSNumVar, undefined, 2);
</script>';