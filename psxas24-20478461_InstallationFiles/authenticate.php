
<?php 

include "config.php";

session_start();
echo $username;
if (isset($_POST['username']) && isset($_POST['password'])) {

   
	$username = $_POST['username'];

  
	$password = $_POST['password'];
    $_SESSION['username']=$username;

    

    if (empty($username)) {

        header("Location: index_a.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: index_a.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connection, $sql);

		
        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] == $username && $row['password'] == $password) {

                header("Location: home_p.php");


            
                
                 $sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Admin Signed in');";
                 $run = mysqli_query($connection, $sql);

                header("Location: home_p.php");

                
                
    



                exit();

            }else{

                header("Location: index_a.php?error=Incorrect User name or password1");

                exit();

            }
			
        }else{

            header("Location: index_a.php?error=Incorrect User name or password2");

            exit();

        } 
		
    }

}else{

    header("Location: index_a.php");

    exit();

}
?>
