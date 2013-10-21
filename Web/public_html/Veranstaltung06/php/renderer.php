<?php

class Renderer {
    
    function render_item($item) {
        $g = "";
        
        $g .= '<form class="form-inline" role="form" method="POST" action="save.php">';
        $g .= '<input type="hidden" name="id" value="' . ($item ? $item->id : "") . '" />';
        $g .= '<input class="form-control" style="width:500px;margin-right:5px;" type="text" name="text" placeholder="Soo viel zu tun..." value="' . ($item ? $item->text : "") . '" />';
        if ($item) {
            $g .= '<div class="btn-group" data-toggle="buttons" style="display: inline-block;margin-right:5px;">';
            $g .= '<label class="btn btn-default' . (!$item->done_date ? ' active' : '') . '"><input type="radio" name="state" value="state_notdone" ' . (!$item->done_date ? 'checked="checked"' : '') . ' /><span class="glyphicon glyphicon-exclamation-sign"></span></label>';
            $g .= '<label class="btn btn-default' . ($item->done_date ? ' active' : '') . '"><input type="radio" name="state" value="state_done" ' . ($item->done_date ? 'checked="checked"' : '') . ' /><span class="glyphicon glyphicon-thumbs-up"></span></label>';
            $g .= '</div>';
            $g .= '<a href="delete.php?id=' . $item->id . '" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
        }
        $g .= "</form>";
        $g .= "<br/>";
        
        return $g;
    }
    
}

?>
