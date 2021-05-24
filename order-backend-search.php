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
        $sql = "SELECT `o`.*, `c`.`first_name`, `c`.`last_name`, `c`.`email`, `c`.`phone` 
				FROM `orders` AS `o` 
				LEFT JOIN `customers` AS `c` ON `c`.`id` = `o`.`customer_id` 
				WHERE `o`.`id` LIKE :term
				OR `c`.`first_name` LIKE :term
				OR `c`.`last_name` LIKE :term 
				OR `c`.`phone` LIKE :term
				OR `c`.`email` LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
		
        if($stmt->rowCount() > 0){
			while($order = $stmt->fetch()){
				$oid = $order['id'];
				$status = $order['status'];
				echo '<p>';
				if ( $status = "pending"){
					echo '<img src="images/packed.png" width="25px" height="25px" alt="Packed" title="Packed"/>';
				} elseif( $status = "delivery"){
					echo '<img style="background: #00FF21;" src="images/truck.png" width="50px" height="50px" alt="Delivery" title="Delivery"/>';
				} elseif( $status = "completed"){
					echo '<img style="background: #00FF21;" src="images/completed.png" width="50px" height="50px" alt="Completed" title="Completed"/>';
				} elseif( $status = "canceled"){
					echo '<img style="background: #00FF21;" src="images/cancelled.png" width="50px" height="50px" alt="Cancelled" title="Cancelled"/>';
				} else {
					echo '<img style="background: #00FF21;" src="images/error.png" width="50px" height="50px" alt="Error" title="Error"/>';
				}
?>
					<a href="orderview.php?oid=<?php echo $order['id']; ?>" style="text-decoration: none; color:black;"><?php echo $order['id'] . ' ' . $order['first_name'] . ' ' . $order['last_name'] . ' ' . $order['phone']  ?>
					</a>
				</p>
<?php
			}
		} else {
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