<?php 
session_start();
require_once('database/connection.php');
require_once('database/users.php');
require_once('database/chats.php');
$db = getDatabaseConnection();

$messageId = $_GET['message_id'];
$action = $_GET['action'];


if($action == "reject"){
    $stmt = $db->prepare("SELECT message FROM messages WHERE message_id = ?");
    $stmt->execute([$messageId]);
    $message = $stmt->fetchColumn();

    $newMessage = $message . ' - REJECTED!';

    // Update the message in the database
    $stmt = $db->prepare("UPDATE messages SET message = ? WHERE message_id = ?");
    $stmt->execute([$newMessage, $messageId]);
}
$message = getMessage($db,$messageId);
$chat_id = $message['chat_id'];
$messages = getAllMessages($db,$chat_id);


echo displayMessages($messages,$db);
