<?php
    require_once('../includes/db.php');

    
//If the id from the comment is registered and the button from the employees page pushed than that comment is deleted.
    	if($_GET['comment_id']){
			
        $query = "DELETE FROM comments WHERE comment_id = :commentid";
        $result = $DBH->prepare($query);
        $result->bindParam(':commentid', $_GET['comment_id']);
        $result->execute();

        echo "<script> window.location.assign('https://www.crup1-18.wbs.uni.worc.ac.uk/Company/index.php?p=forum'); </script>";
    }
?>