<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    
     <!-- Referenced Step by Step Youtube -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <div class="form-container">

        <form action="authenticatep.php" method="post">
            <div class="container">
                <div class="content">
                    <h3>Hello, <span> Police Officer</span></h3>
                    <?php
		if ( !empty($errorMessage)) {
			echo "
			<div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
			<strong>$errorMessage</strong>
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
			</div>
			";
		}
        ?>
                    <h3>login now</h3>
                    <input type="text" name="username" required placeholder="enter your username">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="submit" name="submit" value="login now" class="form-btn">
        	<?php
			if ( !empty($successMessage)) {
				echo "
				<div class='row mb-3'>
				<div class='offset-sm-3 col-sm-6'>
					<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>$successMessage</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
					</div>
				</div>
				";

			}
			?>
        </form>

    </div>

</body>
</html>