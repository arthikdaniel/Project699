<div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "../includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div><!-- Page Content  -->

        <div>
            <div class="wrapper" style="height: 10%; width:100%"></div>
            <?php
            //Display Title based on User Role
            if ($_SESSION['login_role'] == "student") {
                echo '<h4>Edit ' . ucfirst($resourceName) . ' Details for ' . $_SESSION['student_id'] . '</h4>';
            } else if ($_SESSION['login_role'] == "admin") {
                echo '<h4>Edit ' . ucfirst($resourceName) . ' Details</h4>';
            }
            ?>


            <?php
            //                var_dump($json_result);
            $self = $json_result["_links"]["self"]["href"];
            $pos = strrpos($self, '/');
            $_id = $pos === false ? $self : substr($self, $pos + 1);
            //                echo $_id;
            ?>

            <div class="table-responsive">

                <form method="post" action="/admin/includes/saveform.php">
                    <?php
                    foreach ($keyList as $key) {

                        echo '
            <input type="hidden" class="form-control" name="callBackURL" value="'.str_replace("edit","view",$_SERVER['REQUEST_URI']).'" placeholder="Enter value here">
            <input type="hidden" class="form-control" name="' . $resourceName . '_id' . '" value="' . $_id . '" >
            <input type="hidden" class="form-control" name="resourceName" value="' . $resourceName . '" >
            
            ';

                        echo
                            '<div class="form-group  col-12">
                                <label for="' . ucwords($key) . '">' . fromCamelCase(ucwords($key)) . '</label>';
                        if (is_array($json_result[$key])) {
                            $list = $json_result[$key];
                            $newKeyList = array_keys($list[0]);
                            var_dump($newKeyList);
                            foreach ($newKeyList as $newKey) {
                                echo $list[0];
                            }
                            foreach ($list as $listValue) {
                                echo $listValue . '<br>';
                            }
                            $keyList = array_keys($list[0]);
//                                var_dump($list);

                        } else {
                            echo
                                '
                                <input type="text" class="form-control" id="' . ucwords($key) . '" name="' . ucwords($key) . '" value="' . formatIfDate($json_result[$key]) . '" placeholder="Enter value here">
                            
                        </div>';
                        }
                    }
                    ?>


                    <div class="panel row justify-content-around">
                        <p data-placement="top" data-toggle="tooltip" title="Edit">

                            <button type="submit" class="btn btn-primary btn-xs"><span
                                        class="fa fa-pencil"> Save </span></a></button>
                        </p>

                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                            <a class="btn btn-primary btn-xs"
                               href="<?php echo '../view/' . $resourceName . '_view.php?' . $resourceName . '_id=' . $_id; ?>">
                                <span class="fa fa-pencil"> Cancel </span></a>
                        </p>
                    </div>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

</div>