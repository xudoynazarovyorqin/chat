<?php 
      $db = mysqli_connect('localhost', 'root', 'root', 'chat');
      $id= $_GET['id'];
      $to_id= $_GET['to'];
      
      $sql = "SELECT * FROM users where unique_id='$id'";
      $result = mysqli_query($db, $sql);
      $user = mysqli_fetch_assoc($result);
     
      $sql2 = "SELECT * FROM users ";
      $result2 = mysqli_query($db, $sql2);

      $sql3 = "SELECT * FROM users where unique_id='$to_id'";
      $result3 = mysqli_query($db, $sql3);
      $to = mysqli_fetch_assoc($result3);

      $sql_m = "SELECT * FROM messages where incoming_msg_id='$to_id' AND outgoing_msg_id='$id' OR incoming_msg_id='$id' AND outgoing_msg_id='$to_id'";
      // $sql_m_left = "SELECT * FROM messages where incoming_msg_id='$id' AND outgoing_msg_id='$to_id'";
      $result_m = mysqli_query($db, $sql_m);
      // var_dump($result_m);
      // $result_m_left = mysqli_query($db, $sql_m_left);
     