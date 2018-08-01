<?php
include "../includes/mainheader.php";
?>

<?php

$url = $base_url . "students/ST00001";
$json_string = CallAPI("GET", $url, false);
$json_result = json_decode($json_string, true);

unset($json_string);//prevent memory leaks for large json.
$keyList = array_keys($json_result);
unset ($json_result[$keyList[sizeof($json_result) - 1]]); //Getting rid of '_links';
unset($keyList[sizeof($json_result) - 1]);

?>


<div id="accordion">
    <br/>
    <?php

    $firstList = $json_result;
    foreach ($firstList as $key1 => $value1) {
        //Student Main
        if (!is_array($firstList[$key1])) {
            echo fromCamelCase(ucwords($key1)) . ':  ' . formatIfDate($value1) . '<br>';
        } else {

            //ContactInfo, Guardian Info and Rank
            $secondList = $firstList[$key1];


            echo '
                <div class="card">
                <div class="card-header" id="heading-' . $key1 . '">
                    <h5 class="mb-0">
                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-' . $key1 . '" aria-expanded="false" aria-controls="collapse-' . $key1 . '">
                        ' . fromCamelCase(ucwords($key1)) . '
                    </a>
                    </h5>
                </div>
                <div id="collapse-' . $key1 . '" class="collapse" data-parent="#accordion" aria-labelledby="heading-' . $key1 . '">
                    <div class="card-body"> 
                ';


            $count = 1;
            foreach ($secondList as $key2 => $value2) {
                if (!is_array($secondList[$key2])) {
                    //Display Contact Info
                    if ($key2 == '' && $value2 == '') {
                    } else {
                        echo fromCamelCase(ucwords($key2)) . ':  ' . formatIfDate($value2) . '<br>';
                    }
                } else {


                    //Guardian First Level, Ranks
                    $thirdList = $secondList[$key2];

//                    echo $key1.$key2;
                    echo '    
                    <div id="accordion-' . $key1 . $key2 . '">
                        <div class="card">
                            <div class="card-header" id="heading-' . $key1 . $key2 . '-' . $count . '">
                            <h5 class="mb-0">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-' . $key1 . $key2 . "-" . $count . '"
                               aria-expanded="true" aria-controls="' . $key1 . $key2 . '-' . $count . '">
                            ' . fromCamelCase(ucwords($key1)) . ' ' . fromCamelCase(ucwords($key2)) . '
                            </a>
                            </h5>
                        </div>
                        <div id="collapse-' . $key1 . $key2 . "-" . $count . '" class="collapse" data-parent="#accordion-' . $key1 . $key2 . '" aria-labelledby="heading-' . $key1 . $key2 . "-" . $count . '">
                            <div class="card-body">
                        ';

                    foreach ($thirdList as $key3 => $value3) {


                        if (!is_array($thirdList[$key3])) {
                            //Display Guardian First Level Info, Belt Info
                            if ($key3 == '' && $value3 == '') {
                            } else {
                                echo fromCamelCase(ucwords($key3)) . ':  ' . formatIfDate($value3) . '<br>';
                            }
                        } else {


                            //Guardian Second Level Info
                            $fourthList = $thirdList[$key3];
                            foreach ($fourthList as $key4 => $value4) {


                                if (!is_array($fourthList[$key4])) {
                                    //Display Guardian Second Level Info
                                    if ($key4 == '' && $value4 == '') {
                                    } else {
                                        echo fromCamelCase(ucwords($key4)) . ':  ' . formatIfDate($value4) . '<br>';
                                    }
                                }
                            }

                        }

                    }
                    echo ' 
                            </div>
                        </div>
                    </div>
                </div>';
                }
            }
            $count ++;
            echo ' 
                         </div>
                     </div>
                  </div>';

        }
    } ?>

</div>




<style>
    .mb-0 > a {
        display: block;
        position: relative;
    }

    .mb-0 > a:after {
        content: "\f078"; /* fa-chevron-down */
        font-family: 'FontAwesome';
        position: absolute;
        right: 0;
    }

    .mb-0 > a[aria-expanded="true"]:after {
        content: "\f077"; /* fa-chevron-up */
    }
</style>


