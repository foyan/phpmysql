<?php

require_once("renderer.php");
require_once("context.php");
require_once("item.php");

$context = new Context();
$renderer = new Renderer();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>somos TODOs juntos en grupos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/default.css" rel="stylesheet" media="screen">

        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div id="wrap">

            <div class="container">
                <div class="page-header">
                    <h1>somos TODOs juntos en grupos</h1>
                </div>
                    
                <?php
                    foreach ($context->find_all() as $item) {
                        echo $renderer->render_item($item);
                    }

                    echo $renderer->render_item(null);
                ?>
                                    
            </div>
        </div>

        <div id="footer">
            <div class="container">
                <p class="text-muted credit">Es ist einfacher als man denkt...</a>.</p>
            </div>
        </div>

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script>
            $(function () {
                $('input[type=radio]').change(function() {
                    $(this).closest("form").submit();
                });
            });
        </script>

    </body>
</html>
