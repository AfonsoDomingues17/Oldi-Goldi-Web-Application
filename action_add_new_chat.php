<?php
  session_start();                                         // starts the session

  require_once('database/connection.php');                 // database connection
  require_once('database/users.php');                      // user table queries
    require_once('database/chats.php');
$db = getDatabaseConnection();
addNewChat($db,$_SESSION['username'],$_POST['user'],$_POST['item_id']);
$chat_id = $db->lastInsertId();

addMessage($db, $chat_id, $_SESSION['username'], $_POST['message']);

header('Location: messages.php');       
?>