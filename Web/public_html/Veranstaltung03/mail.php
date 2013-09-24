<?php
   
    $headers = "From: <luethifl@students.zhaw.ch>\r\n";
    $headers .= "Reply-To: Michael Hoehn <luethifl@students.zhaw.ch>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    mail("f.luethi@focusconsulting.ch", "Dies ist kein Email.", "Genau.", $headers);
	
?>