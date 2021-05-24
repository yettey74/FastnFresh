<?php
include( 'db.php' );
 
// Attempt search query execution
try{
    if( isset( $_REQUEST["term"] ) ){
        // create prepared statement
        $sql = "SELECT `p`.* , `pt`.* 
				FROM `product` AS `p`
				LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` 
				WHERE `p`.`productName` LIKE :term 
				OR `pt`.`ptName` LIKE :term
				&& `p`.`productName` != 'NULL' 
				&& `p`.`productName` != '' 
				&& `pt`.`ptName` != 'NULL'
				&& `pt`.`ptName` != ''
				&& `p`.`status` = '1'
				&& `p`.`archive` = '0'
				&& `pt`.`status` = '1'
				&& ``pt`.`archive` = '0'
				GROUP BY `p`.`productName`";
		
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
				$pid = $row['pid'];				
					$ptQ = "SELECT `ptid`, `ptName`, `ptImage` 
					FROM `producttype` 
					WHERE `pid` = :term
					&& `ptName` != 'NULL'
					&& `ptName` != ''					
					&& `status` = '1'
					&& `archive` = '0'";
					$ptS = $pdo->prepare($ptQ);
					$ptTerm = $pid;
					// bind parameters to statement
					$ptS->bindParam(":term", $ptTerm);
					// execute the prepared statement
					$ptS->execute();
					if( $ptS->rowCount() > 0 ){
						while( $variety = $ptS->fetch() ){?>
							<p>	<a href="itemview.php?id=<?php echo $variety['ptid']; ?>" class="btn btn-success">
								<img src="../images/<?php echo $variety['ptImage'] ?>" width="15px" height="15px" alt="<?php echo $variety["ptName"]; ?>" title="<?php echo $variety["ptName"]; ?>"/>&nbsp;<?php echo $variety["ptName"]; ?>
								</a>
							</p>
			<?php
						}
					}
			}
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Close connection
unset($pdo);
?>