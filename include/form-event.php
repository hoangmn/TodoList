<?php
include './models/Event.php';
if (isset($_POST)) {
    $newEvent = (object) $_POST;
//    echo "<pre>";
//    var_dump($newEvent); die();
    if( isset($_POST['create-event'])){
        createEvent($newEvent);
        unset($_POST);
        header('Location: '.'./index.php');
    }
    if(isset($_POST['edit-event'])){
        updateEvent($newEvent);
        unset($_POST);
        header('Location: '.'./index.php');
    }

}
if(isset($_GET['id'])){
    $eventId = $_GET['id'];
    $event = getEventById($eventId);
    $startTime = date('Y-m-d\TH:i:s',strtotime($event->start_time));
    $endTime = date('Y-m-d\TH:i:s',strtotime($event->end_time));
//    var_dump($startTime); die();
}
?>
<div class="container">
    <?php if(isset($event)){?>
        <h2>Edit Event</h2>
    <?php }else{?>
    <h2>Create Event</h2>
    <?php }?>
    <form action="form-event.php" method="post" class="needs-validation" novalidate>
        <?php if(isset($event)){?>
        <div class="form-group" style="visibility: hidden">
            <label for="id">Id:</label>
            <input type="text" class="form-control" id="id"  name="id"  value="<?= $event->id ?>" >
        </div>
        <?php }?>
        <div class="form-group">
            <label for="title">Event Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Event title" name="title" required value="<?= isset($event) ? $event->title : null ?>">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="preview">Preview:</label>
            <input type="text" class="form-control" id="preview" placeholder="Preview" name="preview" required value="<?= isset($event) ? $event->preview : null ?>">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="Detail">Detail:</label>
            <textarea type="text" class="form-control" id="Detail" placeholder="Detail" name="detail" required ><?= isset($event) ? $event->detail : null ?></textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input class="form-control" type="datetime-local" name="start_time" required value="<?= isset($event) ? $startTime : null?>">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="start_time">End Time:</label>
            <input class="form-control" type="datetime-local" name="end_time" required value="<?= isset($event) ? $endTime : null?>">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="1" <?= isset($event) && $event->status == 1 ? 'checked' : ''?>>To do
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="0" <?= isset($event) && $event->status == 0 ? 'checked' : ''?>>Doing
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="-1"  <?= isset($event) && $event->status == -1 ? 'checked' : ''?>>Done
            </label>
        </div>
        <?php if(isset($event)){?>
        <input type="submit" name="edit-event" value="Update">
        <?php }else{?>
        <input type="submit" name="create-event" value="Create">
        <?php }?>
    </form>
</div>

<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
