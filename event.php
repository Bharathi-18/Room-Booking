<?php
session_start();

$index = 0;
$i = 0;

?>

<html>

<head>
  <title>Release Tool</title>
  <!-- <link rel="stylesheet" href="style2.css" /> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

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
  </style>

</head>

<body>

  <div id="contents"></div>

  <div id="v_cal" class="container-fluid bg-light">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div id="calendar">
        </div>
      </div>
    </div>
  </div>

  <div>
    <!-- load jQuery -->

    <!-- load moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- load FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  </div>

  <script>
    $(document).ready(function() {

      display_events();

    });

    function display_events() {

      var events = new Array();
      var eve = new Array();
      var res = new Array();
      var data = new Array();
      try {

        $.ajax({

          type: 'POST',
          url: 'display_event.php',

          success: function(response) {
            console.log(response);
            response = JSON.parse(response);
            var result = response;
            console.log(result);
            $.each(result, function(i, item) {
              // var col = result[i].status;
              var color;
              colr = "#0B8043";
              events.push({
                event_id: result[i].id,
                title: result[i].name,
                start: result[i].dat,
                end: result[i].dat,
                color: colr,
                display: "yes"
              });
            })
            console.log(events);
            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
              },

              defaultDate: new Date(),
              // defaultView: 'agendaWeek',
              navLinks: true, // Click day/week names to navigate to clicked date
              eventLimit: true, // Allows drag/drop
              editable: true, // Allow "more" link when too many events
              selectable: true,
              selectHelper: true,

              select: function(start, end) {
                if (start.isAfter(moment()) || start.isBefore(moment(), 'day')) {
                  $('#calendar').fullCalendar('unselect');
                  return false;
                }
              },

              // validRange: { end:'2023-01-2'},  //this will black out the date too
              events: events,
              // eventColor: '#378006',    

              eventRender: function(event, element, view) {
                console.log("view type : " + view.type);
              },

              dayRender: function(date, cell) {
                var today = new Date();
                var current_date = $.fullCalendar.moment();
                var end = new Date();

                end.setDate(today.getDate() + 10000);

                if (date < today || date > today) {
                  cell.css("background-color", "Whitesmoke");
                }
                if (date.get('date') == current_date.get('date') && date.get('month') == current_date.get('month') && date.get('year') == current_date.get('year')) {
                  cell.css("background-color", "White");
                }
              }
            })

          }, //end success block

          error: function(xhr, exception) {
            alert(exception);
          }
        }); //end display_event ajax block	
      } catch (e) {}
    }
  </script>
</body>

</html>