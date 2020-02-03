<?php
/**
 * Created by PhpStorm.
 * User: ngochoangmai
 * Date: 2/1/20
 * Time: 2:17 PM
 */

include './models/Event.php';

$eventList = getEvent();


?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var eventJson = '<?php echo json_encode($eventList)?>';
        var events = JSON.parse(eventJson );

        console.log(events);
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: events
        });

        calendar.render();
    });

</script>