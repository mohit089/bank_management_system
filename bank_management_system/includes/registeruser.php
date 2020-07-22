<?php
ob_start();

?>
<?php
    include_once ("database.php");
    if(isset($_POST['register_user'])){
        extract($_POST);
        $user_fname = mysqli_real_escape_string($connection, $user_fname);
        $user_account_number = mysqli_real_escape_string($connection, $user_account_number);
        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_lname = mysqli_real_escape_string($connection, $user_lname);
        $user_confirm_password = mysqli_real_escape_string($connection, $user_confirm_password);
        $user_password = mysqli_real_escape_string($connection, $user_password);
        $go_to = "";
        if($user_password == $user_confirm_password){
            $query = "SELECT * FROM users WHERE user_email = '$user_email'";
            $checkuserquery = mysqli_query($connection, $query);
            if(mysqli_num_rows($checkuserquery) > 0){
                $go_to = "../register.php?show_notification=1&user_already_exists=1";
            } else{
              //  $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);
                $query = "INSERT INTO user (user_fname, user_lname, user_email, user_password, user_account_number) VALUES ('$user_fname', '$user_lname', '$user_email', '$user_password', '$user_account_number')";
                $add_user_query = mysqli_query($connection, $query);
		$uid=mysqli_insert_id($connection);
		$query1 = "INSERT INTO account_details (user_id,fname, account_number,balance) VALUES ($uid,'$user_fname', '$user_account_number',50000)";
                $add_user_query = mysqli_query($connection, $query1);
                $go_to = "../login.php?show_notification=1&user_created=1";
            }
        } else{
            $go_to = "../register.php?show_notification=1&passwords_match=1";
        }
        header("Location: $go_to");

    }
?>
