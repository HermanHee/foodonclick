<?php


class Reservation {

    private $id, $fname, $lname, $contact, $email, $pax, $date_time;

    public function __construct($fname, $lname, $contact, $email, $pax, $date_time) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->contact = $contact;
        $this->email = $email;
        $this->pax = $pax;
        $this->date_time = $date_time;
    }

    public function addReservation() {

        global $conn;

        $sql = "INSERT INTO reservations(fname, lname, contact, email, pax, date_time) VALUES 
               ('$this->fname', '$this->lname', '$this->contact', '$this->email', 
                '$this->pax', '$this->date_time')";

        if ($conn->query($sql) === TRUE) {
            $message = "Order created successfully!";
//            echo $message;
            return $this->id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function addPreOrder($reservationID, $itemID, $qty, $price) {

        global $conn;

        $sql = "INSERT INTO reserv_order (reservation_id, item_id, qty, price) VALUES ({$reservationID}, {$itemID}, {$qty}, {$price})";

        if ($conn->query($sql) === TRUE) {
            $message = "Order created successfully!";
//            echo $message;
//            $this->id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    public static function getReservation($duration){
        global $conn;
        $sql = sprintf("SELECT * FROM reservations WHERE date_time >= '%s' AND date_time <= '%s'", $duration['start_date'], $duration['end_date']);
        return $conn->query($sql);
    }

}