<?php
	class person 
	{
		public $username;
	public function reset_password($username,db_connection $connect)
		{
		if(isset($_POST['reset_password']))
			{
			$conn=$connect->create_connection(); //calling create connection function to establish connection
			$old_password = trim($_POST['old_password']);		//getting values posted to from
			$new_password = trim($_POST['new_password']);
			$confirm_password = trim($_POST['confirm_password']);
			$sql_password = "SELECT password from user_tb where username = '{$username}' ";  // accessing user record 
			$password_result = mysqli_query($conn,$sql_password);
			
			$subject=mysqli_fetch_assoc($password_result);
			$password_database=$subject["password"];
			
			if($password_database === $old_password && $new_password === $confirm_password)    // checking for validation
				{
				$sql = "UPDATE user_tb SET password='{$new_password}' where username = '{$username}' ";   // updating password
				mysqli_query($conn,$sql);  // performing mysql query
				mysqli_close($conn);	//closing connection	
				$a= "Password has been updated successfully.";
				echo "<script>alert('{$a}');</script>";
				}
			else
				{
				$a= "Unable to change your password. Type again carefully.";
				echo "<script>alert('{$a}');</script>";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function signup (db_connection $connect)
		{
		if(isset($_POST['signup']))
			{
			/*
			$image_name=$_FILES['image']['name'];
			$image_type=$_FILES['image']['type'];
			$image_size=$_FILES['image']['size'];     // getting image details
			$image_tmp=$_FILES['image']['tmp_name'];
	
			if(empty($_FILES['image']['name']))      // if image is not attached
				{
				echo "<script>alert('Select an image.')</script>";
				exit();
				}
			if($image_type=="image/jpg" or $image_type=="image/jpeg" or $image_type=="image/png" )   // checking for image type
				{
						move_uploaded_file($image_tmp,"user_images/$image_name");    // moving image to specified folder	
				}
			else
				{
				echo "<script>alert('Image type not supported.')</script>";
				exit();
				}*/
	
			$full_name = trim($_POST['full_name']);//getting values posted to from
			$username = trim($_POST['username']);
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			$confirm_password = trim($_POST['confirm_password']);
			if($password != $confirm_password)
				{
				$a="Passwords Don't match. Type again carefully.";
				echo "<script>alert('{$a}');</script>";
				}
			else
				{
				$uname_status = "";
				$conn=$connect->create_connection();
				$result = mysqli_query($conn,"SELECT username from user_tb where username='{$username}' ");
				while($subject=mysqli_fetch_assoc($result))
				{
				$name_user= $subject["username"];			//checks for id to decide about user existence
				if( $name_user === NULL)
					{
						$uname_status = "available";       // if username exists in database
					}
					else
					{
						$uname_status = "navailable";
					}			// if username doesn't exist
				}
				if($uname_status === "navailable")
					{
					$a="Username already exists. Try different.";
					echo "<script>alert('{$a}');</script>";
					return $username;
					}
				else
					{
					$conn=$connect->create_connection();
					$sql = "INSERT INTO user_tb (full_name,username,email,password)
					VALUES ('{$full_name}', '{$username}','{$email}', '{$password}')";
					mysqli_query($conn,$sql);  // performing mysql query
					}
				$a="Your request has been sent to accountant successfully.Visit accountant office to activate account.";
				echo "<script>alert('{$a}');</script>";
				mysqli_close($conn);	//closing connection
	
				}
			}
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		function is_user($uname)
			{	
		$conn=create_connection();
		$result = mysqli_query($conn,"SELECT username from user_tb where username='{$uname}' ");
			while($subject=mysqli_fetch_assoc($result))
			{
			$name_user= $subject["username"];			//checks for id to decide about user existence
			
			if( $name_user != NULL)
				{
				return "navailable";       // if username exists in database
				}else{return "available";}			// if username doesn't exist
				
			}
	
	
		}
	
		
		
	}
	

?>