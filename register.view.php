<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="public/style.css">
    
</head>
<body>

<div class="container register-form">
            <div class="form vertical-center">
                <div class="note">
                    <p>Register</p>
                </div>
                <form action="/controllers/register.php" method="post">
                    <div class="form-content shadow">
                    <?php if($_GET['error']) : ?>
                        <div class="alert alert-danger" role="alert">
                            Your email is already registered.  
                        </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name *" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your email *" required />
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" required />
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btnSubmit mb-3">Register</button>
                            <p>
                                Already a member? <a href="./login.view.php">Sign in</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>