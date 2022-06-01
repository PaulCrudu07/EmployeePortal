
<?php
//Check if the inputs are empty or not
if(isset($_POST['firstname']) || isset($_POST['lastname']) ||  isset($_POST['departament']) || isset($_POST['code']) || isset($_POST['email']) || isset($_POST['password'])){
		if(!$_POST['firstname'] ||	!$_POST['lastname'] || !$_POST['departament']  || !$_POST['email'] || !$_POST['password']){
		$error = "Please enter your name and an email and password";
	}
	//|Checking if the password lenght is less than 5 character
	if (strlen($_POST['password']) < 5) {
    $error = "Password must be more than 5 characters";
}
    
    
    if(isset($_POST['code']) && ($_POST['code']) !== "GlobalCompany2022"){
				
			
$error = "Code Incorrect";
			}
		   


    
    
    
    
    
    
    
    
    
    
    
    
	if(!$error){
	//If no errors the registration will continue 
	//Encrypt the password with a salt

	$encryptedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
  
	//Inserting the values from the input in database
	$query = "INSERT INTO admins (admin_firstname, admin_lastname, admin_departament, admin_email, admin_password) VALUES (:firstname, :lastname, :departament, :email, :password)";
	$result = $DBH->prepare($query);
	$result->bindParam(':firstname', $_POST['firstname']);
	$result->bindParam(':lastname', $_POST['lastname']);
    $result->bindParam(':departament', $_POST['departament']);
	$result->bindParam(':email', $_POST['email']);
	$result->bindParam(':password', $encryptedPass);
$result->execute();
//If everything is fine till here the user will be send to registersucces page
echo "<script> window.location.assign('index.php?p=login'); </script>";
}

}
	
									 							 
?>

<!--The form heading -->
<div class="card container mt-5" style="max-width: 700px;">
<div class="container">
<h1>Register</h1>
	<form action="index.php?p=register" method="post">
	<!--When the button is pressed the form will do the action written above-->
		<?php if($error){
	echo '<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Error:</span>
	'.$error.'
	</div>'; 
} ?>

		
		<div class="form-group">
			<label for="firstname">First Name</label>
			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="first name">
		</div>
		<div class="form-group">
			<label for="lastname">Last Name</label>
			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="last name">
		</div>
        <div class="form-group">
			<label for="lastname">Departament</label>
			<input type="text" class="form-control" id="departament" name="departament" placeholder="departament">
		</div>
        
         <div class="form-group">
			<label for="lastname">Code</label>
			<input type="text" class="form-control" id="code" name="code" placeholder="code">
		</div>
        
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="password">
		</div>
        <br>
		<button type="submit" class="btn btn-secondary">Register</button>
        <br>
	</form>
</div>
</div>