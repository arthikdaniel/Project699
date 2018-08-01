<?php
include "../includes/header.php";
include "../includes/jsIncludes.php";
include "../includes/callRest.php";


if($state==""){
    $state="profile";
}

if (isset($_POST["btn-submitStudentProfileInfo"])) {

    /*
    //Get new Student ID from Sequence Generator.
    $json_string = CallAPI("GET", "http://localhost:8080/util/SequenceGenerator?seqName=student", false);
    $json_result = json_decode($json_string, true);

    $sequence = $json_result;
    $sequence = "ST".str_pad($sequence, 5, "0", STR_PAD_LEFT);

    $arr = array(
        "studentId" => $sequence,
        "firstName" => $_POST["firstName"],
        "lastName" => $_POST["lastName"],
        "dateOfBirth" => $_POST["dateOfBirth"]
    );

    $json_string = CallAPI("POST", "http://localhost:8080/students", json_encode($arr));
    $json_result = json_decode($json_string, true);

//    var_dump($json_result);
//    print_r($json_result);

//    $httpcode = curl_getinfo($json_result, CURLINFO_HTTP_CODE);
//    print_r($httpcode);
    //if json result status 200 OK
    */
    $state="contact";

}


else if (isset($_POST["btn-submitStudentContactInfo"])) {

    /*
    $arr = array(
      "addressLineOne" => $_POST["addressLineOne"],
       "addressLineTwo" => $_POST["addressLineTwo"],
       "city" => $_POST["city"],
       "province" => $_POST["province"],
       "country" => $_POST["country"],
       "emailId" => $_POST["emailId"],
       "phoneNo" => $_POST["phoneNo"],
       "website" => $_POST["website"]
    );

    $json_string = CallAPI("POST", "http://localhost:8080/students", json_encode($arr));
    $json_result = json_decode($json_string, true);

    var_dump($json_result);
    */
    $state = "guardian";
}


else if (isset($_POST["btn-submitStudentGuardianInfo"]) ) {


    $state = "course";
}


else if (isset($_POST["btn-submitStudentCourseInfo"]) ) {


    $state = "final";
}

echo $state;
?>

<style>

    .numberCircle {
        border-radius: 50%;
        /*behavior: url(PIE.htc);*/
        /* remove if you don't care about IE8 */
        width: 56px;
        height: 56px;
        padding: 8px;
        background: #fff;
        border: 3px solid #666;
        color: #666;
        text-align: center;
        font: 32px Arial, sans-serif;
    }

</style>


<div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "../includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div>
        <!-- Page Content  -->
        <div class="wrapper" style="width: 80%">
            <div class="container p-t-md">

                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs justify-content-xl-around">
                            <li class="nav-item">
                                <a class="nav-link <?php if($state=="profile"){echo "active";}?>" style="height: 100px; width: 100px;" data-toggle="tab"
                                   href="#profileInfo">
                                    <div class="numberCircle">1</div> Student Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($state=="contact"){echo "active";}?>" style="height: 100px; width: 100px;" data-toggle="tab"
                                   href="#contactInfo">
                                    <div class="numberCircle">2</div> Contact Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  <?php if($state=="guardian"){echo "active";}?> style="height: 100px; width: 100px;" data-toggle="tab"
                                   href="#guardianInfo">
                                    <div class="numberCircle">3</div> Guardian Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  <?php if($state=="course"){echo "active";}?> style="height: 100px; width: 100px;" data-toggle="tab"
                                   href="#courseInfo">
                                    <div class="numberCircle">4</div> Course Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  <?php if($state=="final"){echo "active";}?> style="height: 100px; width: 100px;" data-toggle="tab"
                                   href="#finalInfo">
                                    <div class="numberCircle">5</div> Finish
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane  <?php if($state=="profile"){echo "active";}?>" id="profileInfo">
                                <ul class="list-group media-list media-list-stream">
                                    <p>
                                    <div class="wrapper" style="height: 10%; width:100%"></div>
                                    <div id="container1" style="width: 70%">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title text-left">Registration Form</h3>
                                                <div class="wrapper" style="height: 10px; width:100%"></div>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="post">
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="firstName" id="firstName"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="First Name" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="lastName" id="lastName"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Last Name" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="dateOfBirth" id="dateOfBirth"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Date Of Birth [YYYY-MM-dd]" required>-->
<!--                                                    </div>-->

                                                    <input type="submit" name="btn-submitStudentProfileInfo" value="Save and Continue ..."
                                                           class="btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in  <?php if($state=="contact"){echo "active";}?>" id="contactInfo">
                                <ul class="list-group media-list media-list-stream">
                                    <p>
                                    <div class="wrapper" style="height: 10%; width:100%"></div>
                                    <div id="container2" style="width: 70%">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title text-left">Contact Form</h3>
                                                <div class="wrapper" style="height: 10px; width:100%"></div>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="post">
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="addressLineOne" id="addressLineOne"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Address Line One" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="addressLineTwo" id="addressLineTwo"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Address Line Two" required>-->
<!--                                                    </div>-->
<!---->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="city" id="city"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="City" required>-->
<!--                                                    </div>-->
<!---->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="province" id="province"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Province" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="country" id="country"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Country" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="emailId" id="emailId"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Email ID" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="phoneNo" id="phoneNo"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Phone No" required>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <input type="text" name="website" id="website"-->
<!--                                                               class="form-control input-sm"-->
<!--                                                               placeholder="Website" required>-->
<!--                                                    </div>-->

                                                    <input type="submit" name="btn-submitStudentContactInfo" value="Save and Continue ..."
                                                           class="btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in   <?php if($state=="guardian"){echo "active";}?>" id="guardianInfo">
                                <ul class="list-group media-list media-list-stream">
                                    <p>
                                    <div class="wrapper" style="height: 10%; width:100%"></div>
                                    <div id="container2" style="width: 70%">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title text-left">Guardian Form</h3>
                                                <div class="wrapper" style="height: 10px; width:100%"></div>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="post">
                                                    <input type="submit" name="btn-submitStudentGuardianInfo" value="Save and Continue ..."
                                                           class="btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in  <?php if($state=="course"){echo "active";}?>" id="courseInfo">
                                <ul class="list-group media-list media-list-stream">
                                    <p>
                                    <div class="wrapper" style="height: 10%; width:100%"></div>
                                    <div id="container2" style="width: 70%">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title text-left">Course Form</h3>
                                                <div class="wrapper" style="height: 10px; width:100%"></div>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="post">
                                                    <input type="submit" name="btn-submitStudentCourseInfo" value="Save and Continue ..."
                                                           class="btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in   <?php if($state=="final"){echo "active";}?>" id="finalInfo">
                                <ul class="list-group media-list media-list-stream">
                                    <p>
                                    <div class="wrapper" style="height: 10%; width:100%"></div>
                                    <div id="container2" style="width: 70%">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title text-left">Finish Form</h3>
                                                <div class="wrapper" style="height: 10px; width:100%"></div>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method="post">
                                                    <input type="submit" name="btn-submitStudentProfileInfo" value="Save and Continue ..."
                                                           class="btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#tabpanel").load(location.href + " #mytabpanel");
</script>

<?php include "../includes/footer.php"; ?>
