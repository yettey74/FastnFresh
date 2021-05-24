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
        $sql = "SELECT * FROM purchaseOrders WHERE `id` LIKE :term";		
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
		
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
		
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
			?>

				<p>	<a href="purchaseOrderView.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
					<img src="images/<?php echo $row['ptImage'] ?>" width="15px" height="15px" alt="<?php echo $row["ptName"]; ?>" title="<?php echo $row["ptName"]; ?>"/>&nbsp;<?php echo $row["ptName"]; ?>
					</a>
				</p>
			<?php
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