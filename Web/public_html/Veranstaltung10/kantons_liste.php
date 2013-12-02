<?php

class KantonsListe {
    
    private function __construct() {
        // singleton!
        // http://i.stack.imgur.com/Dzdio.png
    }
    
    private static $_instance = null;
    
    function getInstance() {
        if (KantonsListe::$_instance === null) {
            KantonsListe::$_instance = new KantonsListe();
        }
        return KantonsListe::$_instance;
    }
    
    
    
}

?>
