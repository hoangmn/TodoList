<?php
include './config/database.php';

function createEvent($event){
    $conn = checkConnect();
    $start_time = strval(date('Y-m-d h:i:s',strtotime($event->start_time)));
    $end_time = strval(date('Y-m-d h:i:s',strtotime($event->end_time)));
    $current_time = date("Y-m-d h:i:s");
    $sql = "INSERT INTO event (title, preview, detail, start_time, end_time, created_time, updated_time, status)
            VALUES ('".$event->title."','".$event->preview."', '".$event->detail."', '".$start_time."', '".$end_time."', '". $current_time ."','".$current_time."', $event->status)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    return $sql;
}

function updateEvent($event){
//    var_dump($event); die();
    $conn = checkConnect();
    $start_time = strval(date('Y-m-d h:i:s',strtotime($event->start_time)));
    $end_time = strval(date('Y-m-d h:i:s',strtotime($event->end_time)));
    $current_time = date("Y-m-d h:i:s");
    $sql = "UPDATE event
            SET 
              title = '".$event->title."',
              preview = '".$event->preview."',
              detail = '".$event->detail."',
              start_time = '".$start_time."',
              end_time = '".$end_time."',
              updated_time = '".$current_time."',
              status = '".$event->status."'
            WHERE id = '".$event->id."'";
    if ($conn->query($sql) === TRUE) {
        echo "Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    return $sql;
}
function getEvent(){
    $conn = checkConnect();
    $eventList =  [];
    $query = "SELECT * FROM event";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $event = (object) $row;
            $eventList[] = convertEventFormat($event);
        }
    }
    return $eventList;
}
function getAllEvent(){
    $conn = checkConnect();
    $eventList =  [];
    $query = "SELECT * FROM event";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $event = (object) $row;
            $eventList[] = $event;
        }
    }
    return $eventList;
}

function getEventById($id){
    $conn = checkConnect();
    $eventList =  [];
    $query = "SELECT * FROM event WHERE id =".$id;
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $event = (object) $row;
        }
    }
    return $event;
}
/*
 * Convert to event lib format
 * */
function convertEventFormat($event){
    $newObj = new stdClass();
    $rrule = new stdClass();
    //Time convert
    $startTime = date('Y-m-d\TH:i:s',strtotime($event->start_time));
    $endTime = date('Y-m-d\TH:i:s',strtotime($event->end_time));

    $newObj->title = $event->title;
    $newObj->start =  $startTime;
    $newObj->end =  $endTime;
    switch ($event->status){
        case -1:
            $newObj->backgroundColor = "#8FA4AE";
            $newObj->borderColor = "#8FA4AE";
            break;
        case 0:
            $newObj->backgroundColor = "#E75100"; //Doing case
            $newObj->borderColor = "#E75100";

            break;
        default:
            $newObj->backgroundColor = "#E75100"; //To do case
            $newObj->borderColor = "#E75100";

    }
    return $newObj;
}