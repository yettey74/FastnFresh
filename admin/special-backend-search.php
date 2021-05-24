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
        $stmt = $pdo->prepare("SELECT * 
								FROM special
								WHERE `specialTitle` LIKE :term
								OR `specialBlurb` LIKE :term");
        $term = '%' . $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
				$id = $row['sid'];
				$st = $row['specialTitle'];
				$sb = $row['specialBlurb'];
                ?>		
					<p>	
						<a href="customers.php?id=<?php echo $id; ?>" style="text-decoration: none; color:black;">
							<?php echo $st ?>
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