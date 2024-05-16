<?php
  session_start();                                         
  if ($_SESSION['csrf'] !== $_POST['csrf']) {
    header('Location: ../index.php');
    exit();
  }
  require_once('../database/connection.php');                 
  require_once('../database/users.php');                   
    require_once('../database/chats.php');  
    
    $db = getDatabaseConnection();
    $new_price = $_POST['new_price'];
    if(isset($_POST['chat_id'])){
      addNewPriceMessage($db,$_POST['chat_id'],$_SESSION['username'],$new_price);    
      header('Location: ../pages/messages.php?chat_id='.$_POST['chat_id'].'');
    }
    else{
        $chat = VerifyChatExists($db,$_SESSION['username'],$_POST['user'],$_POST['item_id']);
        if($chat == false){
        addNewChat($db,$_SESSION['username'],$_POST['user'],$_POST['item_id']);
        $chat_id = $db->lastInsertId();
        }
        else{
        $chat_id = $chat['chat_id'];
        }
        addNewPriceMessage($db,$db->lastInsertId(),$_SESSION['username'],$new_price);
        
        header('Location: ../pages/messages.php?chat_id='. urlencode($chat_id).'');

    }
    


?>