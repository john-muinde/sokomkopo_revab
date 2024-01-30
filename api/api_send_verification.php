<?php
include_once 'auth.php', 'auth_sec.php', 'send_sms.php', 'operations.php';

$data = getRequestBody();
checkRequiredFields($data, ["type", "verification"]);

$verification = $data["verification"];
if (strtolower($verification) !== 'phone' && strtolower($verification) !== 'email') {
    msg(false, 400, "Invalid verification method");
}

$requiredField = $data["$verification"];
checkRequiredFields($data, [$requiredField]);

$phone = $data['phone'];
$email = $data['email'];

switch ($data['type']) {
    case 'investor':
        $sql = "select * from investors";
        break;
    case 'debtors':
        $sql = "select * from debtors";
        break;
    default:
        msg(false, 400, "Unrecognized type");
}

$sql .= " where $verification = `" . security($data["verification"]) . "`";

$message = 'Dear ' . $row['name'] . ', ' . 'your verification code is: ' . $row['verification_code'];

if (isset($data['phone'])) {
    $number = $row['phone'];
    $response = send_sms($number, $message);
    $status_code = $response["status_code"];
}


$row = select_rows($sql);
if (!empty($row)) {
    $row = $row[0];
    $row = $row[0];
    $_POST['verification_code'] = rand(1000, 9999);

    // Update the verification code and time created
    $currentTimestamp = date('Y-m-d H:i:s');
    $send_res = insert_delete_edit("UPDATE $table SET verification_code = {$_POST['verification_code']}, time_created = '{$currentTimestamp}' WHERE id = {$row['id']}");


    $message = 'Dear ' . $row['name'] . ', \n' . 'Your Sokomkopo verification code is: ' . $_POST['verification_code'];

    if (isset($data['phone'])) {
        $number = $row['phone'];
        $response = send_sms($number, $message);
        $status_code = $response["status_code"];
    }
    msg(true, 200, "sending sms", $response);
} else {
    $msg = ucfirst($data['type']) . " Phone number doesn't exist";
    msg(false, 404, $msg);
}
