<?php
//echo $url;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);
//print_r($json_result);

$list = $json_result["_embedded"][$resourceName . "s"];
$keyList = array_keys($list[0]);
//print_r($keyList);

foreach ($list as $key => $listValue) {
    foreach ($listValue as $key1 => $value) {
        if (is_array($value)) {
            unset($keyList[$key1]);
            if (($key = array_search($key1, $keyList)) !== false) {
                unset($keyList[$key]);
            }
        }
    }
}
//print_r($keyList);
?>

<div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "../includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div>
        <!-- Page Content  -->
        <div>
            <div class="wrapper" style="height: 10%; width:100%"></div>
            <?php
            //Display Title based on User Role
            if ($_SESSION['login_role'] == "student") {
                echo '<h4>' . ucfirst($resourceName) . ' Details for ' . $student_id . '</h4>';
            } else if ($_SESSION['login_role'] == "admin") {
                echo '<h4>' . ucfirst($resourceName) . ' Details</h4>';
            }
            ?>

            <div class="table-responsive">
                <table id="myStudents" class="table table-bordered table-striped">
                    <thead>
                    <?php foreach ($keyList as $key) {
                        echo '<th>' . fromCamelCase(ucwords($key)) . '</th>';
                    } ?>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list as $listValue) {
                        $self = $listValue["_links"]["self"]["href"];
                        $pos = strrpos($self, '/');
                        $_id = $pos === false ? $self : substr($self, $pos + 1);
                        ?>
                        <tr>
                            <?php
                            foreach ($keyList as $key) {
                                if (is_array($list[$key]))
                                    continue;
                                echo '<td>' . formatIfDate($listValue[$key]) . '</td>';
                            } ?>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="View">
                                    <a class="btn btn-success btn-xs"
                                       href="<?php echo '../view/' . $resourceName . '_view.php?' . $resourceName . '_id=' . $_id; ?>">
                                        <span class="fa fa-eye"></span></a>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a class="btn btn-primary btn-xs"
                                       href="<?php echo '../edit/' . $resourceName . '_edit.php?' . $resourceName . '_id=' . $_id; ?>">
                                        <span class="fa fa-pencil"></span></a>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                            data-target="#delete"><span class="fa fa-trash"></span></button>
                                </p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="fa fa-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="fa fa-chevron-right"></span></a></li>
                </ul>

            </div>


            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                        class="fa fa-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-danger"><span class="fa fa-warning-sign"></span> Are
                                you sure you want to delete this Record?
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-success"><span
                                        class="fa fa-ok-sign"></span> Yes
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                        class="fa fa-remove"></span> No
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>
    </div>
</div>