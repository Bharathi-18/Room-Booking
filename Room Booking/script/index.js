function navigateToViewRoom() {
  window.location.href = "../src/viewroom.php";
}

function navigateToBookRoom() {
  window.location.href = "../src/bookroom.php";
}

function navigateBack() {
  window.location.href = "../src/index.php";
}

function cardSelected(e) {
  // console.log(e);
  window.location.href = "../src/room.php?roomname=" + e;
}

function enableInput() {

  // document.getElementById("roomname").disabled = false
  var dat = document.getElementById("dateInput").value;
  var from_time = document.getElementById("fromtimeInput").value;
  var to_time = document.getElementById("totimeInput").value;

  console.log(dat + "  " + from_time + "   " + to_time);
  if (dat !== "" && from_time !== "" && to_time !== "") {
    if (from_time < to_time) {
      var room_selection = document.getElementById("roomname");
      var meetname = document.getElementById("meetname");
      var description = document.getElementById("description");
      var noofprsn = document.getElementById("noofprsn");

      try {
        $.ajax({
          type: 'POST',
          url: 'fetchroom.php',
          data: {
            date: dat,
            from_Time: from_time + ":00",
            to_Time: to_time + ":00"
          },

          success: function (response) {
            console.log(response)
            response = JSON.parse(response)
            var result = response
            // console.log("result : " + result[0]);
            if (result[0] === "No room") {
              room_selection.disabled = true
              meetname.disabled = true
              meetname.value = ""
              description.disabled = true
              description.value = ""
              noofprsn.disabled = true
              noofprsn.value = ""
              alert("No rooms available!!!")

            } else {
              room_selection.disabled = false
              meetname.disabled = false
              description.disabled = false
              noofprsn.disabled = false
              room_selection.innerHTML = room_selection
              // room_selection.innerHTML += '<option value = "" disabled selected hidden>choose room</option>'
              response.forEach(element => {
                room_selection.innerHTML += ('<option value = "' + element + '" >' + element + "</option>");
              });

            }
          },
          error: function (xhr, exception) {
            alert(exception);
          }
        });

      } catch (e) {

      }
    } else {
      alert("Not a valid duration")
    }
  } else {
    alert("Fill all the fields");
  }
}

function createMeet() {

  var dat = document.getElementById("dateInput").value;
  var from_time = document.getElementById("fromtimeInput").value;
  var to_time = document.getElementById("totimeInput").value;
  var room_selection = document.getElementById("roomname").value;
  var meetname = document.getElementById("meetname").value;
  var description = document.getElementById("description").value;
  var noofprsn = document.getElementById("noofprsn").value;

  if (room_selection !== "" && meetname !== "" && noofprsn !== "") {

    try {

      $.ajax({

        type: 'POST',
        url: 'insert_details.php',
        data: {
          date: dat,
          from_Time: from_time + ":00",
          to_Time: to_time + ":00",
          meet_name: meetname,
          description: description,
          noofprsn: noofprsn,
          room_name: room_selection
        },

        success: function (response) {

          alert("Meet Scheduled Successfully");
          document.getElementById("dateInput").value = "";
          document.getElementById("fromtimeInput").value = "";
          document.getElementById("totimeInput").value = "";
          document.getElementById("roomname").value = "";
          document.getElementById("meetname").value = "";
          document.getElementById("description").value = "";
          document.getElementById("noofprsn").value = "";
        },

        error: function (xhr, exception) {

          console.log(exception)
          alert("Something went wrong");

        }

      });

    } catch (error) {

    }

  } else {
    alert("Fill all the required details")
  }

}











// not in use ||


// function display_events(room_name, calendar_id) {
//   var events = new Array();
//   var eve = new Array();
//   var res = new Array();
//   var data = new Array();
//   try {
//     $.ajax({

//       type: 'POST',
//       url: 'display_event.php',
//       data: {
//         room_name: room_name
//       },

//       success: function (response) {
//         console.log(response);
//         response = JSON.parse(response);
//         var result = response;
//         console.log(result);

//         $.each(result, function (i, item) {
//           // var col = result[i].status;
//           var color;
//           colr = "#0B8043";
//           console.log("EVENT");

//           events.push({
//             event_id: result[i].id,
//             title: result[i].name,
//             start: result[i].dat,
//             end: result[i].dat,
//             color: colr,
//             display: "yes"
//           });
//         })
//         console.log(events);

//         $('#' + calendar_id).fullCalendar({
//           header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'month,agendaWeek,agendaDay,listWeek'
//           },

//           defaultDate: new Date(),
//           // defaultView: 'agendaWeek',
//           navLinks: true, // Click day/week names to navigate to clicked date
//           eventLimit: true, // Allows drag/drop
//           editable: true, // Allow "more" link when too many events
//           selectable: true,
//           selectHelper: true,

//           select: function (start, end) {
//             if (start.isAfter(moment()) || start.isBefore(moment(), 'day')) {
//               $('#' + calendar_id).fullCalendar('unselect');
//               return false;
//             }
//           },

//           // validRange: { end:'2023-01-2'},  //this will black out the date too
//           events: events,
//           // eventColor: '#378006',    

//           eventRender: function (event, element, view) {
//             console.log("view type : " + view.type);
//           },

//           dayRender: function (date, cell) {
//             var today = new Date();
//             var current_date = $.fullCalendar.moment();
//             var end = new Date();

//             end.setDate(today.getDate() + 10000);

//             if (date < today || date > today) {
//               cell.css("background-color", "Whitesmoke");
//             }
//             if (date.get('date') == current_date.get('date') && date.get('month') == current_date.get('month') && date.get('year') == current_date.get('year')) {
//               cell.css("background-color", "White");
//             }
//           }
//         })
//         console.log("End of success");
//       }, //end success block

//       complete: function () {
//         $('#' + calendar_id).fullCalendar("refetchEvents");
//       },
//       error: function (xhr, exception) {
//         alert(exception);
//       }
//     }); //end display_event ajax block



//   } catch (e) {}
//   // $('#calendar').fullCalendar("updateEvent", event);

//   //   $('#calendar').fullCalendar("addEventSource", events);

// }