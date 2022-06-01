
<?php

if(!$_SESSION['loggedin']){
		//User is not logged in
		
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}
//Information from search will display the employee the user is looking for 
	if(isset($_POST['search'])){
		$search = '%'.$_POST['search'].'%';
		$query = "SELECT * FROM employees WHERE employee_name LIKE :search OR employee_departament LIKE :search   ";
		$result = $DBH->prepare($query);
		$result->bindParam(':search', $search);
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	
		?>
<br>
<div class="container card mt-5" style="max-width:700px;">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['employee_name'];  ?></h5>
    <p class="card-text"><?php echo $row['employee_departament'];  ?><br><?php echo $row['employee_age'];  ?> </p>
    <p class="card-text"><small class="text-muted"><?php echo $row['employee_email'];?>
</small></p>

	 
  </div>
</div>

	<?php		
}
	}



?>


        
        
