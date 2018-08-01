<style>
    table.Transposed table {
        border-collapse: collapse;
    }

    table.Transposed tr {
        display: block;
        float: left;
    }

    table.Transposed th {
        width: 250px;
        display: block;
    }

    table.Transposed td {
        width: 400px;
        display: block;
    }
</style>


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
                echo '<h4>View ' . ucfirst($resourceName) . ' Details for ' . $_SESSION['student_id'] . '</h4>';
            } else if ($_SESSION['login_role'] == "admin") {
                echo '<h4>View ' . ucfirst($resourceName) . ' Details</h4>';
            }
            ?>

            <div class="table-responsive">
                <table class="table Transposed">
                    <tr>
                        <?php
                        foreach ($keyList as $key) {
                            echo '<th>' . fromCamelCase(ucwords($key)) . '</th>';
                        } ?>
                    </tr>
                    <tr>
                        <?php

                        foreach ($keyList as $key) {

                            echo '<td>';
                            if (is_array($json_result[$key])) {
                                $list = $json_result[$key];
                                $newKeyList = array_keys($list[0]);
//                                foreach ($list as $listValue) {
                                echo '
                                        <div class="panel panel-default" style="width: 45rem;">
                                          <div class="panel-heading"><strong>' . fromCamelCase(ucwords($key)) . '</strong></div>
                                           <span class="MyNewClass">
                                              <table class="table table-bordered table-hover specialCollapse">';
                                foreach ($list as $key => $listValue) {
                                    if (!is_array($listValue)) {
                                        echo fromCamelCase(ucwords($key)) . ' : ' . $listValue . '<br>';


                                    } else {
                                        $newlist = $listValue;
                                        $newKeyList = array_keys($newlist[0]);
                                        echo '
                                        <div class="panel panel-default" style="width: 45rem;">
                                          <div class="panel-heading"><strong>' . fromCamelCase(ucwords($key)) . '</strong></div>
                                           <span class="MyNewClass">
                                              <table class="table table-bordered table-hover specialCollapse">';
                                        foreach ($newlist as $key => $newValue) {
                                            if (!is_array($newValue)) {
                                                echo fromCamelCase(ucwords($key)) . ' : ' . $newValue . '<br>';
                                            } else {
                                                $newlist = $newValue;
                                                $newKeyList = array_keys($newlist[0]);

                                                echo '
                                        <div class="panel panel-default" style="width: 45rem;">
                                          <div class="panel-heading"><strong>' . fromCamelCase(ucwords($key)) . '</strong></div>
                                           <span class="MyNewClass">
                                              <table class="table table-bordered table-hover specialCollapse">';
                                                foreach ($newlist as $key => $new) {
                                                    if (!is_array($new)) {
                                                        echo fromCamelCase(ucwords($key)) . ' : ' . $new . '<br>';
                                                    }
                                                }

                                                echo ' 
                                              </table>
                                           </span>
                                        </div>
                                        ';
                                            }
                                        }
                                        echo ' 
                                              </table>
                                           </span>
                                        </div>
                                        ';
                                    }
                                }

                                echo ' 
                                              </table>
                                           </span>
                                        </div>
                                        ';
                            } else {
                                echo formatIfDate($json_result[$key]);
                            }
                            echo '</td>';
                        }
                        ?>
                    </tr>
                </table>


                <?php
                $self = $json_result["_links"]["self"]["href"];
                $pos = strrpos($self, '/');
                $_id = $pos === false ? $self : substr($self, $pos + 1);
                //echo $_id;
                $_id = getIdFromJson($json_result);
                ?>

                <div class="panel row justify-content-around">
                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                        <a class="btn btn-primary btn-xs"
                           href="<?php echo '../edit/' . $resourceName . '_edit.php?' . $resourceName . '_id=' . $_id; ?>">
                            <span class="fa fa-pencil"> Edit </span></a>
                    </p>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                data-target="#delete"><span class="fa fa-trash"> Delete </span></button>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>