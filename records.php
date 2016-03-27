<?php


class records
{
	public function view_purchase_record(db_connection $connect,$username)     // get transaction record between to provided dates (for Customer and faculty)
		{
		
				$conn=$connect->create_connection();
				$sql = "SELECT * FROM user_record WHERE username = '{$username}' ORDER BY date DESC";  // requesting for record of shopkeeper transactions between date1 and date2
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
			echo  "<th>"."item_name"."</th>";
			echo    "<th>"."Price"."</th>";
            echo    "<th>"."Shopkeeper"."</th>";
			echo    "<th>"."Location"."</th>";
			echo    "<th>"."Date"."</th>";
			echo  "<th>"."Time"."</th>";	
			echo "</tr>";
		   
			while( $subject = mysqli_fetch_assoc($result))
				{
				echo "  <tr align='center'>";
				echo "      <td>".$subject["item_name"]."</td>";
				echo "      <td>".$subject["price"]."</td>";
				echo "      <td>".$subject["shopkeeper"]."</td>";	
				echo "      <td>".$subject["location"]."</td>";        // showing results in form of table
				echo "      <td>".$subject["date"]."</td>";
				echo "      <td>".$subject["time"]."</td>";
				echo "  </tr>";
				}
			echo "</table>";
			
			mysqli_close($conn); //closing connection
		}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function view_recharge_record(db_connection $connect,$uname)     // get recharge record of a customer 
		{
		$conn=$connect->create_connection();
		$sql = "SELECT * FROM recharge_record WHERE username='{$uname}' ORDER BY date DESC";    // getting user recharge record from recharge table
		$result=mysqli_query($conn,$sql);
  
		echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
            echo    "<th>"."Date"."</th>";
			echo    "<th>"."Time"."</th>";
			echo  "<th>"."Balance Added"."</th>";
			echo  "<th>"."Added by"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr align='center'>";
			echo "      <td>".$subject["date"]."</td>";	
			echo "      <td>".$subject["time"]."</td>";	
			echo "      <td>".$subject["amount_added"]."</td>";
			echo "      <td>".$subject["accountant"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
		mysqli_close($conn); //closing connection
		}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function accountant_recharge_record(db_connection $connect)     // get recharge record of a accountant
		{
		$conn=$connect->create_connection();
		$sql = "SELECT * FROM recharge_record ORDER BY date DESC";    // getting user recharge record from recharge table
		$result=mysqli_query($conn,$sql);
  
		echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
            echo  "<th>"."Username"."</th>";
            echo    "<th>"."Date"."</th>";
			echo    "<th>"."Time"."</th>";
			echo  "<th>"."Balance Added"."</th>";
			echo  "<th>"."Added by"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr align='center'>";
			echo "      <td>".$subject["username"]."</td>";
			echo "      <td>".$subject["date"]."</td>";	
			echo "      <td>".$subject["time"]."</td>";	
			echo "      <td>".$subject["amount_added"]."</td>";
			echo "      <td>".$subject["accountant"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
		mysqli_close($conn); //closing connection
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function accountant_activation_record(db_connection $connect)     // get recharge record of a accountant
		{
		$conn=$connect->create_connection();
		$sql = "SELECT * FROM activation_record ORDER BY date DESC";    // getting user recharge record from recharge table
		$result=mysqli_query($conn,$sql);
  
		echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
            echo  "<th>"."Id"."</th>";
            echo    "<th>"."Username"."</th>";
			echo    "<th>"."Date"."</th>";
			echo  "<th>"."Time"."</th>";
			echo  "<th>"."Activated By"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr align='center'>";
			echo "      <td>".$subject["id"]."</td>";
			echo "      <td>".$subject["username"]."</td>";	
			echo "      <td>".$subject["date"]."</td>";	
			echo "      <td>".$subject["time"]."</td>";
			echo "      <td>".$subject["activated_by"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
		mysqli_close($conn); //closing connection
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function view_cafe_sales(db_connection $connect,$username)     // get cafe sales record (for admin)
		{	
			$sql="";
				$conn=$connect->create_connection();
				if($username == null)
					{
					$sql = "SELECT * FROM user_record ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				else
					{				
					$sql = "SELECT * FROM user_record WHERE username = '{$username}' ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
			echo  "<th>"."Username"."</th>";
			echo  "<th>"."item_name"."</th>";
			echo    "<th>"."Price"."</th>";
            echo    "<th>"."Shopkeeper"."</th>";
			echo    "<th>"."Location"."</th>";
			echo    "<th>"."Date"."</th>";
			echo  "<th>"."Time"."</th>";	
			echo "</tr>";
		   
			while( $subject = mysqli_fetch_assoc($result))
				{
				echo "  <tr align='center'>";
				echo "      <td>".$subject["username"]."</td>";
				echo "      <td>".$subject["item_name"]."</td>";
				echo "      <td>".$subject["price"]."</td>";
				echo "      <td>".$subject["shopkeeper"]."</td>";	
				echo "      <td>".$subject["location"]."</td>";        // showing results in form of table
				echo "      <td>".$subject["date"]."</td>";
				echo "      <td>".$subject["time"]."</td>";
				echo "  </tr>";
				}
			echo "</table>";
			
			mysqli_close($conn); //closing connection
		}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function activation_record_admin(db_connection $connect,$username)     // get recharge record (for admin)
		{	
			$sql="";
				$conn=$connect->create_connection();
				if($username == null)
					{
					$sql = "SELECT * FROM activation_record ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				else
					{				
					$sql = "SELECT * FROM activation_record WHERE username = '{$username}' ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
            echo  "<th>"."Id"."</th>";
            echo    "<th>"."Username"."</th>";
			echo    "<th>"."Date"."</th>";
			echo  "<th>"."Time"."</th>";
			echo  "<th>"."Activated By"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr align='center'>";
			echo "      <td>".$subject["id"]."</td>";
			echo "      <td>".$subject["username"]."</td>";	
			echo "      <td>".$subject["date"]."</td>";	
			echo "      <td>".$subject["time"]."</td>";
			echo "      <td>".$subject["activated_by"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
			
			mysqli_close($conn); //closing connection
		}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function recharge_record_admin(db_connection $connect,$username)     // get recharge record (for admin)
		{	
			$sql="";
				$conn=$connect->create_connection();
				if($username == null)
					{
					$sql = "SELECT * FROM recharge_record ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				else
					{				
					$sql = "SELECT * FROM recharge_record WHERE username = '{$username}' ORDER BY date DESC";  // requesting for record of shopkeeper transactions 
					}
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2 align='center'>";
            echo "<tr align='center'>";
            echo  "<th>"."Username"."</th>";
            echo    "<th>"."Date"."</th>";
			echo    "<th>"."Time"."</th>";
			echo  "<th>"."Balance Added"."</th>";
			echo  "<th>"."Added by"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr align='center'>";
			echo "      <td>".$subject["username"]."</td>";
			echo "      <td>".$subject["date"]."</td>";	
			echo "      <td>".$subject["time"]."</td>";	
			echo "      <td>".$subject["amount_added"]."</td>";
			echo "      <td>".$subject["accountant"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
			
			mysqli_close($conn); //closing connection
		}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
}
?>