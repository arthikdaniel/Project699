<div class="container-fluid" style="background-color: #b9bbbe" >
    <div class="row">
        <?php
        include "admin/includes/header.php";
        require("admin/includes/callRest.php");
        ?>
    </div>
</div>

<?php
$msg = "";
if (isset($_POST["btn-login"])) {

    # code...
    $userName = trim($_POST["login_id"]);
    $password = trim($_POST["password"]);

    $url = $base_url ."logins/search/findByUserName?userName=" . $userName;

    $json_string = CallAPI("GET", $url, false);
    $json_result = json_decode($json_string, true);

    $userRole = $json_result["_embedded"]["logins"][0]["loginRole"];

    if ($json_result["_embedded"]["logins"][0]["password"] == $password) {
//        echo "Login Successful";
        session_start(); //start the PHP_session function
        $_SESSION['login_id'] = $userName;
        $_SESSION['login_role'] = $userRole;
        if ($userRole == "student") {
            $_SESSION['student_id'] = $userName;

            $url1 = $base_url . "students/" . $userName;
            $json_string1 = CallAPI("GET", $url1, false);
            $json_result1 = json_decode($json_string1, true);
            $_SESSION['full_name'] = $json_result1['firstName'] . ' ' . $json_result1['lastName'];


        }else{
            $_SESSION['full_name'] = 'Administrator';
        }


        # code...
        header("location:../admin/dashboard.php");
    } else {
        $msg = '  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Check your email/password</strong>
                </div>';
    }
} else{
    session_destroy();
}


if ($debug=="true") {
    echo $json_result1['firstName'] . ' ' . $json_result1['lastName'];
//    echo $student_id.'<br>'.$url.'<br>'.print_r($json_result);
//    var_dump($json_result);
//    print_r($json_result);
//
//
//    echo $student_id.'<br>'.$url1.'<br>'.print_r($json_result1);
//    var_dump($json_result1);
//    print_r($json_result1);
}
?>





    <!DOCTYPE html>
    <html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Bootstrap CSS -->
        <link href="/css/bootstrap.css" rel="stylesheet">
    </head>
    <style type="text/css">
        #mypannel {
            position: relative;
            top: 130px;
        }
    </style>

    <body>

    <div class="container">
        <div class="panel panel-default" id="mypannel">
            <div class="panel-body">

                <form action="" method="POST" role="form">
                    <H6>Login to your session</H6>

                    <div class="form-group">
                        <label for="">Login</label>
                        <input type="text" class="form-control" name="login_id" placeholder="username/email">

                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">

                    </div>
                    <center>
                        <button type="submit" class="btn btn-success btn-lg " name="btn-login">Login</button>
                    </center>
                </form>


            </div>
            <center>
                <?php
                echo $msg;
                ?>
            </center>

        </div>
    </div>

    </body>
    </html>

<?php include "admin/includes/footer.php"; ?>