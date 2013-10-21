<?php

require_once("item.php");

class Context {
    
    var $db;
    
    function Context() {
        $this->db = new PDO("mysql:host=localhost;dbname=webapp;charset=utf8", "webapp", "passw0rd");
    }
    
    function map($row) {
        $item = new Item();
        $item->done_date = $row["done_date"];
        $item->id = $row["id"];
        $item->text = $row["text"];
        return $item;
    }
    
    function find_all() {
        $list = [];
        foreach ($this->db->query("select * from item") as $row) {
            $list[] = $this->map($row);
        }
        return $list;
    }
    
    function find($id) {
        $stmt = $this->db->prepare("select * from item where id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->map($row[0]);
    }
    
    function save($item) {
        $stmt = null;
        if (!$item->id) {
            $stmt = $this->db->prepare("insert into item (done_date, text) values (:done_date, :text)");
        } else {
            $stmt = $this->db->prepare("update item set done_date = :done_date, text = :text where id = :id");
            $stmt->bindValue(":id", $item->id, PDO::PARAM_INT);
        }
        $stmt->bindValue(":done_date", $item->done_date, PDO::PARAM_STR);
        $stmt->bindValue(":text", $item->text, PDO::PARAM_STR);
        
        $stmt->execute();
        
        if (!$item->id) {
            $item->id = $this->db->lastInsertId();
        }
        
        echo $item->id;
    }
    
    function delete($item) {
        $stmt = $this->db->prepare("delete from item where id = :id");
        $stmt->bindValue(":id", $item->id, PDO::PARAM_INT);
        
        $stmt->execute();
    }
    
}

?>
