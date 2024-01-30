<?php
include_once '../auth.php';

checkRequiredFields($_POST, ["user_id"]);

$userId = $_POST["user_id"];
$investor = select_rows("SELECT * FROM investors WHERE id = '$userId'")[0];

if(empty($investor)) {
    msg(false, 404, "Investor doesn't exist. Register First");
}

$sql = "SELECT *
        FROM debtor_requests dr
        INNER JOIN user_profiles up ON dr.profile_id = up.id
        WHERE dr.status = 'pending'";
$data = select_rows($sql)[0];

if(!empty($data)) {
    // $data["bookBalance"] = roundOff($data["bookBalance"]);
    // $data["currentBalance"] = roundOff($data["currentBalance"]);
    // $data["isActive"] = (bool)$data["isActive"];
    // $data["isDefault"] = (bool)$data["isDefault"];
    msg(true, 200, "Successfully fetched the data", $data);
} else {
    msg(false, 404, "No data exists");
}
