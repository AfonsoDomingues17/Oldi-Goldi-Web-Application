<?php
  session_start();                                         // starts the session

  require_once('database/connection.php');                 // database connection
  require_once('database/users.php');                      // user table queries
    require_once('database/chats.php');
$db = getDatabaseConnection();
$item_id = $_POST['item_id'];
$user = $_POST['user'];
$chat = VerifyChatExists($db,$_SESSION['username'],$user,$item_id);
if($chat == false){
addNewChat($db,$_SESSION['username'],$_POST['user'],$_POST['item_id']);
$chat_id = $db->lastInsertId();

addMessage($db, $chat_id, $_SESSION['username'], $_POST['new_message']);
}
else $chat_id = $chat['chat_id'];
header('Location: messages.php?chat_id='.$chat_id.'');       
?>