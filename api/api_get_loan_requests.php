<?php
include_once 'auth.php';

checkRequiredFields($_POST, ["user_id", "type"]);

$userId = $_POST["user_id"];
$type = $_POST["type"];

if ($type === 'investor') {
    $table = "investors";
} else if ($type === 'debtor') {
    $table = "debtors";
} else {
    msg(false, 400, "Incorrect User Type $type");
}

$investor = select_rows("SELECT * FROM $table WHERE id = '$userId'")[0];

if (empty($investor)) {
    msg(false, 404, $type == 'investor' ? 'Investor' : 'Debtor' . " doesn't exist. Register First");
}

$sql = "SELECT dr.*, 
               JSON_OBJECT('id', up.id, 'first_name', up.firstName, 'last_name', up.lastName, 'email', up.email, 'phone', up.phoneNumber) AS debtor_profile
        FROM debtor_requests dr
        INNER JOIN user_profiles up ON dr.profile_id = up.id
        WHERE dr.status = 'pending'";

$data = select_rows($sql);

if (!empty($data)) {
    foreach ($data as &$row) {
        $row["amount"] = roundOff($row["amount"]);
        $row["debtor_profile"] = json_decode($row["debtor_profile"], true);
    }

    msg(true, 200, "Successfully fetched the data", $data);
} else {
    msg(false, 404, "No data exists");
}
