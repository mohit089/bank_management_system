<?php

	session_start();
	include_once("database.php");
	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM account_details WHERE user_id = $user_id";
	$user_query = mysqli_query($connection, $query);
	extract($_POST);
	$transaction_amount=mysqli_real_escape_string($connection, $transaction_amount);
	$receiver_account_number= mysqli_real_escape_string($connection, $receiver_account_number);
		$row = mysqli_fetch_assoc($user_query);
		extract($row);
		//$user_amount = $row['balance'];
		//echo "$user_amount";
		$send=$row['account_number'];
		if($transaction_amount > $balance){
			die("Amount less available");
		} else{
			$query1=$balance-$transaction_amount;
			$query2=$balance+$transaction_amount;
			$query = "INSERT INTO transaction(transaction_amount, sender_accountnumber, receiver_accountnumber, sender_balance) VALUES($transaction_amount, $send, $receiver_account_number,$query1)";
			$insert_query = mysqli_query($connection, $query);
			//$update_user_amount = $user_amount - $transaction_amount;
			$update_amount_query = "UPDATE account_details SET balance = $query1 WHERE user_id = $user_id";
			
			$query = "SELECT * FROM account_details WHERE account_number = $receiver_account_number";
			$user_query = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($user_query);
			extract($row);
			$balance_new=$balance+$transaction_amount;
			
			$update_amount_query1 = "UPDATE account_details SET balance = $balance_new WHERE account_number = $receiver_account_number";
			$update_amount = mysqli_query($connection, $update_amount_query);
			$update_amount = mysqli_query($connection, $update_amount_query1);
			
			
			/*$queryt = "SELECT * FROM transaction WHERE receiver_accountnumber = $receiver_account_number";
			$balance_new=$balance+$transaction_amount;
		$user_queryt = mysqli_query($connection, $query);
			$row = mysqli_fetch_assoc($user_queryt);
			extract($row);
			$update_amount_query2 = "UPDATE transaction SET receiver_balance = $balance_new WHERE receiver_accountnumber = $receiver_account_number";
			$update_amount = mysqli_query($connection, $update_amount_query2);
			
			//$query = "INSERT INTO transaction(transaction_amount, sender_accountnumber, receiver_accountnumber, sender_balance,receiver_balance) VALUES($transaction_amount, $account_number, $receiver_account_number,$query1,$balance_new)";
			//$insert_query = mysqli_query($connection, $query);*/
			echo "Amount transferred successfully";
		}

?>