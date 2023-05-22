<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "roombooking";
$id = [];
$name = [];
$dat = [];
$n = 0;
$conn = new mysqli($host, $user, $pass, $db);
$query = "SELECT * FROM room1";
$result = $conn->query($query);
if ($result == true) {
    if ($result->num_rows > 0) {
        while ($rslt = mysqli_fetch_assoc($result)) {
            $id[$n] = $rslt["id"];
            $name[$n] = $rslt["meetName"];
            $dat[$n] = $rslt["dat"];
            $n++;
        }
    }
}

$data = [];

for ($i = 0; $i < $n; $i++) {

    $data[$i]["id"] = $id[$i];
    $data[$i]["name"] = $name[$i];
    $data[$i]["dat"] = $dat[$i];
}

echo json_encode($data);
