<?php
  session_start();                                         

  require_once('database/connection.php');                 
  require_once('database/users.php');                   
    require_once('database/chats.php');  
    
    $db = getDatabaseConnection();
    $new_price = $_POST['new_price'];
    addNewPriceMessage($db,$_POST['chat_id'],$_SESSION['username'],$new_price);


    header('Location: messages.php');


?>