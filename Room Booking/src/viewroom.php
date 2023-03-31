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
    <div class="room">
        <h1>ROOMS</h1>
    </div>

    <div class="availableRooms">

        <?php

        function printVal(): string
        {
            return "hi";
        }

        ?>

        <?php
        // $host = "localhost";
        // $user = "root";
        // $pass = "";
        // $db = "room";
        // $conn = new mysqli($host, $user, $pass, $db);
        // $query = "SELECT * FROM roomdetails";
        // $result = $conn->query($query);
        // $count = 0;

        // if ($result == true) {
        //     if ($result->num_rows > 0) {
        //         while ($rslt = mysqli_fetch_assoc($result)) {

        //             //  $query = "SELECT * FROM roomdetails";
        //             // $result1 = $conn->query($query);

        //             if ($count != 0 && $count % 3 == 0) {
        //                 echo    "</div><br><br><div class=\"availableRooms\">";
        //                 echo    "<div class=\"card\">
        //                     <div class=\"inner-card\">";
        //                 $query = "SELECT * FROM " . $rslt['roomName'];
        //                 $result1 = $conn->query($query);
        //                 $subCount = 0;

        //                 while ($subCount <= 2 && $rslt1 = mysqli_fetch_assoc($result1)) {

        //                     // echo "" . $rslt1['meetName'] . " - ";
        //                 }

        //                 echo "</div>
        //                     <div class=\"roomname\"><h3>" . $rslt['roomName'] . "</h3></div>
        //                 </div><br><br>";
        //             } else {
        //                 echo    "<div class=\"card\">
        //                     <div class=\"inner-card\">
        //                        <h3> " . printVal() . " </h3>                           </div>
        //                     <div class=\"roomname\"><h3>" . $rslt['roomName'] . "</h3></div>
        //                 </div><br><br>";
        //             }
        //         }
        //     }
        // }

        for ($i = 0; $i < 9; $i++) {
            if ($i != 0 && $i % 3 == 0) {
                echo    "</div><br><br><div class=\"availableRooms\">";
                echo    "<div class=\"card\">
                        <div class=\"inner-card\">
                            hi
                        </div>
                        <div class=\"roomname\"><h3> Bharathi </h3></div>

                    </div><br><br>";
            } else {
                echo    "<div class=\"card\">
                        <div class=\"inner-card\">
                            hi  
                        </div>                     
                        <div class=\"roomname\"><h3> Bharathi </h3></div>
                    </div>
                    <br><br>";
            }
        }

        ?>
    </div>
    <br><br><br>
</body>

</html>