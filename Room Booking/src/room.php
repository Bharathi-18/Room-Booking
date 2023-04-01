<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room</title>
    <link href='https://fonts.googleapis.com/css?family=Saira' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/room.css">
    <script src="../script/index.js"></script>
</head>

<body>

    <nav class="navBar">
        <h1>ROOM BOOKING</h1>
    </nav>
    <div class="backBtn">
        <button onclick="navigateToViewRoom()">BACK</button>
    </div>
    <!-- <br><br><br> -->
    <div class="room">
        <h1><?php echo $_GET['roomname'] ?></h1>
    </div>
    <div class="availableRooms">
        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "room";
        $conn = new mysqli($host, $user, $pass, $db);
        $query = "SELECT * FROM " . $_GET['roomname'] . " ORDER BY DAT, fromTime";
        $result = $conn->query($query);
        $count = 0;

        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($rslt = mysqli_fetch_assoc($result)) {
                    if ($count != 0 && $count % 3 == 0) {
                        // echo    "</div><br><br><div class=\"availableRooms\">";
                    }

                    echo    "<div class=\"card\">
                            <div class=\"inner-card\">";
                    echo        "<table>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>Meeting Name </b> </td><td>:</td><td>" . $rslt['meetName'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>Description</b> </td><td>:</td><td>" . $rslt['description'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>No. of. Person </b> </td><td>:</td><td>" . $rslt['noOfPrsn'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>Date </b> </td><td>:</td><td>" . $rslt['dat'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>From </b> </td><td>:</td><td>" . $rslt['fromTime'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>To </b> </td><td>:</td><td>" . $rslt['toTime'] . "</td></p>";
                    echo        "<tr><td><p class=\"listOfAppointments\"><b>Duration </b> </td><td>:</td><td>" . $rslt['duration'] . "</td></p>";
                    echo        "</table>";
                    echo "</div>
                        </div><br><br>";
                }
            }
        }
        ?>
    </div>
    <br><br><br>

</body>

</html>