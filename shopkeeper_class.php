<?php
	class shopkeeper_class 
	{
		public $username;
	public function reset_password_shopkeeper($username,db_connection $connect)
		{
		if(isset($_POST['reset_password']))
			{
			$conn=$connect->create_connection(); //calling create connection function to establish connection
			$old_password = trim($_POST['old_password']);		//getting values posted to from
			$new_password = trim($_POST['new_password']);
			$confirm_password = trim($_POST['confirm_password']);
			$sql_password = "SELECT password from shopkeeper_tb where sk_username = '{$username}' ";  // accessing user record 
			$password_result = mysqli_query($conn,$sql_password);
			
			$subject=mysqli_fetch_assoc($password_result);
			$password_database=$subject["password"];
			
			if($password_database === $old_password && $new_password === $confirm_password)    // checking for validation
				{
				$sql = "UPDATE shopkeeper_tb SET password='{$new_password}' where sk_username = '{$username}' ";   // updating password
				mysqli_query($conn,$sql);  // performing mysql query
				mysqli_close($conn);	//closing connection	
				echo "<h4>Password has been updated successfully.</h4>";
				}
			else
				{
				echo "<h4>Unable to change your password. Type again carefully.</h4>";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		function make_transaction(db_connection $connect)   // to insert form details into databases
		{
		if(isset($_POST['make_transaction']))
			{
			$conn =$connect->create_connection();
			$username = trim($_POST['username']);      //getting username from Form
			$amount =trim($_POST['bill']);			//getting amount posted to from
			$items = trim($_POST['items']);			//getting items posted to from
			$password = trim($_POST['password']);					// getting pin posted to form
			$date =date("m-d-y");                      // getting system date 
			$time=date("H:i:s");      // getting system time
			$skname=$_SESSION['username'];				// getting shopkeeper name from SESSION
			$user_row = "SELECT * from user_tb WHERE username='{$username}'"; //query to get whole row with username
			$result = mysqli_query($conn,$user_row);
		
			while($subject=mysqli_fetch_assoc($result))
				{
						//adding amount to retrieved balance 
				$account_status=$subject["status"];
				$account_password=$subject["password"];
				$blnc=$subject["balance"];   // User Account balance
				if($account_status ==='notactive')
					{
					echo "<h4>Your account is inactive.Shopping feature is available for active accounts only</h4>";
					//echo "<script>window.location=\"shopkeeper.php\"</script>";
					}
					else if ($blnc < $amount)
					{
					echo "<h4>Balance not enough. Kindly recharge your account.</h4>";
					}
				else
					{
					if($account_password===$password)
						{
						
						$blnc -=$amount;            // updating balance 
						$sql_main = "UPDATE user_tb SET balance = '{$blnc}' WHERE username = '{$username}' ";  // will subtract amount from existing balance 
						$sql_usertb= "INSERT INTO user_record (username,item_name,price,shopkeeper,location,date,time) 
						VALUES ('{$username}','{$items}','{$amount}','{$_SESSION['username']}','college cafe','{$date}','{$time}')";  // update transaction details in recharge table
						mysqli_query($conn,$sql_usertb);  //  updated recharge table
						mysqli_query($conn,$sql_main);  //update balance in maintb
						
						echo "<h4>Transaction Completed Successfully.</h4>";
						//echo "<script>window.location=\"shopkeeper.php\"</script>";
						}
					else
						{
						echo "<h4>Invalid Credentials.</h4>";
						}
					}		
		
				}
	
			mysqli_close($conn);	//closing connection
	
			}
		}
		
	}
	

?>