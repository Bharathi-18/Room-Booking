<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Calendar
    </title>
    <link rel="stylesheet" href="app1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

</head>

<body class="light">

    <div class="class-calendar">
        <div class="calendar">
            <div class="calendar-header">
                <span class="month-picker" id="month-picker" value="July">July</span>
                <div class="year-picker">
                    <span class="year-change" id="prev-year">
                        <pre><</pre>
                    </span>
                    <span id="year">2023</span>
                    <span class="year-change" id="next-year">
                        <pre>></pre>
                    </span>
                </div>
                <span class="month-picker1" id="month-picker1" onclick="goToFunction()">Today</span>
            </div>
            <div class="calendar-body">
                <div class="calendar-week-day">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="calendar-days"></div>
            </div>
            <div class="calendar-footer">
                <div class="toggle">
                    <span>Dark Mode</span>
                    <div class="dark-mode-switch">
                        <div class="dark-mode-switch-ident"></div>
                    </div>
                </div>
            </div>
            <div class="month-list"></div>
        </div>
        <div id="events" class="events">
            <div class="event-title">
                Events
            </div>
            <div class="event-body" id="event-body">

            </div>
        </div>
    </div>
    <script src="app1.js"></script>
    <script>
        function onPageLoad() {

            // Add event listener to the div
            var divEle = document.getElementsByClassName("calendar-day-hover");

            // Attach a click event listener to each div element
            for (var i = 0; i < divEle.length; i++) {
                divEle[i].addEventListener("click", handleClick);
            }

            event_selection();
        }

        document.addEventListener("DOMContentLoaded", onPageLoad);

        window.addEventListener("load", onPageLoad);

        var observer = new MutationObserver(function(mutations) {
            event_selection();
        });

        var config = {
            childList: true,
            subtree: true,
            attributes: true,
            characterData: true
        };

        var targetNode = document.documentElement;

        observer.observe(targetNode, config);
    </script>

</body>

</html>