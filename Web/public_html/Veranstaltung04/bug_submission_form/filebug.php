<?php

ob_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('lib/swift_required.php');

define( "SMTP_HOST", "mail.hosting.netstream.com" );
define( "SMTP_ACCOUNT", "f.luethi@focusconsulting.ch");

define( "SMTP_PORT", "587");

// Captcha

require_once('recaptchalib.php');

$private_key = "6LfZH-gSAAAAACBjnvDg8VEzYkY-j0LVC2IaKavM";
$resp = recaptcha_check_answer($private_key, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    header('Location: index.php?status=captcha');
    exit();   
}

// validate
if ($_POST["text"] == "") {
    header('Location: index.php?status=error');
    exit();
}

// Login

if ($_POST["passwort"] != "jaime") {
    header("Location: index.php?status=noauth");
    exit();
}

// save file

$content = "";
$content .= "Name: " . $_POST["name"];
$content .= "\nEmail: " . $_POST["email"];
$content .= "\nWeb: " . $_POST["web"];
$content .= "\nPrio: " . $_POST["prio"];
$content .= "\nBug Type: " . $_POST["bugtype"];
$content .= "\nRückruf: " . $_POST["callback"];
$content .= "\nRepro: " . $_POST["repro"][0];
$content .= "\nDatum: " . $_POST["datum"];
$content .= "\nText: " . $_POST["text"];

$id = time();
$filename = "data/" . $id . "." . end($temp);
file_put_contents("data/" . $id . ".txt", $content);
$temp = explode(".", $_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $filename);

// send mail
$transport = Swift_SmtpTransport::newInstance(SMTP_HOST, SMTP_PORT);
$transport->setUsername(SMTP_ACCOUNT);
$transport->setPassword("xxxx");

$message = Swift_Message::newInstance();
$message->setFrom("f.luethi@focusconsulting.ch");
$message->setTo("luethifl@students.zhaw.ch");
$message->setSubject("Bug.");
$message->setBody($content, "text/plain");

$message->attach(Swift_Attachment::fromPath($filename, $_FILES["file"]['type'])->setFilename($filename));

$mailer = Swift_Mailer::newInstance($transport);
if (!$mailer->send($message)) {
    header('Location: index.php?status=error');
    exit();
}

header('Location: index.php?status=ok');

?>
