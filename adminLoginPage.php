<?php

include "includes/header.php";

?>

<div class=" h-50 d-flex justify-content-center align-items-end ">
	<img src="Images/general/admin.jpg" alt="" class="img-fluid" style="width:300px;height:325px;">
	<div class="home-text">
		<h1 class="main-heading text-center">
		Admin Login
		</h1>
		<p>Welcome to admin login page</p>
		<div class="container">
			<?php
				if(isset($_POST["LoginButton"])) {
				
				// Grab user input data
				$userid = $_POST["userid"];
				$password = $_POST["password"];
				$type = $_POST["type"];

				// includes Controller entity and DB classes
				// Important (Must be in this order)
				include "class/Users.php";
				include "class/LoginPageController.php";

				// instantiate LoginPageController class
				$loginuser = new LoginPageController($userid, $password, $type);

				// Run error and adding user handlers
				$loginuser->loginUser();
			}
			?>
		
			<form method="post">
				<div class="form-group">
					<label for="UserID">User ID:</label>
					<input type="text" class="form-control" id="userid" placeholder="Enter User ID" name="userid">
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
				</div>
				
				<div class="form-group">
                        <label for="type">Login Type:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="Admin">Admin</option>
                            <option value="Manager">Restaurant Manager</option>
                            <option value="Chef">Chef</option>
                        </select>
                </div>

				<button type="submit" class="btn btn-primary" name="LoginButton">Login</button>
			</form>
		
			<?php
			if(!isset($_GET['error'])) {
				exit();
			}
			else{
				$errorcheck = $_GET['error'];

				if ($errorcheck == "emptyInput"){
					echo "<p class='error' style='color:Red;'>Please fill in all the login fields!</p>";
					exit();
				}

				if ($errorcheck == "queryfailed"){
					 echo "<p class='error' style='color:Red;'>Query Error, please check back with system administrator!</p>";
						exit();
				}
				
				if ($errorcheck == "usernotfound"){
					echo "<p class='error' style='color:Red;'>Incorrect user credentials!</p>";
					exit();
				}
				
				if ($errorcheck == "wrongusertype"){
                        echo "<p class='error' style='color:Red;'>Incorrect login type!</p>";
                        exit();
                    }
					
				if ($errorcheck == "wrongpassword"){
					echo "<p class='error' style='color:Red;'>Incorrect login password!</p>";
					exit();
				}
				
				if ($errorcheck == "errdatatype"){
                        echo "<p class='error' style='color:Red;'>Error with datatype, please check back with system administrator!</p>";
                        exit();
                    }
			}
			?>
		</div>
	</div>
</div>
	
<?php

include "includes/footer.php";

?>