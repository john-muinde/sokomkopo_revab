<?php
function connect()
{
    return mysqli_connect("localhost", "veseninternal_sokomkopo", "sokomkopo1234!@#$", "veseninternal_sokomkopo");
}

$debtorIds = [
    "39b6ac9e6e3441",
    "4ddc94a4bb46e5",
    "523036ef7b3a91",
    "9554ad11c7c2cd",
    "96763e899fffd5",
    "a77e59611b2ea4",
    "e799474bbce981",
    "fd79e905155325"
];

$investorIds = [
    "11b0e84be1201d",
    "1469922ec730a3",
    "1856ebaba78e4b",
    "28bbf0daf2c467",
    "3172b31719b7c8",
    "32a27f44f855b1",
    "3758d5771efea8",
    "403dfaf21fec94",
    "405194af508cbc",
    "440cf0a68b6186",
    "4545cf78224537",
    "59f5a69ebb24d5",
    "6072ab1ca7893e",
    "6890812127e774",
    "70be0655ee16f8",
    "79b4e1f8760bc3",
    "7af58c5c2d8150",
    "7bee6d4c1bdddd",
    "84891c5c15977d",
    "85cd4f6ac68af5",
    "8845ef401255c6",
    "9b84dace722e09",
    "9c348d96a996e5",
    "a0e9442103b575",
    "aa8f2e349ab87e"
];

$transactionData = [];
function getRandomId($idArray)
{
    $randomIndex = array_rand($idArray);
    return rand(0, 1) ? $idArray[$randomIndex] : null;
}

$transactionData = [];

// Generate dummy transactions data
foreach ($debtorIds as $debtorId) {
    foreach ($investorIds as $investorId) {
        $transactionId = bin2hex(random_bytes(6)); // Changed to 6 characters
        $amount = rand(0, 1000); // Adjust the range as per your requirement, including zero
        $dateCreated = date("Y-m-d H:i:s");
        
        $debtorId = getRandomId($debtorIds);
        $investorId = getRandomId($investorIds);
        
        if ($debtorId && $investorId) {
            if ($amount) {
                $status = "Approved";
            } else {
                $status = "Rejected";
            }
        } elseif ($debtorId) {
            $status = "Pending";
        } else {
            $status = "Unknown"; // Handle the case where both debtor ID and investor ID are missing
        }
        
        $transactionData[] = "('$transactionId', $amount, '$debtorId', '$investorId', '$dateCreated', '$status')";
    }
}

// Prepare the SQL statement for bulk insertion
$sql = "INSERT INTO transactions (transaction_id, amount, debtor_id, investor_id, date_created, status) VALUES ";
$sql .= implode(", ", $transactionData);

// Create a new mysqli connection
$conn = connect();

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the SQL statement
if ($conn->query($sql) === true) {
    echo "Bulk insertion successful!";
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
