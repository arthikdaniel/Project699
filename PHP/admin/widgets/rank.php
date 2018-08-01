<?php
/**
 * Created by IntelliJ IDEA.
 * User: arthik.daniel
 * Date: 19/07/18
 * Time: 3:50 AM
 */

//Get All Rank Scores for the Student
$url = $base_url ."/students/".$student_id;
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);

?>

<?php
$completed = '';
$inProgress = '';
//TODO: To integrate with Master Ranks
$pending = '<a href="#" class="badge badge-pill badge-dark">Test Badge</a>';

foreach ($json_result['rankScores'] as $score) {
    if ($score['awardedDate'] == null) {
        //In Progress
        $inProgress = $inProgress . '<a href="#" class="badge badge-pill badge-primary">' . $score['beltColor'] . ' Belt</a> <br>';
    } else {
        //Completed
        $completed = $completed .
            '<a href="#" class="badge badge-pill badge-success">' . $score['beltColor'] . ' Belt</a>' .
            ' (on ' . date_format(date_create($json_result['awardedDate']), "d-M-Y") . ')<br/>';
    }
}
?>

<div class="card border-dark" style="width: 20rem;">
    <div class="card-header"><h5>Rank / Badge Details</h5></div>
    <div class="card-body">
            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-left p-1">
                        <p class="d-block w-100">In Progress: <br/><?php echo $inProgress; ?></p>
                    </div>
                    <div class="carousel-item text-left p-1">
                        <p class="d-block w-100">Pending: <br/><?php echo $pending; ?></p>
                    </div>
                    <div class="carousel-item text-left p-1">
                        <p class="d-block w-100">Completed: <br/><?php echo $completed; ?></p>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
</div>

<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
