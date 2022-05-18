<?php

include "db/connection.php";

$sql = "SELECT * FROM reservation";

$result = $conn->query($sql);

$reservations = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode(['date' => date('Y-m-d H:i', strtotime($_POST['date_time'])), 'date2' => date('Y-m-d H:i')]);

if(date('Y-m-d H:i', strtotime($_POST['date_time'])) < date('Y-m-d H:i')){
    echo json_encode(['msg' => 'wrong-date']);
    return;
}

if(count($reservations) < 8) {
    echo json_encode(['msg' => 'available']);
} else {
    $available = true;
    $time = date('Y-m-d H:i', strtotime($_POST['date_time']));
    $checkTime = date('Y-m-d H:i', strtotime('-2 hours', strtotime($_POST['date_time'])));
    foreach ($reservations as $reservation) {
        $reservedTime = date('Y-m-d H:i', strtotime($reservation['date_time']));

        if(($reservedTime > $checkTime && $reservedTime < $time) || $reservedTime > $time) {
            $available = false;
        } else {
            $available = true;
            break;
        }
    }

    if($available) {
        echo json_encode(['msg' => 'available']);
    } else {
        echo json_encode(['msg' => 'not-available']);
    }
}