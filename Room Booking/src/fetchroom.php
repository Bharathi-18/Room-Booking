<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "roombooking";
$tablename = "roomsdetails";
$dat = $_POST["date"];
$from_Time = $_POST["from_Time"];
$to_Time = $_POST["to_Time"];
$room_name = [];
$index = 0;

$conn = new mysqli($host, $user, $pass, $db);

$query = "SELECT * FROM roomsdetails";
$result = $conn->query($query);

if ($result == true) {
    if ($result->num_rows > 0) {
        while ($rslt = mysqli_fetch_assoc($result)) {

            $sub_query = "SELECT COUNT(*) as CNT FROM " . $rslt["roomName"] . " WHERE (dat = '" . $dat . "' and ((fromTime <= '" . $from_Time . "' and  toTime >= '" . $from_Time . "') or (fromTime <= '" . $to_Time . "' and  toTime >= '" . $to_Time . "') ))";

            $subquery_result = $conn->query($sub_query);

            if ($subquery_result == true && $subquery_result->num_rows > 0) {
                while ($rslt1 = mysqli_fetch_assoc($subquery_result)) {
                    if ($rslt1["CNT"] == 0) {
                        $room_name[$index++] = $rslt["roomName"];
                    }
                }
            }
        }
    }
}

if ($index == 0) {
    $room_name[0] = "No room";
}


echo json_encode($room_name);
