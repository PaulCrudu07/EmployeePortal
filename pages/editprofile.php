<?php
	if(!$_SESSION['loggedin']){
		//User is not logged in
		
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}


?>
<div class="container card mt-5" style="max-width: 700px;">
     <div class="card-body">
	<h1>Edit your profile</h1>
	<p>Complete the form below to edit your profile.</p>

<?php

    		if(isset($_POST['submit'])){

    		//Updating the user table with the information from the inputs
    				$query = "UPDATE admins SET admin_firstname = :firstname, admin_lastname = :lastname, admin_departament = :departament, admin_email = :email WHERE admin_id = :adminid";
    			
    		    $result = $DBH->prepare($query);
    		    $result->bindParam(':firstname', $_POST['fname']);
    		    $result->bindParam(':lastname', $_POST['lname']);
                $result->bindParam(':departament', $_POST['adepartament']);
    		    $result->bindParam(':email', $_POST['aemail']);
    		    
    		    
    		    $result->bindParam(':adminid', $_SESSION['userData']['admin_id']);
    		    if($result->execute()){
    		    	echo '<div class="alert alert-success" role="alert">Your profile has been updated!</div>';
    		    }
    		}

    		//Get current values
    		$query = "SELECT * FROM admins WHERE admin_id = :adminid";
    	    $result = $DBH->prepare($query);
    	    $result->bindParam(':adminid', $_SESSION['userData']['admin_id']);
    	    $result->execute();

    	    $userProfile = $result->fetch(PDO::FETCH_ASSOC);

    	?>

    	<form method="post" action="" enctype="multipart/form-data">
    		<div class="form-group">
    			<label for="fname">First Name</label>
    			<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $userProfile['admin_firstname']; ?>">
    		</div>
    		
    		<div class="form-group">
    			<label for="lname">Last Name</label>
    			<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $userProfile['admin_lastname']; ?>">
    		</div>
            <div class="form-group">
    			<label for="uemail">Departament</label>
    			<input type="text" class="form-control" id="adepartament" name="adepartament" value="<?php echo $userProfile['admin_departament']; ?>">
    		</div>
    		<div class="form-group">
    			<label for="uemail">Email</label>
    			<input type="email" class="form-control" id="aemail" name="aemail" value="<?php echo $userProfile['admin_email']; ?>">
    		</div>
    		<br>
    		<button type="submit" name="submit" class="btn btn-secondary">Update Profile</button>
    	</form>
      </div>
</div>
