<?php

include "../includes/header.php";
include "../includes/jsIncludes.php";
include "../includes/callRest.php";

if (isset($_POST["btn-submit"])) {

    $arr = array(
        "studentId" => $_POST["studentId"],
        "firstName" => $_POST["firstName"],
        "lastName" => $_POST["lastName"],
        "dateOfBirth" => $_POST["dateOfBirth"]
    );

    //https://stackoverflow.com/questions/8238502/convert-post-array-to-json-format
    //$json_string1 = json_encode($_POST);

    $json_string1 = json_encode($arr);
//    echo var_dump($json_string1);

    $json_string = CallAPI("POST", "http://localhost:8080/students", $json_string1);
    $json_result = json_decode($json_string, true);

//    echo var_dump($json_result);

}
?>




    <link href="/css/form.css" rel="stylesheet" type="text/css"/>


    <div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "../includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div>
        <!-- Page Content  -->
        <div class="container" style="width: 20000px; height: 10000px">
            <div class="container centered-form" id="container">
                <div class="row centered-form">
                    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-left">Registration Form</h3>
                                <div class="wrapper" style="height: 10px; width:100%"></div>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <input type="text" name="studentId" id="studentId"
                                               class="form-control input-sm"
                                               placeholder="Student ID" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="firstName" id="firstName"
                                               class="form-control input-sm"
                                               placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastName" id="lastName"
                                               class="form-control input-sm"
                                               placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="dateOfBirth" id="dateOfBirth"
                                               class="form-control input-sm"
                                               placeholder="Date Of Birth [YYYY-MM-dd]" required>
                                    </div>
                                    <div class="form-group">

                                        <select class="custom-select show-tick" name="course_ids" title="Choose one of the following..." id="course_ids" multiple required>
                                            <option data-icon="fa-heart">White Belt</option>
                                            <option>Blue Belt</option>
                                            <option>Green Belt</option>
                                        </select>

                                    </div>

                                    <input type="submit" name="btn-submit" value="Register"
                                           class="btn btn-success btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "../includes/footer.php"; ?>