<?php

require 'config.php';


if (isset($_POST['func']) && $_POST['func'] == 'addLead') {

    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $fname = trim($fname);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $lname = trim($lname);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $phone = trim($phone);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);


    if ($fname && $lname && $phone && $email) {

        if (isset($_SESSION['query_data']["access_token"])) {
            $addParams = array(
                "auth" => $_SESSION['query_data']["access_token"],
                "fields" => array(
                    "TITLE" => $fname . '-' . $lname,
                    "NAME" => $fname,
                    "LAST_NAME" => $lname,
                    "PHONE" => $phone,
                    "EMAIL" => $email
                )
            );

            $query_data = query('https://' . BITRIX24 . '.bitrix24.com/rest/crm.deal.add?', $addParams);

            if (array_key_exists('error', $query_data)) {
                if ($query_data['error_description'] === 'The access token provided has expired') {
                    $ref = refresh();
                    if (!$ref)
                        echo 'Faile to refresh';
                } else
                    echo "Error saving lead: " . $query_data['error_description'];
            } else
                echo 'Successfuly added a new lead';
        } else
            echo 'No access token';
    }
    else {
        echo 'error';
    }
}


function refresh() {
    $paramsRefreshToken = array(
        "grant_type" => "refresh_token",
        "client_id" => CLIENT_ID,
        "client_secret" => CLIENT_SECRET,
        "redirect_uri" => REDIRECT_URI,
        "scope" => SCOPE,
        "refresh_token" => $_SESSION["query_data"]["refresh_token"],
    );

    $query_data = query('https://' . BITRIX24 . '.bitrix24.com/oauth/token/?', $paramsRefreshToken);

    if (isset($query_data["access_token"])) {
        $_SESSION['query_data'] = $query_data;
        echo true;
    } else
        echo false;
}
