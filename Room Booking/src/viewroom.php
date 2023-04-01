<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view room</title>
    <link href='https://fonts.googleapis.com/css?family=Saira' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/viewroom.css">
    <script src="../script/index.js"></script>
</head>

<body>
    <nav class="navBar">
        <h1>ROOM BOOKING</h1>
    </nav>
    <div class="backBtn">
        <button onclick="navigateBack()">BACK</button>
    </div>
    <!-- <br><br><br> -->
    <div class="room">
        <h1>ROOMS</h1>
    </div>
    <?php

    function printVal(): string
    {
        return "hi";
    }

    ?>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "room";
    $conn = new mysqli($host, $user, $pass, $db);
    $query = "SELECT * FROM roomdetails";
    $result = $conn->query($query);
    $count = 0;

    if ($result == true) {
        if ($result->num_rows > 0) {
            while ($rslt = mysqli_fetch_assoc($result)) {

                if ($count == 0) {
                    echo "<div class=\"availableRooms\">";
                }

                if ($count != 0 && $count % 3 == 0) {
                    echo    "</div><br><br><div class=\"availableRooms\">";
                }
                $query = "SELECT * FROM " . $rslt['roomName'] . " ORDER BY DAT, fromTime";
                $result1 = $conn->query($query);
                if ($result1 == true && $result1->num_rows > 0) {
                    echo    "<div class=\"card\" id = \"enableHover\"  onclick=cardSelected(\"" . $rslt['roomName'] . "\")>
                            <div class=\"inner-card\" id= \"enableHover\" onclick=cardSelected(\"" . $rslt['roomName'] . "\")>";
                    $subCount = 0;

                    while ($rslt1 = mysqli_fetch_assoc($result1)) {
                        $subCount++;
                        if ($subCount == 3) {
                            echo "<p class=\"listOfAppointments\">......</p>";
                            break;
                        }
                        echo "<p class=\"listOfAppointments\">" . $rslt1['meetName'] . " - <b>" . $rslt1['dat'] . "</b><p><br>";
                    }
                } else {
                    echo    "<div class=\"card\">
                            <div class=\"inner-card\">";
                    echo "<p class=\"listOfAppointments\"><b>No Meetings ....</b><p><br>";
                }
                echo "</div>
                            <div class=\"roomname\"><h3>" . $rslt['roomName'] . "</h3></div>
                        </div>";
                $count++;
            }
        }
    }

    // for ($i = 0; $i < 3; $i++) {
    //     if ($i != 0 && $i % 3 == 0) {
    //         echo    "</div><br><br><div class=\"availableRooms\">";
    //     }
    //     echo    "<div class=\"card\">
    //                 <div class=\"inner-card\">
    //                     <p class=\"listOfAppointments\">Lorem ipsum dolor sit amet, consectetuer adipiscin - 31.03.2023</p>
    //                 </div>                     
    //                 <div class=\"roomname\"><h3> Bharathi </h3></div>
    //             </div>
    //             <br><br>";
    // }

    ?>
    </div>
    <br><br><br>
</body>

</html>