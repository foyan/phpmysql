<?php
    $page = $_REQUEST["page"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--[if lt IE 9]><script src="js/libs/html5shiv-r29/html5shiv.js"></script><![endif]-->
        <link type="text/css" href="css/kill_everything_that_moves.css" rel="stylesheet" />
        <!--[if lt IE 9]><link type="text/css" href="css/winternetz_explorer.css" rel="stylesheet" /><![endif]-->
        <link type="text/css" href="css/default.css" rel="stylesheet" />
    </head>
    <body>


        <header>
            Dies ist keine Website.
            <nav>
                <ul>
                    <li><a href="?page=Oans">Hier gehts....</a>
                    <li><a href="?page=Zwoa">...nicht....</a>
                    <li><a href="?page=Draa">...weiter.</a>
                </ul>
            </nav>
            <?php echo $page; ?>
        </header>

        <article>
            <h1>Iterant</h1>
            <?php include("php/array_iterator.php"); ?>
        </article>
        
        <article>
            <h1>Div-by-Z (nicht)</h1>
            <?php include("php/div_by_zero_nicht.php"); ?>
        </article>
        
                <article>
            <h1>Bewertung</h1>
            <?php include("php/switch_case.php"); ?>
        </article>
        
        <article>
            <h1>Ubörschrift.</h1>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </article>

        <article>
            <h1>E vs B</h1>
            <video style="opacity:0.5"
                autoplay="autoplay"
                width="100%"
                src="media/Sesame_Street_Ernie_And_Bert_Meet_The_Martiansmp4.mp4"></video>
        </article>

        <article>
            <h1>Der 2. Artikel.</h1>
            <p>s a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
        </article>
        
        <article>
            <h1>Ubörschrift 4</h1>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </article>

        <article>
            <h1>Ubörschrift 5</h1>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </article>

        <aside>Links und rechts und irgendwo dazwischen</aside>
      
        <footer>
            Das ist der Footer.
        </footer>

    </body>
</html>
