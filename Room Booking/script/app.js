let calendar = document.querySelector('.calendar')
var result="";
var events = [];
var events_date = [];
var event_name = [];
var event_time = [];
var event_prsn = [];
var event_desc = []
var index = 0;

//SELECT COUNT(*) AS num FROM room1 WHERE dat = '2023-07-18' and (fromTime >= '16:00:00' or fromTime <= '17:00:00' or toTime >= '16:00:00' or toTime <= '17:00:00');

try {
    $.ajax({

        type: 'POST',
        url: 'display_event.php',
        data: {
        room_name: 'room1'
        },

        success: function(response) {
        // console.log(response);
        response = JSON.parse(response);
        result = response;
        console.log(result);
        
        $.each(result, function(i, item) {
            // var col = result[i].status;
            colr = "#0B8043";
            console.log("EVENT");
                events_date[index] = result[i].dat
                event_name[index] = result[i].name
                event_time[index] = result[i].time
                event_prsn[index] = result[i].prsn
                event_desc[index] = result[i].desc
                // console.log(result[i].dat+" "+result[i].name+" "+result[i].time+" "+result[i].prsn+" ")
            index++
        })

       events.push(events_date)
       events.push(event_name)
       events.push(event_time)
       events.push(event_prsn)
       events.push(event_desc)

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

        isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
        }

        getFebDays = (year) => {
            return isLeapYear(year) ? 29 : 28
        }

        printVal = (temp_date) => {
            console.log(temp_date)
        }

        generateCalendar = (month, year, events) => {

            let calendar_days = calendar.querySelector('.calendar-days')
            let calendar_header_year = calendar.querySelector('#year')

            let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

            calendar_days.innerHTML = ''

            let currDate = new Date()

            let curr_month = `${month_names[month]}`
            month_picker.innerHTML = curr_month
            calendar_header_year.innerHTML = year

            console.log(month)  
            console.log(year)

            console.log(events);

            let first_day = new Date(year, month, 1)
            console.log("First Day : "+first_day);
            console.log("First Day : "+first_day.getDay());
            for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                
                let day = document.createElement('div')
                console.log(i+1-first_day.getDay());
                var temp_date = ""+year+"-"
                var temp_month = ""+(month+1)
                var temp_day = ""

                if((month+1)<10)
                {
                    temp_month = "0"+(month+1)
                }
                temp_date += temp_month+"-"
                var temp = i - first_day.getDay() + 1
                if(temp<10)
                {
                    temp = "0"+temp
                }
                temp_date += temp
                if (i >= first_day.getDay()) {
                    day.classList.add('calendar-day-hover')
                    day.setAttribute('value',temp_date)
                    events[0].forEach(element => {
                            if(element===temp_date)
                            {
                                day.style.color = "red"
                                day.style.fontWeight = "bold"
                            }
                    });
                    day.innerHTML = i - first_day.getDay() + 1
                    day.innerHTML += `<span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>`
                    if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                        day.classList.add('curr-date')
                    }
                }

                calendar_days.appendChild(day)
            }
        }
        
        let month_list = calendar.querySelector('.month-list')
        console.log("Result : "+events);

        month_names.forEach((e, index) => {
            let month = document.createElement('div')
            month.innerHTML = `<div data-month="${index}">${e}</div>`
            month.querySelector('div').onclick = () => {
                month_list.classList.remove('show')
                curr_month.value = index
                generateCalendar(index, curr_year.value,events)
            }
            month_list.appendChild(month)
        })

        let month_picker = calendar.querySelector('#month-picker')

        month_picker.onclick = () => {
            
            month_list.classList.add('show')
        }

        let currDate = new Date()

        let curr_month = {value: currDate.getMonth()}
        let curr_year = {value: currDate.getFullYear()}

        generateCalendar(curr_month.value, curr_year.value,events)

        document.querySelector('#prev-year').onclick = () => {
            --curr_year.value
            generateCalendar(curr_month.value, curr_year.value,events)
        }

        document.querySelector('#next-year').onclick = () => {
            ++curr_year.value
            generateCalendar(curr_month.value, curr_year.value,events)
        }

        let dark_mode_toggle = document.querySelector('.dark-mode-switch')

        dark_mode_toggle.onclick = () => {
            document.querySelector('body').classList.toggle('light')
            document.querySelector('body').classList.toggle('dark')
        }

        //circle the selected date

        var isCircling = false;

        // Function to handle the initial click on the div
        function handleClick(event) {
        if (!isCircling) {
            isCircling = true;
            var div = document.getElementById("myDiv");
            var rect = div.getBoundingClientRect();
            var centerX = rect.left + rect.width / 2;
            var centerY = rect.top + rect.height / 2;

            // Create a circle element
            var circle = document.createElement("div");
            circle.className = "circle";

            // Set initial position of the circle
            circle.style.left = centerX - 10 + "px";
            circle.style.top = centerY - 10 + "px";

            // Append the circle to the body
            document.body.appendChild(circle);

            // Add event listener to handle clicks outside the div
            document.addEventListener("click", handleOutsideClick);
        }
        }

        // Function to handle clicks outside the div
        function handleOutsideClick(event) {
            var evnts = document.getElementById("events");
            evnts.style.visibility = "visibile";  
        var div = document.getElementById("myDiv");
        var circle = document.querySelector(".circle");

        // Check if the click occurred outside the div
        if (!div.contains(event.target)) {
            // Remove the circle
            circle.parentNode.removeChild(circle);

            // Reset the circling state
            isCircling = false;

            // Remove the event listener
            document.removeEventListener("click", handleOutsideClick);
        }
        }

        goToFunction = (curr_m = new Date().getMonth(),curr_y = new Date().getFullYear()) => {
    
            // let currDate = new Date()

            // let curr_month = {value: currDate.getMonth()}
            // let curr_year = {value: currDate.getFullYear()}

            generateCalendar(curr_m, curr_y, events)

        }

        event_selection = () =>{
  
            var divElements = document.getElementsByClassName("calendar-day-hover");

            // Attach a click event listener to each div element
            for (var i = 0; i < divElements.length; i++) {
            divElements[i].addEventListener("click", function() {
                var value = this.getAttribute("value");
                var index = 0;
                var length = events[0].length;
                console.log(length)
                var event_body = document.getElementById("event-body");
                event_body.innerHTML = ""
                var newContent = document.createElement("p");
                for(let i=0;i<length;i++)
                {
                    console.log(events[0][i]+" -- "+value)
                    if(events[0][i]===value)
                    {
                        event_body.innerHTML += "<p>Event Name   -- " + events[1][i] + "</p>";
                        event_body.innerHTML += "<p>Event time   -- " + events[2][i] + "</p>";
                        event_body.innerHTML += "<p>Person count -- " + events[3][i] + "</p>";
                        event_body.innerHTML += "<p>Description  -- " + events[4][i] + "</p><br><hr><hr><br>";
                        index++;
                    }
                }
                if(index===0)
                {
                    var newContent = document.createElement("p");
                    newContent.textContent = "No Events to display"
                    event_body.appendChild(newContent)
                }
            });
        }
        }

        },
        error: function(xhr, exception) {
            alert(exception);
            console.log(exception);
        }
    });
}
catch(e)
{
    console.log(e);
}
