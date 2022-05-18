<?php


class Order {

    private $id, $fname, $lname, $contact, $email, $loc, $total_price, $item_id, $qty, $price;

    public function __construct($fname, $lname, $contact, $email, $loc, $total_price) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->contact = $contact;
        $this->email = $email;
        $this->loc = $loc;
        $this->total_price = $total_price;
    }

    public function addOrder() {

        global $conn;

        $sql = "INSERT INTO delivery_orders(fname, lname, contact, email, loc, total_price) VALUES 
               ('$this->fname', '$this->lname', '$this->contact', '$this->email', 
                '$this->loc', $this->total_price)";

        if ($conn->query($sql) === TRUE) {
            $message = "Order created successfully!";
//            echo $message;
            return $this->id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function addOrderItems($orderID, $itemID, $qty, $price) {

        global $conn;

        $sql = "INSERT INTO delivery_items (order_id, item_id, qty, price) VALUES ({$orderID}, {$itemID}, {$qty}, {$price})";

        if ($conn->query($sql) === TRUE) {
            $message = "Order created successfully!";
//            echo $message;
//            $this->id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    public static function getOrders($duration){
        global $conn;
        $sql = sprintf("SELECT * FROM delivery_orders WHERE created_at >= '%s' AND created_at <= '%s'", $duration['start_date'], $duration['end_date']);
        return $conn->query($sql);
    }
}