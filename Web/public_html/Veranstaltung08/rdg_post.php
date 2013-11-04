<?php

require_once("config.php");

class rdg_Post {
    var $id;
    var $created;
    var $title;
    var $content;
    var $ver = 0;
    
    static function __db() {
        return new PDO(DATA_SOURCE, USER, PWD);
    }
    
    static function findByID($id) {
        $stmt = rdg_Post::__db()->prepare("select * from `tbl_post` where `id` = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $post = new rdg_Post();
        
        $post->id = $row["id"];
        $post->created = $row["created"];
        $post->title = $row["title"];
        $post->content = $row["content"];
        $post->ver = $row["ver"];
        
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
            $post->ver = $row["ver"];
            $list[] = $post;
        }
        
        return $list;
        
    }
    function insert() {
        
        if ($this->id) {
            throw new Exception("Row has already been inserted.");
        }
        
        $db = rdg_Post::__db();
        $stmt = $db->prepare("insert into `tbl_post` (`created`, `title`, `content`, `ver`) values (:created, :title, :content, 0)");
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
        
        $original = rdg_Post::findByID($this->id);
        if ($original->ver != $this->ver) {
            throw new Exception("Row has been modified in the meantime.");
        }
        
        $db = rdg_Post::__db();
        $stmt = $db->prepare("update `tbl_post` set `created` = :created, `title` = :title, `content` = :content, `ver` = `ver` + 1 where `id` = :id");
        $stmt->bindValue(":created", $this->created);
        $stmt->bindValue(":title", $this->title);
        $stmt->bindValue(":content", $this->content);
        $stmt->bindValue(":id", $this->id);
        
        $stmt->execute();
        
        $this->ver++;
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
