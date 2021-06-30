<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../public/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" />
    
</head>
<body>
<?php require 'user-info.php'; ?>
 
  <div class="container">

    <div class="form vertical-center shadow">
      <div class="card-body">
        <div class="user">
            <form action="../controllers/exit-chat.php" >
                <button  class="btn btn-light"><i class="fas fa-arrow-circle-left fa-2x p-2"></i></button>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
            </form>
            <div class="username ">
            <?php 
              $ban_users = $result_ban->fetch_assoc();
              // var_dump($ban_users);
              if($ban_users['banned_id']==$to['unique_id'] && $ban_users['from_id']==$id) : ?>
              <div class="text-center">
                <h4 class="card-title m-auto ml-3"><strong class="ml-3"><?=$to['name']?></strong></h4>
                <small class="ban">Blocked you</small>
              </div>
              <?php else: ?>
                <h4 class="card-title m-auto ml-3"><strong class="ml-3"><?=$to['name']?></strong></h4>
                <?php endif; ?>
            </div>
        <?php if($ban_users['from_id']==$to['unique_id'] && $ban_users['banned_id']==$id) : ?>
              <button  class="btn btn-light ban" value disabled> <i class="fas fa-ban fa-2x p-2 "></i></button>
        <?php else : ?>
          <form action="../controllers/ban-user.php">
              <input type="hidden" name="id" value="<?=$id?>">
              <input type="hidden" name="to_id" value="<?=$to_id?>">
              <button  class="btn btn-light ban"> <i class="fas fa-ban fa-2x p-2 "></i></button>
            </form>
            <?php endif;?>
        </div>
      
        <div class="chat-menu" id="scroll">
            
           <?php while($message = $result_m->fetch_assoc()) :?>
                  <div class="msg-card-right">
              <?php if($message['incoming_msg_id'] == $to_id) :?>
                  <div class="bg-right">
                  <h5 class="px-3"><?=$message['msg']?></h5>
                  </div>
              <?php endif; ?>
                  </div>
                  <div class="msg-card-left my-1">
              <?php if($message['incoming_msg_id'] == $id) :?>
              <?php if($message['is_ban']==0): ?>
                <div class="bg-left">
                <h5 class="px-3"><?=$message['msg']?></h5>
                </div>
                <?php endif;
                endif; ?>
                </div>
          <?php endwhile;?>
      
          
        </div>
        <div class="message-input">

        <?php if($ban_users['from_id']==$to['unique_id'] && $ban_users['banned_id']==$id) : ?>
                <form action="../controllers/ban-user.php">
                  <input type="hidden" name="id" value="<?=$id?>">
                  <input type="hidden" name="to_id" value="<?=$to_id?>">
                  <button class="btn btn-large btn-block ban py-2 my-2" type="submit"><b>Unblock</b></button>
                </form>
              
              <?php else: ?>

          <form action="../controllers/send.php">
            <input type="text" name="message" class="form-control" >
            <input type="hidden" name="user_id" value="<?=$_GET['id']?>">
            <input type="hidden" name="to_id" value="<?=$_GET['to']?>">
            <button type="submit" class="btn btn-secondary m-2"><i class="fab fa-telegram-plane"></i></button>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
    // var_dump($to);
  ?>
<script>
document.getElementById('scroll').scrollTop = 9999999;
</script>
</body>
</html>