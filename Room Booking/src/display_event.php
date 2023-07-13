<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "roombooking";
$id = [];
$name = [];
$dat = [];
$time = [];
$prsn = [];
$desc = [];
$n = 0;
$room_name = $_POST["room_name"];
// $room_name = "room1";
$conn = new mysqli($host, $user, $pass, $db);
$query = "SELECT * FROM " . $room_name;
$result = $conn->query($query);
if ($result == true) {
    if ($result->num_rows > 0) {
        while ($rslt = mysqli_fetch_assoc($result)) {
            $id[$n] = $rslt["id"];
            $name[$n] = $rslt["meetname"];
            $dat[$n] = $rslt["dat"];
            $time[$n] = $rslt["fromTime"] . " - " . $rslt["toTime"];
            $prsn[$n] = $rslt["noOfPrsn"];
            $desc[$n] = $rslt["description"];
            $n++;
        }
    }
}

$data = [];

for ($i = 0; $i < $n; $i++) {

    $data[$i]["id"] = $id[$i];
    $data[$i]["name"] = $name[$i];
    $data[$i]["dat"] = $dat[$i];
    $data[$i]["time"] = $time[$i];
    $data[$i]["prsn"] = $prsn[$i];
    $data[$i]["desc"] = $desc[$i];
}

echo json_encode($data);
