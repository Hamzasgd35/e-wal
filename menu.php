<?php
 class menu
 {
 public function view_menu(db_connection $connect)     // get recharge record of a accountant
		{
		$day=date("l");
		$conn=$connect->create_connection();
		$sql = "SELECT * FROM menu_tb WHERE day='{$day}'";    // getting user recharge record from recharge table
		$result=mysqli_query($conn,$sql);
  
		echo "<table id=\"example\" class=\"table table-bordered\" cellspacing=\"0\" width=\"100%\">";
            echo "<tr>";
            echo  "<th>"."Item Name"."</th>";
            echo    "<th>"."Quantity"."</th>";
			echo    "<th>"."Price"."</th>";
			echo    "<th>"."Category"."</th>";
			echo  "<th>"."Location"."</th>";
			echo "</tr>";
		while( $subject = mysqli_fetch_assoc($result))
			{
			echo "  <tr>";
			echo "      <td>".$subject["item_name"]."</td>";
			echo "      <td>".$subject["quantity"]."</td>";	
			echo "      <td>".$subject["price"]."</td>";
			echo "      <td>".$subject["category"]."</td>";			
			echo "      <td>".$subject["location"]."</td>";
			echo "  </tr>";
			}
		echo "</table>";
		mysqli_close($conn); //closing connection
		}

 }






?>