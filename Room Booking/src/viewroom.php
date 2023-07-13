<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view room</title>
    <link href='https://fonts.googleapis.com/css?family=Saira' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/viewroom.css">

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="../script/index.js"></script>

</head>

<body>
    <nav class="navBar">
        <img class="logo" onclick="navigateBack()" src="../images/logo.jpeg" alt="back">
        <h1 class="webTitle" onclick="navigateBack()">MEET ROOM BOOKING</h1>
        <button>BOOK ROOMS</button>
    </nav>
    <div class="content">
        <div class="room">
            <h1>ROOMS</h1>
        </div>

        <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "roombooking";
        $conn = new mysqli($host, $user, $pass, $db);
        $query = "SELECT * FROM roomsdetails";
        $result = $conn->query($query);
        $count = 0;

        if ($result == true) {
            if ($result->num_rows > 0) {
                while ($rslt = mysqli_fetch_assoc($result)) {

                    if ($count == 0) {
                        echo "<div class=\"availableRooms\">";
                    }

                    if ($count != 0 && $count % 1 == 0) {
                        echo    "</div><br><br><div class=\"availableRooms\">";
                    }
                    $query = "SELECT * FROM " . $rslt['roomName'] . " ORDER BY dat, fromTime";
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
                            echo "<p class=\"listOfAppointments\">" . $rslt1['meetname'] . " - <b>" . $rslt1['dat'] . "</b></p><br>";
                        }
                    } else {
                        echo    "<div class=\"card\">
                            <div class=\"inner-card\">";
                        echo "<p class=\"listOfAppointments\"><b>No Meetings ....</b></p><br>";
                    }

                    echo "</div>
                        </div>
                        <div class=\"roomname\" onclick=cardSelected(\"" . $rslt['roomName'] . "\")><h3>" . $rslt['roomName'] . "</h3></div>";
                    $count++;
                }
            }
        }
        ?>
    </div>
    </div>
    <br><br><br>

</body>

</html>