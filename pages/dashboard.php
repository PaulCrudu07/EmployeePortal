<?php
	if(!$_SESSION["loggedin"]){
		//User is not logged in
	
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}


?>



  <!--The form which after completion the admin will be able to add a new employee to the database and to the website-->
<div class="card container mt-5" style="max-width: 700px;">
 <div class="card-body">
	 
        <h1>Add A New Employee Now!</h1>
    	<p>Just enter the details in the form below!</p>
    	<!--The action which the form takes it after pressing the button -->
	 <form   action="ajax/addemployee.php" > <!--what you see below is the steps to create the form-->
		 <div class="row mb-3">
			 <label for="employeename" class="col-sm-3 col-form-label"> Employee Name:</label>
			  <div class="col-sm-5">
			 	<input type="text"class="form-control" name="employeename">
			 </div>
		 </div>
		 
		 <div class="row mb-3">
			 <label for="employeeemail" class="col-sm-3 col-form-label"> Employee Email:</label>
			  <div class="col-sm-5">
			 	<input type="text"class="form-control" name="employeeemail">
		 	  </div>
		 </div>
		 
		 <div class="row mb-3">
			 <label for="employeeage" class="col-sm-3 col-form-label"> Employee Age:</label>
			  <div class="col-sm-5">
				 <input type="text"class="form-control" name="employeeage">
			 </div>
		 </div>
         
          <div class="row mb-3">
			 <label for="employeedepartament" class="col-sm-3 col-form-label"> Employee Department:</label>
			  <div class="col-sm-5">
				 <input type="text"class="form-control" name="employeedepartament">
			 </div>
		 </div>
		 
		 <div class="row mb-3">
			 <label for="employeegender" class="col-sm-3 col-form-label"> Employee Gender:</label>
			  <div class="col-sm-5">
			 <input type="text"class="form-control" name="employeegender">
		 </div>
		 </div>
    		<button type="submit" class="btn btn-light">Add Employee!</button>
    	</form>
		</div>
    
</div>