<?php
include './models/Event.php';
include './models/Status.php';
$eventList = getAllEvent();
//var_dump($eventList); die();
if (isset($_POST) && isset($_POST['create-event'])) {
    // do post
    $newEvent = (object) $_POST;
    createEvent($newEvent);
    unset($_POST);
    header('Location: '.'./index.php');
}
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>Preview</th>
        <th>Detail</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($eventList as $key => $value){
//        var_dump($value); die();
    ?>
        <tr>
            <td><?= $value->title?></td>
            <td><?= $value->preview?></td>
            <td><?= $value->detail?></td>
            <td><?= $value->start_time?></td>
            <td><?= $value->end_time?></td>
            <td><?= getStatusLabel($value->status)?></td>
            <td>
                <a href="form-event.php?id=<?=$value->id?>">Edit</a>
            </td>
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>
