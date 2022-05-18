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
            <header>Admin Console</header>
        </div>
		
		<div>
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<br>
			</form>
			<div class="container">
				<h1>Administrator Edit User Page</h1>
				<?php 
					$servername = "localhost";
                    $dbusername="root";
                    $dbpassword="";
                    $dbname="foodonclickdb";
					$uID = $_GET['uid'];
					$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
					
					if ($conn->connect_error) 
					{ die("Connection failed: " . $conn->connect_error); }

					$sql = "SELECT * FROM users WHERE uid = '$uID'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						$row = $result->fetch_assoc();
						echo "User id: " . $row['uid'] . "<br>";
						echo "Username: " . $row['userID'] . "<br>";
						echo "Password: " . $row['password'] . "<br>";
						echo "First Name: " . $row['fName'] . "<br>";
						echo "Last Name: " . $row['lName'] . "<br>";
						echo "Phone: " . $row['phone'] . "<br>";
						echo "Email: " . $row['email'] . "<br>";
					}
					else 
						{ echo "No results found"; }

					if (isset($_GET["editUName"])){
						$userID = $_GET["newUsername"];
						$password = '';
						$fName = '';
						$lName = '';
						$phone = '';
						$email = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//Edit Username
						$edit = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edit->editUsername();
					}
					if (isset($_GET["editPW"])){
						$password = $_GET["newPassword"];
						$userID = '';
						$fName = '';
						$lName = '';
						$phone = '';
						$email = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//Edit password
						$edituser = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edituser->editPW();
					}
					if (isset($_GET["editFName"])){
						$fName = $_GET["newFName"];
						$userID = '';
						$password = '';
						$lName = '';
						$phone = '';
						$email = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//edit first name
						$edit = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edit->editFName();
					}
					if (isset($_GET["editLName"])){
						$lName = $_GET["newLName"];
						$userID = '';
						$password = '';
						$fName = '';
						$phone = '';
						$email = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//edit last name
						$edit = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edit->editLName();
					}
					if (isset($_GET["editPhone"])){
						$phone = $_GET["newPhone"];
						$userID = '';
						$password = '';
						$fName = '';
						$lName = '';
						$email = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//edit phone
						$edit = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edit->editPhone();
					}
					if (isset($_GET["editEmail"])){
						$email = $_GET["newEmail"];
						$userID = '';
						$password = '';
						$fName = '';
						$lName = '';
						$phone = '';

						include "class/Users.php";
						include "class/adminEditUserController.php";
						//edit email
						$edit = new adminEditUserController($userID, $password, $fName, $lName, $phone, $email);
						$edit->editEmail();
					}
					
				?>
				<div class="input-group">
					<form action="" class="form-inline" method="GET">
							<input id="newUsername" class="form-control" name="newUsername" placeholder="Username" required>
							<div class="input-group-btn">
								<button name="editUName" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
					<form action="" class="form-inline" method="GET">
							<input id="newPassword" class="form-control" name="newPassword" placeholder="Password" required>
							<div class="input-group-btn">
								<button name="editPW" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
				</div>
				<br>
				<div class="input-group">
					<form action="" class="form-inline" method="GET">
							<input id="newFName" class="form-control" name="newFName" placeholder="First Name" required>
							<div class="input-group-btn">
								<button name="editFName" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
					<form action="" class="form-inline" method="GET">
							<input id="newLName" class="form-control" name="newLName" placeholder="Last Name" required>
							<div class="input-group-btn">
								<button name="editLName" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
				</div>
				<br>
				<div class="input-group">
					<form action="" class="form-inline" method="GET">
							<input id="newPhone" type="tel" pattern="[8-9]{1}[0-9]{7}" class="form-control" name="newPhone" placeholder="SG Number" required>
							<div class="input-group-btn">
								<button name="editPhone" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
					<form action="" class="form-inline" method="GET">
							<input id="newEmail" type="email" class="form-control" name="newEmail" placeholder="Email" required>
							<div class="input-group-btn">
								<button name="editEmail" class="btn btn-primary" type="submit"> Save </button>
							</div>
							<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
					</form>
				</div>
				<br>
				<form action="" class="form-inline" method="GET">
							<div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
								<button name="refresh" class="order-btn text-white" onclick='window.location.reload(true);' type="submit"> Refresh </button>
								<input type='hidden' name = "uid" value = <?php echo $_GET['uid']; ?>>
							</div>
							<div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
								<button style="margin-left: unset" class="order-btn text-white"
									onclick="history.go(-1); return false;"><a>Back</a></button>
							</div>
				</form>
			</div>
		</div>
		<script>
		function editDetails(uID) {
		location.href = "adminEditUser.php?uid=" + uID;
		}
		</script>
    </body>
</html>

<?php

include "includes/footer.php";

?>