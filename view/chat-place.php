<?php require "user-info.php";?>
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