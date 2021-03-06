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
        $message = strval($_REQUEST['message']);
        // die(var_dump($message));
        $db = mysqli_connect('localhost', 'root', 'root', 'chat');
        $ban_users_sql = "SELECT * FROM ban_user";
        $result_ban= mysqli_query($db, $ban_users_sql);
        $ban_users = $result_ban->fetch_assoc();
        if($ban_users != null){
            if($ban_users['banned_id']==$to && $ban_users['from_id']==$id){
                $user_check_query = "INSERT INTO messages (incoming_msg_id,outgoing_msg_id,msg,is_ban) VALUE ($to,$id,'$message',1)";
                mysqli_query($db, $user_check_query);
                header("location: ../view/chat.php?id=".$id."&&to=".$to);
            }else{
                $user_check_query = "INSERT INTO messages (incoming_msg_id,outgoing_msg_id,msg,is_ban) VALUE ($to,$id,'$message',0)";
                mysqli_query($db, $user_check_query);
                header("location: ../view/chat.php?id=".$id."&&to=".$to);
            }
        }else{
            $user_check_query = "INSERT INTO messages (incoming_msg_id,outgoing_msg_id,msg) VALUE ($to,$id,'$message')";
            mysqli_query($db, $user_check_query);
            header("location: ../view/chat.php?id=".$id."&&to=".$to);
        }
       
    }
    public function banUser()
    {

        $to = $_REQUEST['to_id'];
        $id =$_REQUEST['id'];
        $db = mysqli_connect('localhost', 'root', 'root', 'chat');
        
        $sql_ban = "SELECT * FROM ban_user";
        $result_ban = mysqli_query($db, $sql_ban);
        $ban_users = $result_ban->fetch_assoc();
        if($ban_users['banned_id']==$id && $ban_users['from_id']==$to) {
            $sql = "DELETE FROM ban_user WHERE banned_id=$id AND from_id=$to";
            mysqli_query($db, $sql);
            header("location: ../view/chat.php?id=".$id."&&to=".$to);
        }else{

            $sql = "INSERT INTO ban_user (banned_id,from_id) VALUE ($id, $to) ";
            mysqli_query($db, $sql);
            header("location: ../view/chat.php?id=".$id."&&to=".$to);
        }

    }

}