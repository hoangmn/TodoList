<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link href='./packages/core/main.css' rel='stylesheet' />
    <link href='./packages/bootstrap/main.css' rel='stylesheet' />
    <link href='./packages/bootstrap/bootstrap.min.css' rel='stylesheet' />
    <link href='./packages/daygrid/main.css' rel='stylesheet' />
    <link href='./packages/timegrid/main.css' rel='stylesheet' />
    <link href='./packages/list/main.css' rel='stylesheet' />
    <script src='./vendor/rrule.js'></script>
    <script src='./packages/core/main.js'></script>
    <script src='./packages/interaction/main.js'></script>
    <script src='./packages/daygrid/main.js'></script>
    <script src='./packages/timegrid/main.js'></script>
    <script src='./packages/list/main.js'></script>
    <script src='./packages/rrule/main.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'rrule' ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate: '2019-08-12',
                editable: true,
                events: [
                    {
                        title: 'rrule event',
                        rrule: {
                            dtstart: '2019-08-09T13:00:00',
                            // until: '2019-08-01',
                            freq: 'weekly'
                        },
                        duration: '02:00'
                    }
                ],
                eventClick: function(arg) {
                    if (confirm('delete event?')) {
                        arg.event.remove()
                    }
                }
            });

            calendar.render();
        });

    </script>
    <style>

        body {
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 10px auto;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light bg-dark navbar-dark">

    <!-- Links -->
    <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
        </li>
    </ul>

</nav>
<div id='calendar'></div>

</body>
</html>
