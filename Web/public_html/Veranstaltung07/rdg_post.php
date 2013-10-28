<?php

require_once("config.php");
require_once("post.php");

class rdg_Post {
    var $id;
    var $created;
    var $title;
    var $content;
    
    static function __db() {
        return new PDO(DATA_SOURCE, USER, PWD);
    }
    
    static function findByID($id) {
        $stmt = rdg_Post::__db()->prepare("select * from `tbl_post` where `id` = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $post = new rdg_Post();
        
        $post->$id = $row["id"];
        $post->created = $row["created"];
        $post->title = $row["title"];
        $post->content = $row["content"];
        
        return $post;
        
    }
    
    static function findAll() {
        $stmt = rdg_Post::__db()->prepare("select * from `tbl_post`");
        $stmt->execute();
        
        $list = [];
        foreach ($stmt->fetchAll() as $row) {
            $post = new rdg_Post();
        
            $post->id = $row["id"];
            $post->created = $row["created"];
            $post->title = $row["title"];
            $post->content = $row["content"];
            $list[] = $post;
        }
        
        return $list;
        
    }
    function insert() {
        
        if ($this->id) {
            throw new Exception("Row has already been inserted.");
        }
        
        $db = rdg_Post::__db();
        $stmt = $db->prepare("insert into `tbl_post` (`created`, `title`, `content`) values (:created, :title, :content)");
        $stmt->bindValue(":created", $this->created);
        $stmt->bindValue(":title", $this->title);
        $stmt->bindValue(":content", $this->content);
        
        $stmt->execute();
        
        $this->id = $db->lastInsertId();
    }
    
    function update() {
        if (!$this->id) {
            throw new Exception("Row has not been inserted yet.");
        }
        
        $db = rdg_Post::__db();
        $stmt = $db->prepare("update `tbl_post` set `created` = :created, `title` = :title, `content` = :content where `id` = :id");
        $stmt->bindValue(":created", $this->created);
        $stmt->bindValue(":title", $this->title);
        $stmt->bindValue(":content", $this->content);
        $stmt->bindValue(":id", $this->id);
        
        $stmt->execute();
    }
    
    function delete() {
        if (!$this->id) {
            throw new Exception("Row has not been inserted yet.");
        }
        
        $db = rdg_Post::__db();
        $stmt = $db->prepare("delete from `tbl_post` where `id` = :id");
        $stmt->bindValue(":id", $this->id);
        
        $stmt->execute();
    }
    
}

?>
