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
		// $sql = "select id, first_name, last_name, phone, email from (select distinct first_name, last_name, phone, email from customers WHERE `first_name` LIKE '%s%' ) customers";
        $sql = "SELECT * 
				FROM fnfCustomer
				WHERE `firstName` LIKE :term
				OR `lastName` LIKE :term 
				OR `phone1` LIKE :term
				OR `phone2` LIKE :term
				OR `email` LIKE :term
				OR `billStreetNumber` LIKE :term
				OR `billStreet` LIKE :term
				OR `billStreetType` LIKE :term
				OR `billSuburb` LIKE :term
				OR `billCity` LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
				$id = $row['customer_ID'];
				$fn = $row['firstName'];
				$ln = $row['lastName'];
				$phone1 = $row['phone1'];
				$phone2 = $row['phone2'];
				$email = $row['email'];
				$billStreetNumber = $row['billStreetNumber'];
				$billStreet = $row['billStreet'];
				$billStreetType = $row['billStreetType'];
				$billSuburb = $row['billSuburb'];
				$billCity = $row['billCity'];
                ?>		
					<p>	
						<a href="customers.php?id=<?php echo $id; ?>" style="text-decoration: none; color:black;"><?php echo $fn . ' ' . $ln . '<br>
						<img src="images/phone1.png" width="25px" weight="25px" title="Phone 1" alt="Phone 1" />' . $phone1 . '<br>
						<img src="images/phone2.png" width="25px" weight="25px" title="Phone 2" alt="Phone 2" />' . $phone2 . '<br>
						<img src="images/email.png" width="25px" weight="25px" title="Email" alt="Email 2" />' . $email  . '<br>
						<img src="images/street.png" width="25px" weight="25px" title="Street" alt="Street" />' . $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType . ',<br>' . $billSuburb; ?></a>
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