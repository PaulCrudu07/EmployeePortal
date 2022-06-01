<?php

if(!$_SESSION['loggedin']){
		//User is not logged in
		
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}

?>
<br><br>
<div class="table-responsive"> 
  
    <table style='max-width:600px; margin-left:auto; margin-right:auto; overflow-x:none;' class="table" >
      <!--it creates a tag that would allow the table created to have it's style modified-->
 
        
        <?php
            try {
    $pdo = new PDO('mysql:host=localhost;dbname=crup1_18_GraphTech', 'crup1_18_GraphTech', 'Skrrrt10');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $err) {
    die($err->getMessage());
}
            class TableRows extends RecursiveIteratorIterator { /*this table class is in charge of creating functions that will help display the information fetched from the database*/
                function _construct($it) {
                    parent::_construct($it, self::LEAVES_ONLY);
                }
                function current() {
                    return "<td style='width:auto; border:2px solid black;'>" . parent::current(). "</td>";
                }
                function beginChildren() {
                    echo "<tr>";
                }
                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }
            try { /*this try statement will fetch a list with all the employees and their information from the 'employees' table from the database.*/
               echo "<br><br><h1><p style ='text-align:center; font-family:Helvetica,sans-serif;'> All Employees Table</h1>";
                echo "<br><tr><th><br>Name<br></th><th><br>Email</th><th><br>Age</th><th><br> Department</th></tr><br>";
                
                $stmt = $pdo->query("SELECT employee_name, employee_email, employee_age, employee_departament FROM employees");
                
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                    
                }
            } 
        
                catch(PDOException $e) { /*this exception will give an error if something is wrong, most likely the connection between with the database is not existent or if a problem occurs*/
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>"; 
        ?>
    </table>
</div>        
<br><br><br><br><br><br>