<?php

require_once("Mensch.php");

class Schweizer extends Mensch {
    
    function __construct($name, $geschlecht) {
        parent::_construct($name, $geschlecht);
    }
    
    public function umbenennen($name) {
        $this->behoerdengang();
        parent::umbenennen($name);
    }
    
    public function behoerdengang() {
        throw new Exception("Geduldsfaden gerissen.");
    }
    
}

?>
