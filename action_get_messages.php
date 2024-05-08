<?php 
session_start();
require_once('database/connection.php');
require_once('database/users.php');
require_once('database/chats.php');
$db = getDatabaseConnection();

$chat_id = $_GET['chat_id'];

$messages = getAllMessages($db,$chat_id);


echo displayMA($messages,$db,$chat_id);