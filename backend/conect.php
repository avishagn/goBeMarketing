<?php

require 'config.php';


if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $params = array(
        "grant_type" => "authorization_code",
        "client_id" => CLIENT_ID,
        "client_secret" => CLIENT_SECRET,
        "redirect_uri" => REDIRECT_URI,
        "scope" => SCOPE,
        "code" => $code,
    );

    $query_data = query('https://' . BITRIX24 . '.bitrix24.com/oauth/token/?', $params);
    $_SESSION['query_data'] = $query_data;


    
} else {
    $params = array(
        "response_type" => "code",
        "client_id" => CLIENT_ID,
        "redirect_uri" => REDIRECT_URI,
    );
    $url = 'https://' . BITRIX24 . '.bitrix24.com/oauth/authorize/?' . http_build_query($params);
    echo $url;
}
