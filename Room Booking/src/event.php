<?php
session_start();

$index = 0;
$i = 0;

// $room_Name = $_GET['roomname'];
// echo $room_Name ;
?>

<html>

<head>
  <title>Calendar View</title>
  <!-- <link rel="stylesheet" href="style2.css" /> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="/Room Booking/script/index.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style>
    #v_cal {
      height: 600px;
      width: 600px;
    }

    #calendar {
      height: 580px;
      width: 580px;
      text-decoration: none;
    }

    #calendar1 {
      height: 580px;
      width: 580px;
      text-decoration: none;
    }
  </style>

</head>

<body>

  <div id="contents"></div>

  <div id="v_cal" class="container-fluid bg-light">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div id="calendar">
          <script type="text/javascript">
            var roomName = 'room1';
            display_events(roomName, 'calendar');
          </script>
        </div>
      </div>
    </div>
  </div>

</body>

</html>