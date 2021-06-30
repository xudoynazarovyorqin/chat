<?php

class Chat 
{

    public function openChat()
    {
        $id = $_REQUEST['user'];
        $to = $_REQUEST['other_id'];
        header("location: ../view/chat.php?id=".$id."&&to=".$to);
    }
    public function exitChat()
    {
        $id = $_REQUEST['id'];
        header("location: ../view/index.php?id=".$id);
    }
    public function send()
    {
        $to = $_REQUEST['to_id'];
        $id =$_REQUEST['user_id'];
        $message = $_REQUEST['message'];
        $db = mysqli_connect('localhost', 'root', 'root', 'chat');
        $user_check_query = "INSERT INTO messages (incoming_msg_id,outgoing_msg_id,msg) VALUE ($to,$id,'$message')";
        $result = mysqli_query($db, $user_check_query);
        header("location: ../view/chat.php?id=".$id."&&to=".$to);
    }
    public function banUser()
    {
        // var_dump($_REQUEST);
        // $to = $_REQUEST['to_id'];
        // $id =$_REQUEST['id'];
        // $db = mysqli_connect('localhost', 'root', 'root', 'chat');
        // $sql = "UPDATE messages SET is_ban=1 WHERE incoming_msg_id='$to'";
        // $result = mysqli_query($db, $sql);
        // header("location: ../view/chat.php?id=".$id."&&to=".$to);
    }

}