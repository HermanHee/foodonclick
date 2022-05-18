<?php

include "includes/headerAdmin.php";

?>

<!DOCTYPE HTML>
<html lang="en">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/standardise.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="mainheader">
            <header>Admin Home</header>
        </div>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<br>
		</form>
		<div class="container">
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
		<div class="card border-0 shadow rounded-2 my-3">
		<div class="card-body p-4 p-sm-50">
		<h3 class="card-title text-center mb-5 fw-light fs-5">Add User</h3>
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="form-group mb-3">
					<label for="userID">Username:</label>
					<input type="text" name="userID" class="form-control" placeholder="username" required>
				</div>
				<div class="form-group mb-3">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" placeholder="password" required>
				</div>
				<div class="form-group mb-3">
					<label for="fName">First Name:</label>
					<input type="text" name="fName" class="form-control" placeholder="first name" required>
				</div>

				<div class="form-group mb-3">
					<label for="lName">Last Name:</label>
					<input type="text" name="lName" class="form-control" placeholder="last name" required>
				</div> 
				<div class="form-group mb-3">
					<label for="phone">Phone:</label>
					<input type="tel" pattern="[8-9]{1}[0-9]{7}" name="phone" class="form-control" placeholder="SG Number" required>
				</div> 

				<div class="form-group mb-3">
					<label for="email">Email address:</label>
					<input type="email" name="email" class="form-control" placeholder="name@example.com" required>
				</div>
				<div class="form-group mb-3">
								<label for="type">Type</label>
								<select id="type" name="type" class="form-control">
									<option selected>Admin</option>
									<option>Manager</option>
									<option>Chef</option>
								</select>
							</div>
				<br>
				<div class="d-grid">
					<button class="btn btn-primary text-uppercase" name="add_btn" type="submit">Add</button>
				</div>
			</form>
		</div>
		</div>
		</div>
		</div>
		</div>   
		 <?php 
			// if the form was submitted 
			if(isset($_POST['add_btn'])){
			$userID = $_POST['userID'];
			$password = $_POST['password'];
			$fName = $_POST['fName'];
			$lName = $_POST['lName'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$type = $_POST['type'];
			
			include "class/Users.php";
			include "class/adminAddUserController.php";
			
			$adduser = new adminAddUserController($userID, $password, $fName, $lName, $phone, $email, $type);
			// Add
			$adduser->addUser();
			}
		?>	
    </body>
</html>

<?php

include "includes/footer.php";

?>