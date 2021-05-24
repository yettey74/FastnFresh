<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $conn = new PDO("mysql:host=localhost;dbname=fnf", "root", "");
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

include 'apple/seed.php';
include_once 'Cart.class.php'; 
$itemArray = array();
$cart = new Cart;

if( $cart->contents() > 0 ){
	$cartItems = $cart->contents();
	foreach( $cartItems as $items ){
		foreach( $items as $key=>$value ){
			if ( $key == "id" ){
				array_push( $itemArray, $value);
			}
		}
	}
}

try{
    if(isset($_REQUEST["term"])){
		
		// get all the rows in product_cost_price that have endDate IS NULL
		
        $sql = "SELECT DISTINCT(`pt`.`ptName`) as `ptName`, `p`.`pid`,`p`.`productName`, `pt`.`ptid`, `pc`.`ptid` FROM `product` AS `p` JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` JOIN `product_cost_price` AS `pc` ON `pt`.`ptid` = `pc`.`ptid` WHERE `p`.`productName` LIKE :term OR `pt`.`ptName` LIKE :term ";
		
		// we need to get each array item and != 
		if ( !empty( $itemArray ) ){
			foreach( $itemArray as $ptidsincart ){
					$sql .= "&& `pt`.`ptid` != ' . $ptidsincart . '";
			}			
		}
		
		$sql .= " GROUP BY `p`.`productName`";
		
        $stmt = $conn->prepare($sql);
		
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
						&& `ptName` IS NOT NULL
						&& `ptName` != ''";						
						// we need to get each array item and != 
						if( !empty( $itemArray ) ){	
							foreach( $itemArray as $ptidsincart ){
								$ptQ .= "&& `ptid` != ' . $ptidsincart . '";
							}
						}
					$ptQ .= "ORDER BY `ptName` ASC";
				
				$ptS = $conn->prepare($ptQ);
				
				// bind parameters to statement
				$ptS->bindParam(":term", $pid);
				
				// execute the prepared statement
				$ptS->execute();
				if($ptS->rowCount() > 0){
					while($variety = $ptS->fetch()){
						
						$ptid = $variety['ptid'];
						
						$varietyinCart = false;
						
						$isPrice = isPrice( $conn, $ptid ); // there is a price in the system for this product
						
						$varietyinCart = in_array( $ptid, $itemArray );
						
						if( $isPrice == true && $varietyinCart !== true){
							$min = 1000;
							$itemType = getUomAndPrices( $conn, $ptid );
							foreach( $itemType as $key=>$value ){
								if( $value < $min ){
									$min = $value;
									$type = $key;
								}
							}
							
							/*echo '<form action="cartAction.php" method="post">';
								echo '<input type="hidden" name="id" value="' . $ptid . '" />';
								echo '<button type="submit" class="btn btn-sm btn-default" name="addToCart" value="" style="width:300px;">';
									echo '<img src="images/' .  $variety['ptImage'] . '" width="50px" height="50px" alt="Add to Cart" title="Add to Cart" /><br>' . $variety['ptName'] ;
								echo '</button>';
							echo '</form>';*/
						
						?>
							<form action="cartAction.php" method="post">
								<input type="hidden" name="row_id" value="0"/>
								<input type="hidden" name="qty" value="1"/>
								<input type="hidden" name="unitType" value="<?php echo $type; ?>"/>
								<input type="hidden" name="ptid" value="<?php echo $ptid; ?>"/>
								<div class="addToCart" style="text-align: center; content-align:center;">
									<button type="submit" class="btn btn-sm btn-default" name="addToCartFrontPage" style="width:300px;" value="">
										<img src="images/<?php echo $variety['ptImage']; ?>" width="50px" height="50px" alt="Add to Cart" title="Add to Cart" /><br><?php echo $variety['ptName']; ?>
									</button>
								</div>
							</form>
								
							<!--<a href="cartAction.php?action=addToCartFrontPage&id=<?php //echo $ptid; ?>&qty=1&unitType=<?php //echo $type; ?>" class="btn btn-success">
								<p style="width:275px;">	
									<img src="images/<?php //echo $variety['ptImage'] ?>" width="50px" height="50px" alt="<?php //echo $variety["ptName"]; ?>" title="<?php// echo $variety["ptName"]; ?>"/>&nbsp;<?php// echo $variety["ptName"]; ?>
								</p>
							</a>-->
						<?php
						}
					}/*echo '<span style="background-color:white; color: black;">';
							foreach( $itemArray as $thing ){
								foreach( $thing as $aItem ){
									echo $aItem . '<br>';
								}
							}
						echo '</span>';	*/				
				}
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
unset($conn);
?>