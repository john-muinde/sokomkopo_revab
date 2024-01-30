<?php
function checkRequiredFields($data, $requiredFields)
{
    $missingFields = [];
    foreach ($requiredFields as $field) {
        if (!array_key_exists($field, $data) || $data[$field] == '') {
            array_push($missingFields, $field);
        }
    }
    $missingCount = count($missingFields);
    if ($missingCount > 0) {
        $errorMessage = 'Missing value'.($missingCount > 1 ? 's ' : ' ');
        $errorMessage .= implode(', ', array_slice($missingFields, 0, -1));
        if ($missingCount >= 2) {
            $errorMessage .= ', and ';
        } else {
            $errorMessage .= '';
        }
        $errorMessage .= end($missingFields);
        msg(0, 400, $errorMessage);
    }
}

function msg($success, $code, $message, $data = [])
{
    http_response_code($code);
    echo json_encode(['success' => $success, 'code' => $code, 'message' => $message, 'data' => $data]);
    exit;
}

function isJson($string)
{
    json_decode($string);

    return json_last_error() === JSON_ERROR_NONE;
}

function getRequestBody()
{
    $requestData = [];
    $requestBody = file_get_contents('php://input');
    // Check if the request body contains JSON data
    if (!empty($requestBody) && isJson($requestBody)) {
        $requestData = json_decode($requestBody, true);
    } elseif (!empty($requestBody) && !isJson($requestBody)) {
        $requestData = $_POST;
    } elseif (!empty($_FILES)) {
        $requestData = $_FILES;
    } else {
        $requestData = [];
    }

    return $requestData;
}
function verifyMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] != $method) {
        msg(0, 400, 'Method not supported');
    }
}
