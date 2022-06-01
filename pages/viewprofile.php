<div class="container card mt-5 " style="max-width: 700px;">
      <div class=”card-body”>

  <?php
if($_SESSION['loggedin'] &&   $_SESSION['superhero']){
	//If user logged in then select informations for that specific user that is logged in
		$query = "SELECT * FROM employees WHERE employee_id = :employeeid";
    	    $result = $DBH->prepare($query);
    	    $result->bindParam(':employeeid', $_SESSION['userData']['employee_id']);
    	    $result->execute();

    	    $userProfile = $result->fetch(PDO::FETCH_ASSOC);
	//Displaying the information that the user is having in database 
	
	echo" <h1> Welcome to your profile ". $userProfile['employee_name']."!</h2>";
	echo"<h2>Here you can see and modify your details!</h2>";
	echo "<br>";
	echo" <p1> First Name: ". $_SESSION['userData']['employee_name']."</p1>";
	echo "<br>";
	echo" <p1> Last Name: ". $_SESSION['userData']['employee_age']."</p1>";
	echo "<br>";
	echo" <p1> Email Adress: ". $_SESSION['userData']['employee_email']."</p1>";
	?>
	           <br><br>
	<p1>If You want to change your data speak with your manager!</p1>
          <br>
       <?php            
}else{
	//Display error
	$error = "No user id defined.";
}?>
	

	        
          

		
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          <?php

if($_SESSION['loggedin'] && !$_SESSION['superhero']){
	//If user logged in then select informations for that specific user that is logged in
		$query = "SELECT * FROM admins WHERE admin_id = :adminid";
    	    $result = $DBH->prepare($query);
    	    $result->bindParam(':adminid', $_SESSION['userData']['admin_id']);
    	    $result->execute();

    	    $userProfile = $result->fetch(PDO::FETCH_ASSOC);
	//Displaying the information that the user is having in database 
	
	echo" <h1> Welcome to your profile ". $userProfile['admin_firstname']."!</h2>";
	echo"<h2>Here you can see and modify your details!</h2>";
	echo "<br>";
	echo" <p1> First Name: ". $_SESSION['userData']['admin_firstname']."</p1>";
	echo "<br>";
	echo" <p1> Last Name: ". $_SESSION['userData']['admin_lastname']."</p1>";
	echo "<br>";
	echo" <p1> Email Adress: ". $_SESSION['userData']['admin_email']."</p1>";
	 
    ?>
    <!--Button to send the user to edit his details-->
		  <br><br>
	<a  href="https://www.crup1-18.wbs.uni.worc.ac.uk/Company/index.php?p=editprofile"  class="button">Edit Profile
		</a> 
         
          <?php
	
}else{
	//Display error
	$error = "No user id defined.";
}?>
		
    </div>
</div>

	<br><br><br><br><br><br><br>
		