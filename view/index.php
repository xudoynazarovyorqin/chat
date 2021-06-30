<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../public/style.css">
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
          
          <div class="username ">
            <h4 class="card-title m-auto ml-3"><strong class="ml-3"><?=$user['name']?></strong></h4>
          </div>
          <a href="../login.view.php" class="btn btn-secondary m-2">logout</a>
        </div>
        <div class="user-text">
          <p class="my-3 pl-2"><i class="fas fa-user pr-1"></i>Users</p>
        </div>
        <div class="users-list">
          <?php   
            while($row = $result2->fetch_assoc()) :?>
            <form action="../controllers/open-chat.php" method="post">
              <?php if($row['unique_id'] != $user['unique_id']):?>
              <input type="hidden" name="user" value="<?= $user['unique_id']?>">
              <input type="hidden" name="other_id" value="<?= $row['unique_id']?>">
              <h5 class="my-2 m-0"><button type="submit" class="btn btn-large btn-block py-3 "><?php echo $row['name']; ?></button></h5>
              <?php endif; ?>
            </form>
            <?php endwhile;?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>