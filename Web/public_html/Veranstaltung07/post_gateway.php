<?php

require_once("config.php");
require_once("post.php");

class PostGateway {
    
    var $db;
    
    function PostGateway() {
        $this->db = new PDO(DATA_SOURCE, USER, PWD);
    }
    
    function map($row) {
        $post = new Post();
        $post->id = $row["id"];
        $post->created = $row["created"];
        $post->title = $row["title"];
        $post->content = $row["content"];
        return $post;
    }
    
    function findAll() {
        $stmt = $this->db->prepare("select * from `tbl_post`");
        $stmt->execute();
            
        $list = [];
        
        foreach ($stmt->fetchAll() as $row) {
            $list[] = $this->map($row);
        }
        
        return $list;
    }
    
    function findById($id) {
        $stmt = $this->db->prepare("select * from `tbl_post` where `id` = :id");
        $stmt->execute(array("id" => $id));
        return $this->map($stmt->fetch());
    }
    
    function findByAttribute($predicates) {
        $sql = "select * from `tbl_post` where";
        $delimiter = "";
        foreach ($predicates as $k => $v) {
            $sql .= " `" . $k . "` = :" . $k;
            $delimiter = " and ";
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($predicates);
        
        $list = [];
        
        foreach ($stmt->fetchAll() as $row) {
            $list[] = $this->map($row);
        }
        
        return $list;  
    }
    
    function create($post) {
        $stmt = $this->db->prepare("insert into `tbl_post` (`created`, `title`, `content`) values (:created, :title, :content)");
        $stmt->bindValue(":created", $post->created);
        $stmt->bindValue(":title", $post->title);
        $stmt->bindValue(":content", $post->content);
        
        $stmt->execute();
        
        $post->id = $this->db->lastInsertId();
    }
    
    function update($post) {
        $stmt = $this->db->prepare("update `tbl_post` set `created` = :created, `title` = :title, `content` = :content where `id` = :id");
        $stmt->bindValue(":created", $post->created);
        $stmt->bindValue(":title", $post->title);
        $stmt->bindValue(":content", $post->content);
        $stmt->bindValue(":id", $post->id);
        
        $stmt->execute();
    }
    
    function delete($post) {
        $stmt = $this->db->prepare("delete from `tbl_post` where `id` = :id");
        $stmt->bindValue(":id", $post->id);
        
        $stmt->execute();        
    }
    
}

?>
