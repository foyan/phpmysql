<html>
    <head>
        <link rel="stylesheet" type="text/css" href="def.css"></link>
    </head>

<body>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set("CET");

require_once("rdg_post.php");

function render($payload) {
    
    echo '<table>
        <thead><tr><th>#ID</th><th>Created</th><th>Title</th><th>Content</th><th>Ver</th></tr></thead>
        <tbody>';
    
    if (!is_array($payload)) {
        $payload = [$payload];
    }
    
    foreach ($payload as $post) {
        echo '<tr><td>' . $post->id . '</td><td>' . $post->created . '</td><td>' . $post->title . '</td><td>' . $post->content . '</td><td>' . $post->ver . '</td></tr>';
    }
        
    echo '</tbody>
        </table>
        ';
    
}


echo "<h1>Row Gateway mit optimistic locking</h1>";

echo "Let's do row gatewaying. Nothing in there, so table is empty:<br/>";
render(rdg_Post::findAll());

$post3 = new rdg_Post();
$post3->content = "Post Three Content";
$post3->title = "Post Three Title";
$post3->created = date('Y-m-d H:i:s');

$post3->insert();

echo "Inserted one. ID is " . $post3->id . ". ";

echo "Summary summarum, we got: <br/>";
render(rdg_Post::findAll());

echo "Finding just this one, we would get: <br/>";

render(rdg_Post::findByID($post3->id));

echo "Another one! <br/>";

$post4 = new rdg_Post();
$post4->content = "Post Four Content";
$post4->title = "Post Four Title";
$post4->created = date('Y-m-d H:i:s');

$post4->insert();

echo "Summary summarum, we got: <br/>";
render(rdg_Post::findAll());

echo "Let's update post 1...";

$post4->title = "4ttf";
$post4->update();
        
echo "Summary summarum, we got: <br/>";
render(rdg_Post::findAll());

echo "
<h1>Until here, this was just testing the Selbstudium 07 code with optimistic locking.</h1>
        <h1>Lock'n roll!</h1>";

echo "Let's play Process A, fetch first post...";
$postA = rdg_Post::findByID($post3->id);
render($postA);

echo "Let's play Process B, fetch first post...";
$postB = rdg_Post::findByID($post3->id);
render($postB);

echo "Process B updates post...";
$postB->content = "Yeeh-B!";
$postB->update();
render($postB);

echo "Process A updates post...<br/>";
try {
    $postA->content = "Yeehaa!";
    $postA->update();
} catch (Exception $e) {
    echo "<b>Oh nein! </b>" . $e . "<br/>";
    
    echo "Re-run transaction...";
    
    $postA = rdg_Post::findByID($post3->id);
    $postA->content = "Yeehaa! (insisting)";
    $postA->update();
    
    render($postA);
}


echo "In case there were things uncleaned, let's tidy:";
foreach (rdg_Post::findAll() as $p) {
    $p->delete();
}
render(rdg_Post::findAll());



?>

    
</body>

</html>