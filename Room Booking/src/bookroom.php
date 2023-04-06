<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room</title>
    <link href='https://fonts.googleapis.com/css?family=Saira' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/bookroom.css">
</head>

<body>

    <nav class="navBar">
        <img class="logo" onclick="navigateBack()" src="../images/logo.jpeg" alt="back">
        <h1 class="webTitle" onclick="navigateBack()">MEET ROOM BOOKING</h1>
        <button onclick="navigateToViewRoom()">VIEW ROOMS</button>
    </nav>

    <div class="book-form">
        <div class="firstHalf">
            <form method="post">
                <table>
                    <tr>
                        <td>DATE</td>
                        <td><input type="date" name="dat" id="dat"></td>
                        <td>FROM</td>
                        <td><input type="time" name="fromTime" id="fromTime"></td>
                        <td>TO</td>
                        <td><input type="time" name="toTime" id="toTime"></td>
            </form>
            <?php

            $dat = $_POST['dat'];
            $fromTime = $_POST['fromTime'];
            $toTime = $_POST['toTime'];

            if ($dat != "" && $fromTime != "" && $toTime != "") {

                $explodeFromTime = explode($fromTime, ":");
                $explodeToTime = explode($toTime, ":");

                $time1 = (int)$explodeFromTime[0] * 60 + (int)$explodeFromTime[1];
                $time2 = (int)$explodetoTime[0] * 60 + (int)$explodeToTime[1];

                $diffTime = $time2 - $time1;

                $explodeDate = explode($dat, "/");
                $dateVal = $explodeDate[2] . "-" . $explodeDate[1] . "-" . $explodeDate[0];
                $fromTime .= ":00";
                $toTime .= ":00";

                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "roombooking";
                $conn = new mysqli($host, $user, $pass, $db);
                $query = "SELECT * FROM roomsdetails";
                $result = $conn->query($query);
                $count = 0;
                $flag = 0;
                $roomArr = [];
                if ($result == true) {
                    if ($result->num_rows > 0) {
                        while ($rslt = mysqli_fetch_assoc($result)) {

                            $query = "SELECT * FROM " . $rslt['roomName'] . " WHERE DAT = " . $dateVal . " and fromTime > " . $toTime . " and totime > " . $fromTime;
                            $result1 = $conn->query($query);
                            if (
                                $result1 == true && $result1->num_rows > 0
                            ) {
                                $flag = 1;
                            }

                            if ($flag == 0) {
                                $roomArr[$count++] = $rslt['roomName'];
                            }
                            $flag = 0;
                        }
                    }
                }

                foreach ($roomArr as $rm) {
                    echo $rm;
                }
            }
            ?>

            </tr>
            </table>
            <!-- </form> -->
        </div>
    </div>

</body>

<script>
    function diff(start, end) {
        start = start.split(":");
        end = end.split(":");
        var startDate = new Date(0, 0, 0, start[0], start[1], 0);
        var endDate = new Date(0, 0, 0, end[0], end[1], 0);
        var diff = endDate.getTime() - startDate.getTime();
        var hours = Math.floor(diff / 1000 / 60 / 60);
        diff -= hours * 1000 * 60 * 60;
        var minutes = Math.floor(diff / 1000 / 60);

        if (hours < 0)
            hours = hours + 24;

        return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
    }

    function getInput() {
        console.log("Called");
        var dat = document.getElementById("dat").value;
        var fromTime = document.getElementById("fromTime").value;
        var toTime = document.getElementById("toTime").value;
        if (dat != "" && fromTime != "" && toTime != "") {
            console.log(diff(fromTime, toTime));
        }
    }
</script>

</html>