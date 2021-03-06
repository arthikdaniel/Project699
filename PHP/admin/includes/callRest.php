<?php

$base_url = "http://localhost:8080/api/";

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl, CURLOPT_HEADER  , true);


    $result = curl_exec($curl);

//    echo $result;

    curl_close($curl);
    return $result;
}
?>



<?php

function deleteRequest($url, $json)
{
    //$client = new GuzzleHttp\Client(['debug' => true]);
    $client = new GuzzleHttp\Client();
    return $client->delete($url, [
        GuzzleHttp\RequestOptions::JSON => $json
    ]);
}

function putRequest($url, $json)
{
    $client = new GuzzleHttp\Client();
    return $client->put($url, [
        GuzzleHttp\RequestOptions::JSON => $json,
        'allow_redirects' => false,
        'timeout' => 5
    ]);
}

function postRequest($url, $json)
{

    $client = new GuzzleHttp\Client(['debug' => true]);
//    $client = new GuzzleHttp\Client();
    return $client->post($url, [
        GuzzleHttp\RequestOptions::JSON => $json
    ]);
}

function getRequest($url, $json)
{
    $client = new GuzzleHttp\Client();
    try {
        return $client->request('GET', $url, [
            'json' => $json
        ]);
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
        throwException($e);
    }
}

?>
