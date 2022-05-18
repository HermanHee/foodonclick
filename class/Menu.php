<?php


class Menu {

    public function categories() {
        global $conn;

        $sql = "SELECT * FROM categories";

        $result = $conn->query($sql);

        $categories = $result->fetch_all(MYSQLI_ASSOC);

        return !empty($categories) ? $categories : false;
    }

    public function foods($cat_id) {
        global $conn;

        $sql = "SELECT * FROM foods WHERE cat_id = {$cat_id}";

        $result = $conn->query($sql);

        $foods = $result->fetch_all(MYSQLI_ASSOC);

        return !empty($foods) ? $foods : false;
    }

    public function getFood($id) {
        global $conn;

        $sql = "SELECT * FROM foods WHERE id = {$id}";

        $result = $conn->query($sql);

        $food = $result->fetch_assoc();

        return !empty($food) ? $food : false;
    }

    public function deleteMenu($id){
        global $conn;
        $sql = "DELETE FROM foods WHERE id = {$id}";
        return $conn->query($sql);
    }

    public function create($category, $name, $price, $image){
        global $conn;
        $sql = sprintf("INSERT INTO foods (cat_id, name, img, price) VALUES ('%s', '%s', '%s', '%s')", $category, $name, $image, $price);
        return $conn->query($sql);
    }
	
	public function edit($id, $category, $name, $price, $image = null){
        global $conn;
        if($image)
            $sql = sprintf("UPDATE foods SET cat_id = '%s', name = '%s', price = '%s', img = '%s' WHERE id = '%s'", $category, $name, $price, $image, $id);
        else
            $sql = sprintf("UPDATE foods SET cat_id = '%s', name = '%s', price = '%s' WHERE id = '%s'", $category, $name, $price, $id);
        return $conn->query($sql);
    }
}