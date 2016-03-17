<?php
require_once("db_connection.php");
require_once("person.php");

$person = new person();

$conn = new db_connection();
$conn->create_connection();
session_start();


?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Wallet</title>
		<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
        <!-- CSS -->
		<link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet" >
		<link href="css/buttons.css" rel="stylesheet">
		
	
		
		
      

    </head>

    <body>
	<div id="fullscreen_bg" class="fullscreen_bg">
	
<div class="header_top"></div>

<div class="menu">
    <header class="container">
     <div class="navbar navbar-inner">
                <div class="container">
 <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                    
					   
					   <img src="logo.png" height="100" width="100" >

     </div>
                    
				<!--	
					<div class="collapse navbar-collapse pull-right" id="main-menu">
                        <ul class="nav">
                            

                            <li class="fadeInDown animated d3"><a href="#Iletisim" menuid="11" followlink="true">Dislaimer</a></li>
                            
                             <li class="fadeInDown animated d2"><a href="#" menuid="1" followlink="true">Blog</a></li>
                             
                             <li class="fadeInDown animated d2"><a href="#" menuid="1" followlink="true">Contact Us</a></li>

                        </ul>
                    /.nav-collapse -->
                </div>
  
            </header>

</div><!--menu-->


<div class="container">
        <div class="row centered-form">
		
		
        <div class="col-md-4 col-xs-12 ">
	
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Login </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form">
			    			<div class="row">
			    				<div class="col-xs-12 col-md-12">
			    					<div class="form-group">
			                <input type="text" name="Username" id="username" class="form-control input-sm floatlabel" placeholder="Username">
			    					</div>
			    				</div>
			    				
			    			</div>

			    			

			    			<div class="row">
			    				<div class="col-xs-12 col-md-12">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			  
			    			</div>
			    			
			    			<a href="#" class="btn btn-success gradient pull-right"><span class="glyphicon glyphicon-log-in"></span> Proceed</a>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
			
			
			
			<div class="col-md-4 " >
</div>			
			
			<div class="col-md-4 col-xs-12" >
	
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Signup </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="index.php" method ="post" enctype="multipart/form-data">
			    			<div class="form-group">
			    				<input type="text" name="full_name" class="form-control input-sm" placeholder="Full Name">
			    			</div>
							<div class="form-group">
			    				<input type="email" name="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>
							<div class="form-group">
			    				<input type="username" name="username" class="form-control input-sm" placeholder="Username">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="confirm_password" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
							<div class = "row">
							<img src="download.png" height="50" width="50" class="img-responsive center-block" >
							</br>
							</div>
			    			
			    			<button href="" name="signup" type="submit" class="btn btn-success gradient pull-right"><span class="glyphicon glyphicon-log-in"></span> Proceed</button>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
			
			
			
    	</div>
    </div>
	
<?php	
	if(isset($_POST['signup'])){
	$person->signup($conn);
	echo "<script> window.location=\"http://localhost/E-Wallet1/index.php\" </script>";
	}
?>


</body>
	

 
                
 

        <!-- Javascript -->
        
        <script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
