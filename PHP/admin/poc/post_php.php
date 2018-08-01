<html>
<body>
<form method="post" action="/admin/includes/saveform.php">
    <input type="text" name="studentname">
    <input type="submit" value="click">
</form>
<?php

$resourceName = "attendance";
$_id = "AT00003";


?>
<form method="post" action="/admin/includes/saveform.php">
    <?php

        echo '
            <input type="hidden" class="form-control" name="callBackURL" value="'.$_SERVER['REQUEST_URI'].'" placeholder="Enter value here">
            <input type="hidden" class="form-control" name="' . $resourceName . '_id=' . '" value="' . $_id . '" >
            ';

    ?>


    <div class="panel row justify-content-around">
        <p data-placement="top" data-toggle="tooltip" title="Edit">

            <button type="submit" class="btn btn-primary btn-xs"><span
                    class="fa fa-pencil"> Save </span></a></button>

            <input type="submit" value="click">
        </p>

        <p data-placement="top" data-toggle="tooltip" title="Edit">
            <a class="btn btn-primary btn-xs"
               href="<?php echo '../view/' . $resourceName . '_view.php?' . $resourceName . '_id=' . $_id; ?>">
                <span class="fa fa-pencil"> Cancel </span></a>
        </p>
    </div>
    <div class="clearfix"></div>

</form>


<?php
function display()
{
    echo "hello".$_POST["studentname"];
}
?>
</body>
</html>