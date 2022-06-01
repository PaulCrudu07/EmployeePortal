<?php
$check = isset($_POST['test1']) ? "checked" : "unchecked"; //this checking methods verify if the user is part of the admins or part of the employees. 
$check2 =isset($_POST['test2']) ? "checked" : "unchecked";

if(isset($_POST['email']) || isset($_POST['password'])){
	if(!$_POST['email'] || !$_POST['password']){	//account verification steps, it will show an error with a message if the email or the password are not typed in.
		$error = "Please enter an email and password";
	}

	if(!$error && $check == "checked"){
		//No errors - lets get the users account
		
		$query = "SELECT * FROM admins WHERE admin_email = :email";
		$result = $DBH->prepare($query);
		$result->bindParam(':email', $_POST['email']);
		$result->execute();

		$row = $result->fetch(PDO::FETCH_ASSOC);

		if($row){
		    	//If user exists than the system will verify the password introduced with the one from database
			if(password_verify($_POST['password'], $row['admin_password'])){
				session_start();
				$_SESSION['loggedin'] = true;
		    		$_SESSION['userData'] = $row;
                 $_SESSION['superhero'] = false; //this variable 'superhero' is set to determine if the account is admin or employee, if false it will be an admin account, if true, employee account.
					//If password match with the one from database than user is sended to the dasboard page 
		    		echo "<script> window.location.assign('index.php?p=dashboard'); </script>";
			}else{
$error = "Username/Password Incorrect";
			}
		   }else{
		    	$error = "Username/Password Incorrect";
		}
        
    }
        
        if(!$error && $check2 == "checked"){
		//No errors - lets get the users account
		
		$query = "SELECT * FROM employees WHERE employee_email = :email";
		$result = $DBH->prepare($query);
		$result->bindParam(':email', $_POST['email']);
		$result->execute();

		$row = $result->fetch(PDO::FETCH_ASSOC);

		if($row){
		    	//If user exists than the system will verify the password introduced with the one from database
			if(isset($_POST['password']) && ($_POST['password']) == "GlobalCompany2022"){
				session_start();
				$_SESSION['loggedin'] = true;
		    		$_SESSION['userData'] = $row;
                 $_SESSION['superhero'] = true;
					//If password match with the one from database than user is sended to the dasboard page 
		    		echo "<script> window.location.assign('index.php?p=home'); </script>";
			}else{
$error = "Username/Password Incorrect";
			}
		   }else{
		    	$error = "Username/Password Incorrect";
		}

        
        

}
}

?>
 	






<!--The form-->

<div class="card container mt-5" style="max-width: 700px;">
    <div class="card-body">
        <h1 class="mb-3">Login to your account</h1>
        <form action="index.php?p=login" method="post">
            <?php if($error){
            echo '<div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            '.$error.'
            </div>';
            } ?>
            
            <input type="checkbox" name="test1" value="value1"> Admin
            <input type="checkbox" name="test2" value="value2"> Employee
            <br>
            <br>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <br>
            <button type="submit" class="btn btn-secondary">Login</button>
        </form>
    </div>
</div>

<br><br><br><br>














