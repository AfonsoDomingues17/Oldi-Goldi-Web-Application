<?php 
session_start();
require_once('database/connection.php');
require_once('database/users.php');
require_once('database/chats.php');
$db = getDatabaseConnection();
$message = $_GET['message'];
$chat_id = $_GET['chat_id'];

addMessage($db, $chat_id, $_SESSION['username'], $message);

$messages = getAllMessages($db,$chat_id);
echo displayMessages($messages,$db);