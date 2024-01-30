<?php
include_once '../auth.php';

$_POST['id'] = bin2hex(random_bytes(7));
$_POST['verification_code'] = rand(1000, 9999);
$id = $_POST['id'];
$table = "debtors";
$investorName = ucfirst($table); // Generate dynamic name based on $table
$investorName = rtrim($investorName, 's'); // Remove plural suffix if exists

$sql = "SELECT * FROM $table WHERE email = '$_POST[email]' OR phone = '$_POST[phone]'";
$row = select_rows($sql);
if (!empty($row)) {
    msg(false, 409, "Email or phone already exists");
} else {
    if (build_sql_insert("$table", $_POST)) {
        $message = "Dear {$_POST['name']},\nYour Sokomkopo verification code is: {$_POST['verification_code']}";
        $number = $_POST['phone'];
        $response = send_sms($number, $message);
        $status_code = $response["status_code"];
        $response = json_decode($response["response"], true);
        $data = select_rows("SELECT * from $table where id = '$id'");
        unset($data["verification_code"]);
        unset($data["password"]);
        msg($status_code == 201, $status_code, "{$investorName} Registration Successful. Kindly check your SMS for account verification", ["service" =>
        $response["telco"], "message_id" => $response["message_id"], "user" => $data]);
    }
    msg(false, 422, "Unable to register {$investorName}");
}
