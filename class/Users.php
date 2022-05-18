<?php

class Users {
    
//=========================================LoginPage===========================================
    protected function getloginUser($userid, $password, $type){
        
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
        $dbtable="users";

        $connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
        
        if (!$connection) {
            
            die("Connection failed: " . mysqli_connect_error());
            header("location: adminLoginPage.php?error=queryfailed");
        }
        else{

            $getPasswordStmt = "SELECT password FROM users WHERE userID='$userid'";
    
            $resultpassword = mysqli_query($connection, $getPasswordStmt);
    
            if (mysqli_num_rows($resultpassword) == 0) {

                header("location: adminLoginPage.php?error=usernotfound");
                exit();
            }
            else{
                
                $passwordDB = mysqli_fetch_assoc($resultpassword);

                if ($passwordDB["password"] != $password) {
                    
                    header("location: adminLoginPage.php?error=wrongpassword");
                    exit();
                }
                else{

                    $getDataStmt = "SELECT * FROM users WHERE userID='$userid' AND password='$password'";

                    $resultData = mysqli_query($connection, $getDataStmt);

                    $fetchdata = mysqli_fetch_assoc($resultData);
					
					if ($fetchdata["type"] == "Admin" && $type == "Admin") {
                        session_start();
                        $_SESSION["uid"] = $fetchdata["uid"];
                        $_SESSION["userid"] = $fetchdata["userID"];
                        $_SESSION["password"] = $fetchdata["password"];
                        $_SESSION["firstname"] = $fetchdata["fName"];
                        $_SESSION["lastname"] = $fetchdata["lName"];
                        $_SESSION["phone"] = $fetchdata["phone"];
                        $_SESSION["email"] = $fetchdata["email"];
						$_SESSION["type"] = $fetchdata["type"];
                        
                        header("location: AdminHomePage.php");
                        exit();
                    }
                    else if ($fetchdata["type"] == "Manager" && $type == "Manager") {
                        session_start();
                        $_SESSION["uid"] = $fetchdata["uid"];
                        $_SESSION["userid"] = $fetchdata["userID"];
                        $_SESSION["password"] = $fetchdata["password"];
                        $_SESSION["firstname"] = $fetchdata["fName"];
                        $_SESSION["lastname"] = $fetchdata["lName"];
                        $_SESSION["phone"] = $fetchdata["phone"];
                        $_SESSION["email"] = $fetchdata["email"];
						$_SESSION["type"] = $fetchdata["type"];
                        
                        header("location: ManagerHomePage.php");
                        exit();
                    }
                    else if ($fetchdata["type"] == "Chef" && $type == "Chef") {
                        session_start();
                        $_SESSION["uid"] = $fetchdata["uid"];
                        $_SESSION["userid"] = $fetchdata["userID"];
                        $_SESSION["password"] = $fetchdata["password"];
                        $_SESSION["firstname"] = $fetchdata["fName"];
                        $_SESSION["lastname"] = $fetchdata["lName"];
                        $_SESSION["phone"] = $fetchdata["phone"];
                        $_SESSION["email"] = $fetchdata["email"];
						$_SESSION["type"] = $fetchdata["type"];
                        
                        header("location: ChefHomePage.php");
                        exit();
                    }
				
				else{
                        header("location: adminLoginPage.php?error=wrongusertype");
                        exit();
                    }
				
				if ($fetchdata["type"] == NULL){
                        header("location: adminLoginPage.php?error=errdatatype");
                        exit();
                    }
				}
            }
        }
    }

//===========================================AdminPage================================================
    
    protected function getAllUsers(){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
        $dbtable="users";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        }
        else{
            $sql = "select * from $dbtable";
        
            $result = $conn->query($sql);
           
            if ($result->num_rows > 0) {
    
                echo "<div class='container'>";
				echo "<table class='table'>";
                echo "<tr>";
                echo "<th>User No</th>";
                echo "<th>User ID</th>";
				echo "<th>Password</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Phone Number</th>";
                echo "<th>Email</th>";
				echo "<th></th>";
                echo "</tr>";
    
                while ($row=$result->fetch_assoc()) {
					$uID = $row["uid"];
                    echo "<tr>";
                    echo "<td>" . $row["uid"] . "</td>";
                    echo "<td>" . $row["userID"] . "</td>";
					echo "<td>". $row["password"] ."</td>";
                    echo "<td>" . $row["fName"] . "</td>";
                    echo "<td>" . $row["lName"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
					echo "<td><button name='eButton' type='button' class='btn btn-info' onclick='editDetails(\"$uID\")' >Edit</button><a href='?user_id_del=".$uID."'  class='btn btn-danger ml-2'>Delete</a></td>";
                    echo "</tr>";
                }
    
                echo "</table>";
                
            }
            else {
                echo "<p style='color:Red;'>Empty Records</p>","<br>";
            }
        }
    }
	
    protected function getSearchUser($userID, $fName, $lName, $phone, $email){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
    
        $sql = "";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        }

        if ($userID != '' && $fName == '' && $lName == '' && $phone == '' && $email == '') {
            $sql = "SELECT * FROM users WHERE userID LIKE '%$userID%'";
        }
        else if ($userID == '' && $fName != '' && $lName == '' && $phone == '' && $email == '') {
            $sql = "SELECT * FROM users WHERE fName LIKE '%$fName%'";
        }
        else if ($userID == '' && $fName == '' && $lName != '' && $phone == '' && $email == '') {
            $sql = "SELECT * FROM users WHERE lName LIKE '%$lName%'";
        }
        else if ($userID == '' && $fName == '' && $lName == '' && $phone != '' && $email == '') {
            $sql = "SELECT * FROM users WHERE phone LIKE '%$phone%'";
        }
        else if ($userID == '' && $fName == '' && $lName == '' && $phone == '' && $email != '') {
            $sql = "SELECT * FROM users WHERE email LIKE '%$email%'";
        }
        else if ($userID == '' && $fName != '' && $lName != '' && $phone == '' && $email == '') {
            $sql = "SELECT * FROM users WHERE fName LIKE '%$fName%' AND lName LIKE '%lName%'";
        }
        else {
            echo "Please search based on one info or first AND last name together.";
            exit;
        }
    
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            echo "<div class='container'>";
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>User No</th>";
            echo "<th>User Name</th>";
            echo "<th>Password</th>";
            echo "<th>First Name</th>";	
            echo "<th>Last Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "<th></th>";
            echo "</tr>";
        
            while($row = $result->fetch_assoc()){
                $uID = $row["uid"];
                echo "<tr>";
                echo "<td>". $row["uid"] ."</td>";
                echo "<td>". $row["userID"] ."</td>";
                echo "<td>". $row["password"] ."</td>";
                echo "<td>". $row["fName"] ."</td>";
                echo "<td>". $row["lName"] ."</td>";
                echo "<td>". $row["phone"] ."</td>";
                echo "<td>". $row["email"] ."</td>";
                echo "<td><button name='eButton' type='button' class='btn btn-info' onclick='editDetails(\"$uID\")' >Edit</button></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        else { 
            echo "No results found"; 
        }
    }
	
	public function deleteUser($id)
    {
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "foodonclickdb";
        $dbtable = "users";

        $conn = new mysqli( $dbservername, $dbusername, $dbpassword, $dbname );

        if ( $conn->connect_error ) {die( "Connection failed: " . $conn->connect_error );}

        $sql = sprintf("DELETE FROM users WHERE uid = '%s'", $id);
        if ( $conn->query( $sql ) === TRUE ) {
            $message = "user deleted successfully";
            echo $message;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    protected function getAddUser($userID, $password, $fName, $lName, $phone, $email, $type){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
        $dbtable="users";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
                
        if ($conn->connect_error) 
            { die("Connection failed: " . $conn->connect_error); }

            $sql = "INSERT INTO $dbtable (userID, password, fName, lName, phone, email, type)
                VALUES ('$userID', '$password', '$fName', '$lName', '$phone', '$email', '$type')";

            if ($conn->query($sql) === TRUE) {
            $message = "New record created successfully";
            echo $message;
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    protected function getEditUsername($userID){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";

        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        }

        $sql = "UPDATE users SET userID='$userID' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New username successfully saved. Click refresh to show changes";
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }

    protected function getEditPW($password){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
    
        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }
        $sql = "UPDATE users SET password='$password' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New password successfully saved. Click refresh to show changes";
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }

    protected function getEditFName($fName){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";

        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE users SET fName='$fName' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New first name successfully saved. Click refresh to show changes";
        
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }   

    protected function getEditLName($lName){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
    
        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        }
        $sql = "UPDATE users SET lName='$lName' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New last name successfully saved. Click refresh to show changes";
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }

    protected function getEditPhone($phone){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";

        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }
        $sql = "UPDATE users SET phone='$phone' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New phone successfully saved. Click refresh to show changes";
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }

    protected function getEditEmail($email){
        $dbservername="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="foodonclickdb";
    
        $uid = $_GET['uid'];
    
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error); 
        }
        $sql = "UPDATE users SET email='$email' WHERE uid='$uid'";
        if ($conn->query($sql) === TRUE) {
            echo "New email successfully saved. Click refresh to show changes";
        }
        else {
            echo "Error: " . $sql . "<br>" > $conn->error;
        }
    }
}

?>