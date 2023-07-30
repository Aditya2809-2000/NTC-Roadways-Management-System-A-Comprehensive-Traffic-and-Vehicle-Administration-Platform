<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- Referenced Step by Step Youtube  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <div class="form-container">

        <form action="authenticate.php" method="post">
            <div class="container">
                <div class="content">
                    <h3>Hello, <span>Admin</span></h3>
                    <h3>login now</h3>
                    
                    <input type="text" name="username" required placeholder="enter your username">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="submit" name="submit" value="login now" class="form-btn">

            
</form>

    </div>

</body>
</html>