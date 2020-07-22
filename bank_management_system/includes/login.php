<?php
ob_start();
?>

<?php
    session_start();
    include_once ("database.php");
    if (isset($_POST['sign_in'])){
        extract($_POST);
        $query = "SELECT * FROM user WHERE user_email = '$user_email'";
	$user_password=mysqli_real_escape_string($connection, $user_password);
        $select_user_query = mysqli_query($connection, $query);
        if(mysqli_num_rows($select_user_query) == 1){
            if($row = mysqli_fetch_assoc($select_user_query)){
                $db_user_id = $row['user_id'];
                $db_user_email = $row['user_email'];
                $db_user_firstname = $row['user_fname'];
                $db_user_lastname = $row['user_lname'];
                $db_user_password = $row['user_password'];
            }
           if($user_password === $db_user_password && $user_email===$db_user_email) {
                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['user_firstname'] = $db_user_firstname;
                $_SESSION['user_lastname'] = $db_user_lastname;
                header("Location: ../transaction.php");
            } else{
                echo "USER PASSWORD INCORRECT";
            }
	    }
         else{
           echo "USER NOT FOUND";
        }
	 //header("Location: ../transaction.php");
    }
?>