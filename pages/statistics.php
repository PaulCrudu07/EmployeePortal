
<?php
if(!$_SESSION['loggedin']){
		//User is not logged in
		
		echo "<script> window.location.assign('index.php?p=login'); </script>";
		exit;
	}

?>

<br><br><h1><p style ='text-align:center; font-family:Helvetica,sans-serif;'> Statistics</h1>

<br><br>

    <div class="container">
        <table class="table"> <!--it creates a div tag that would allow the table created to have it's style modified-->
            <?php
             try {
    $pdo = new PDO('mysql:host=localhost;dbname=crup1_18_GraphTech', 'crup1_18_GraphTech', 'Skrrrt10');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $err) {
    die($err->getMessage());
}
            class TableRows1 extends RecursiveIteratorIterator { /*this table class is in charge of creating functions that will help display the information fetched from the database*/
                function _construct($it) {
                    parent::_construct($it, self::LEAVES_ONLY);
                }
                function current() {
                    return "<td style='width:150px;border:2px solid black;'>" . parent::current(). "</td>";
                }
                function beginChildren() {
                    echo "<tr>";
                }
                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }

            try { /*this try statement will fetch 3 different tables that will fetch the most common age, the oldest age and the youngest age, all ftom the 'employees' table.*/
                ?>
    
                <?php
                    echo "<tr><th><br>Most Common Age</th><th><br>Employee Department</th><th><br>Number of People</th></tr>"; /*the most common age table*/
                    $stmt2 = $pdo->query("SELECT  employee_age, employee_departament,  COUNT(employee_age) AS 'value_occurence' FROM employees GROUP BY employee_age ORDER BY 'value_occurence' DESC  LIMIT 1");
                    $stmt2->execute();
                    $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows1(new RecursiveArrayIterator($stmt2->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                ?>
    
                <?php 
                    echo "<tr><th><br>Oldest Employee</th><th><br>Employee Department</th><th><br>Employee Age</th></tr>"; /*the oldest employee table*/
                    $stmt3 = $pdo->query("SELECT employee_name, employee_departament, employee_age FROM employees WHERE employee_age = (SELECT MAX(employee_age) FROM employees)");
                    $stmt3->execute();
                    $result = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows1(new RecursiveArrayIterator($stmt3->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                ?>

                <?php
                    echo "<tr><th><br>Youngest Employee</th><th><br>Employee Department</th><th><br>Employee Age</th></tr>"; /*the youngest employee table */ 
                    $stmt4 = $pdo->query("SELECT employee_name, employee_departament, employee_age FROM employees WHERE employee_age = (SELECT MIN(employee_age) FROM employees)");
                    $stmt4->execute();
                    $result = $stmt4->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows1(new RecursiveArrayIterator($stmt4->fetchAll())) as $k=>$v) {
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


<br>
    <title>ChartJS - BarGraph</title>
<div class="row justify-content-center">
    <div class="col-md-6 float-md-end mb-3 ms-md-3 ">
<div id="chart-container" class="chart">
      <canvas id="mycanvas"></canvas>
    </div>
    </div>
</div>
    <style type="text/css">
      #chart-container {
        width: auto;
        height: auto;
        
      }
    </style>
  
    