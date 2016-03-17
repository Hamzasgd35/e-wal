<?php


class records
{
	public function view_purchase_record(db_connection $connect,$username)     // get transaction record between to provided dates (for Customer and faculty)
		{
		
				$conn=$connect->create_connection();
				$sql = "SELECT * FROM user_record WHERE username = '{$username}' ORDER BY date DESC";  // requesting for record of shopkeeper transactions between date1 and date2
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2>";
            echo "<tr>";
			echo  "<th>"."Id"."</th>";
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
				echo "  <tr>";
				echo "      <td>".$subject["id"]."</td>";
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function view_purchase_record(db_connection $connect)     // get transaction record between to provided dates (for Admin)
		{
		
				$conn=$connect->create_connection();
				$sql = "SELECT * FROM user_record ORDER BY date DESC";  // requesting for record of shopkeeper transactions between date1 and date2
				$result=mysqli_query($conn,$sql);
				
	
			echo "<table border=2>";
            echo "<tr>";
			echo  "<th>"."Id"."</th>";
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
				echo "  <tr>";
				echo "      <td>".$subject["id"]."</td>";
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}
?>