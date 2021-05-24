<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=fnf", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
		// SELECT DISTINCT(`p`.`pid`), `p`.`productName`, `p`.`productImage`, `pt`.`ptName` FROM `product` AS `p` LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` WHERE `p`.`productName` LIKE '%parsley%' OR `pt`.`ptName` LIKE '%parsley%' && `p`.`productName` != 'NULL' && `pt`.`ptName` != 'NULL'
        $sql = "SELECT `p`.* , `pt`.* 
		FROM `product` AS `p`
		LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` 
		WHERE `p`.`productName` LIKE :term 
		OR `pt`.`ptName` LIKE :term
		&& `p`.`productName` != 'NULL' 
		&& `p`.`productName` != '' 
		&& `pt`.`ptName` != 'NULL'
		&& `pt`.`ptName` != ''
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
					&& `ptName` != ''";
					$ptS = $pdo->prepare($ptQ);
					$ptTerm = $pid;
					// bind parameters to statement
					$ptS->bindParam(":term", $ptTerm);
					// execute the prepared statement
					$ptS->execute();
					if($ptS->rowCount() > 0){
						while($variety = $ptS->fetch()){?>
							<p>	<a href="cartAction.php?action=addToCart&id=<?php echo $variety['ptid']; ?>" class="btn btn-success">
								<img src="images/<?php echo $variety['ptImage'] ?>" width="15px" height="15px" alt="<?php echo $variety["ptName"]; ?>" title="<?php echo $variety["ptName"]; ?>"/>&nbsp;<?php echo $variety["ptName"]; ?>
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
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Close connection
unset($pdo);
?>