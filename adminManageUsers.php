<?php

include "includes/headerAdmin.php";
include "class/Users.php";

$user = new Users();

?>

<!DOCTYPE HTML>
<html lang="en">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/standardise.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <title>FoodOnClick</title>
    </head>
    
    <body>
		
		<div class="mainheader">
			<header>Manage Users</header>
		</div>	

		<div>

			<form method="post">
				<br>   
				<button type="submit" class="btn btn-primary" name="viewAllUsers">View All Users</button>
				<br>
				<br>
			</form>
			
			<form action="" method="GET">
				<div class="input-group mb-4 border rounded-pill p-1">
					<div class="input-group-prepend border-0">
						<button name="submitSearch" class="btn btn-default" type="submit"> Search </button>
					</div>
					<input id="searchUserID" class="form-control" name="userID" type="search" aria-describedby="button-addon4" class="form-control bg-none border-0" placeholder="Username">
					<input id="searchfName" class="form-control" name="fName" type="search" aria-describedby="button-addon4" class="form-control bg-none border-0" placeholder="First Name">
					<input id="searchlName" class="form-control" name="lName" type="search" aria-describedby="button-addon4" class="form-control bg-none border-0" placeholder="Last Name">
					<input id="searchPhone" class="form-control" name="phone" type="search" aria-describedby="button-addon4" class="form-control bg-none border-0" placeholder="Phone">
					<input id="searchEmail" class="form-control" name="email" type="search" aria-describedby="button-addon4" class="form-control bg-none border-0" placeholder="Email">
				</div>
			</form>
			
			<?php
                if(isset($_GET['user_id_del'])){
                    $user->deleteUser($_GET['user_id_del']);
                    ob_clean();
                    ob_start();
                    header('Location: adminManageUsers.php');
                }
				if(isset($_POST["viewAllUsers"])) {
				include "class/adminViewUsersController.php";

				$view = new adminViewUsersController();

				$view->ViewAllUsers(); 
				} 
				else if(isset($_GET['submitSearch'])) {
					$userID = $_GET['userID'];
					$fName = $_GET['fName'];
					$lName = $_GET['lName'];
					$phone = $_GET['phone'];
					$email = $_GET['email'];
					
					if(is_null($userID)) {
						$userID = '';
					}
					if(is_null($fName)) {
						$fName = '';
					}
					if(is_null($lName)) {
						$lName = '';
					}
					if(is_null($phone)) {
						$phone = '';
					}
					if(is_null($email)) {
						$email = '';
					}
					
					include "class/Users.php";
					include "class/adminSearchUserController.php";
					
					// search
					$searchuser = new adminSearchUserController($userID, $fName, $lName, $phone, $email);
					$searchuser->searchUser();
				}
			?>
		</div>
		
		<script>
			function editDetails(uID) {
				location.href = "adminEditUser.php?uid=" + uID;
			}
		</script>
    </body>
</html>