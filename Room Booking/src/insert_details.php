<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "roombooking";
$tablename = "roomsdetails";
$dat = $_POST["date"];
$from_Time = $_POST["from_Time"];
$to_Time = $_POST["to_Time"];
$roomname = $_POST["room_name"];
$meetname = $_POST["meet_name"];
$desc = $_POST["description"];
$noofprsn = $_POST["noofprsn"];

// $dat = '2023-07-14';
// $from_Time = '16:00:00';
// $to_Time = '17:00:00';
// $roomname = 'room1';
// $meetname = 'intern';
// $desc = '';
// $noofprsn = 4;

if ($desc === "") {
    $desc = "Nil";
}

$conn = new mysqli($host, $user, $pass, $db);

$insert_query = "INSERT into " . $roomname . "(meetname, description, noOfPrsn, dat, fromTime, toTime) value('" . $meetname . "','" . $desc . "'," . $noofprsn . ",'" . $dat . "','" . $from_Time . "','" . $to_Time . "');";

echo $insert_query;

if ($conn->query($insert_query) === TRUE) {
    echo "record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
