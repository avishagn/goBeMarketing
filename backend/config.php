<?php

define('CLIENT_ID', 'local.5b324946683ce3.96998208');
define('CLIENT_SECRET', 'ukDyGxbWN89w3eWLKR6xP3HCLcEsChWeU9SV2VHozKx5VxUBia');
define('REDIRECT_URI', 'http://localhost/goBeMarketing/backend/conect.php');

define('BITRIX24', 'b24-1111t9');
define('SCOPE', 'crm');

session_start();

function redirect($url)
{
    Header("Location: ".$url);
    die();	
}


//Make a request with the given data at the specified address. In response, JSON is expected
function query($url, $data) {
    $curlOptions = array(
        CURLOPT_RETURNTRANSFER => true
    );

    $url .= strpos($url, "?") > 0 ? "&" : "?";
    $url .= http_build_query($data);

    $curl = curl_init($url);
    curl_setopt_array($curl, $curlOptions);
    $result = curl_exec($curl);
    return json_decode($result, 1);
}
