<?php

//Camel Case with Spaceing
function fromCamelCase($camelCaseString)
{
    $re = '/(?<=[a-z])(?=[A-Z])/x';
    $a = preg_split($re, $camelCaseString);
    return join($a, " ");
}


//Check if Input is Valid Date?
function isValidDate($stringValue)
{
    $date = date_parse($stringValue);
    if ($date["error_count"] == 0 && checkdate($date["month"], $date["day"], $date["year"]))
        return true;
    else
        return false;
}


//Formats Field if Date or returns original String
function formatIfDate($inputStr)
{
    if (isValidDate($inputStr)) {
        $time = strtotime($inputStr);
        $newformat = date('Y-m-d', $time);
        return $newformat;
    } else
        return $inputStr;
}

function getIdFromJson($json_object)
{
    $self = $json_object["_links"]["self"]["href"];
    $pos = strrpos($self, '/');
    $_id = $pos === false ? $self : substr($self, $pos + 1);
    return $_id;
}

function getFullName($base_url, $student_id)
{
}

?>