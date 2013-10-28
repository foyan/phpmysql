<html>
    <head>
        <link rel="stylesheet" type="text/css" href="def.css"></link>
    </head>

<body>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set("CET");

require_once("post.php");
require_once("post_gateway.php");
require_once("rdg_post.php");

function render($payload) {
    
    echo '<table>
        <thead><tr><th>#ID</th><th>Created</th><th>Title</th><th>Content</th></tr></thead>
        <tbody>';
    
    if (!is_array($payload)) {
        $payload = [$payload];
    }
    
    foreach ($payload as $post) {
        echo '<tr><td>' . $post->id . '</td><td>' . $post->created . '</td><td>' . $post->title . '</td><td>' . $post->content . '</td></tr>';
    }
        
    echo '</tbody>
        </table>
        ';
    
}

$tgw = new PostGateway();

echo "<h1>Table Gateway</h1>";

echo "Let's do table gatewaying. Nothing in there, so table is empty:<br/>";
render($tgw->findAll());

$post = new Post();
$post->content = "Post One Content";
$post->title = "Post One Title";
$post->created = date('Y-m-d H:i:s');

$tgw->create($post);

echo "Inserted one. ID is " . $post->id . ". ";

echo "Summary summarum, we got: <br/>";
render($tgw->findAll());

echo "Finding just this one, we would get: <br/>";

render($tgw->findById($post->id));

echo "Another one! <br/>";

$post2 = new Post();
$post2->content = "Post Two Content";
$post2->title = "Post Two Title";
$post2->created = date('Y-m-d H:i:s');

$tgw->create($post2);

echo "Summary summarum, we got: <br/>";
render($tgw->findAll());

echo "Let's update post 1...";

$post->title = "Changed";
$tgw->update($post);
        
echo "Summary summarum, we got: <br/>";
render($tgw->findAll());

echo "Finding this one by title attribute: <br/>";

render($tgw->findByAttribute(array("title" => "Changed")));

echo "Not interesting anymore. Ciao post. <br/>";
$tgw->delete($post);
render($tgw->findAll());

echo "In case there were things uncleaned, let's tidy:";
foreach ($tgw->findAll() as $p) {
    $tgw->delete($p);
}
render($tgw->findAll());



echo "<h1>Row Gateway</h1>";

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

echo "Not interesting anymore. Ciao post. <br/>";
$post4->delete();
render(rdg_Post::findAll());

echo "In case there were things uncleaned, let's tidy:";
foreach (rdg_Post::findAll() as $p) {
    $p->delete();
}
render(rdg_Post::findAll());

?>

    
</body>

</html>