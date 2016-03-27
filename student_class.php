<?php
	class student_class 
	{
	
	public function view_balance(db_connection $connect,$username)
	{ 
		$conn = $connect->create_connection();
		$sql = "SELECT balance FROM user_tb WHERE username = '{$username}' ";
		$result2 = mysqli_query($conn,"SELECT * FROM user_tb WHERE username= '{$username}' ");
		if( ! mysqli_fetch_row($result2))  // cheking that value exists or not in database
			{  
			echo "<h4>Username not found.</h4>";
			}
		$result=mysqli_query($conn,$sql);
		if(!isset($result))
			{
			echo "no result found";
			}
		else{ 
			while($subject=mysqli_fetch_assoc($result))
				{
				return "Rs. ".$subject["balance"]; //shows balance if account is activated
						
				}			
			}
	
		}
	
	
	
	
	
	}
?>