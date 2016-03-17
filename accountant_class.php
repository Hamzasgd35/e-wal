<?php
class accountant_class {


	public function inactive_accounts(db_connection $connect)
		{
		$conn = $connect->create_connection();
		$sql = "SELECT * FROM user_tb WHERE status = 'notactive' ";      // getting record of all inactive accounts
		$result=mysqli_query($conn,$sql);
		echo "<table border=2>";
        echo "<tr>";
        echo  "<th>"."Name"."</th>";
        echo    "<th>"."Username"."</th>";
		echo  "<th>"."Accoutn Status"."</th>";
        echo    "<th>"."Balance"."</th>";
        echo "</tr>";
		   
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr>";
			echo "      <td>".$subject["full_name"]."</td>";
			echo "      <td>".$subject["username"]."</td>";	    //showing record in form of a table
			echo "      <td>".$subject["status"]."</td>";
			echo "      <td>".$subject["balance"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
		mysqli_close($conn); //closing connection
	
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function activate_user(db_connection $connect)
		{	
			$username = trim($_POST['username']);	//getting values posted to from
			$uname_status = "";
				$conn=$connect->create_connection();
				$result = mysqli_query($conn,"SELECT username from user_tb where username='{$username}' ");
				while($subject=mysqli_fetch_assoc($result))
				{
				$name_user= $subject["username"];			//checks for id to decide about user existence
				if( $name_user === NULL)                // if username does not exist in database
					{
						$uname_status = "navailable";       
					}
					else			// if username exists
					{
						$uname_status = "available";
					}			
				}
			if($uname_status === 'available')  //it means username exists in database
				{
				$blnc = trim($_POST['amount']);
				$conn=$connect->create_connection();
				$date =date("m-d-y");          //getting current date from system
				$sql = "UPDATE user_tb SET status = 'active',balance = '{$blnc}',join_date='{$date}' WHERE username = '{$username}' ";  
				$result=mysqli_query($conn,$sql);
				if($result==true)
					{
					$a = "Account activated.";
				echo "<script>alert('{$a}');</script>";
				echo "<script> window.location=\"http://localhost/E-Wallet1/accountant_activate_account.php\" </script>";
					}
	
				mysqli_close($conn);	//closing connection
				}
			else
				{
				$a = "Username doesn't exist. Type again correctly.";
				echo "<script>alert('{$a}');</script>";
				}
			
		}












}





?>