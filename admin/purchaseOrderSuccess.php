<?php
include 'sec.layer.php';

sleep(2);
 
// Fetch order details from database 
$orderDetails = $conn->query("SELECT * FROM `purchaseorders` WHERE `po_id` = " . $_REQUEST['id'] ); 
 
if( $orderDetails !== FALSE  ){ 
    $orderInfo = $orderDetails->fetch();
	$orderID = $orderInfo['po_id'];
} else { 
	// There was no orders to return
    header( 'Location: index.php?e' ); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Order Status</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
	
</head>
<body>
<div class="container">
    <img src="images/store_logo_head400x120_trans.png" width="800px" height="240px" alt="Fast 'N' Fresh Produce" title="Fast 'N' Fresh Produce" />
    <div class="col-12">
        <?php if( !empty( $orderInfo ) ){ 
			$temp_date = $orderInfo['created_on'];
			$dt = new DateTime($temp_date);

			$date = $dt->format('d-m-Y');
			$time = $dt->format('h:i:s A');
		?>
            <div class="col-md-12">
                <div class="alert alert-success">
					Your order has been placed successfully.
					<br>
					<input type="button" value="Print this page" onClick="window.print()"> if you require a paper invoice.
					<br>
					We have sent an Electronic version to your email address.
				</div>
            </div>
			
			<div class="row">
				<div class="row col-lg-2 ord-contact-info" style="">	
				<div class="spacer" style="padding:20px; border-spacing: 20px;"></div>	
			</div>
            <!-- Order status & shipping info -->
            <div class="row col-lg-3 ord-addr-info" style="background-color: #39ff14; border-radius: 25px;">
                <div class="hdr" style="width: 100%; text-align: center; padding-top: 10px;"><strong>PURCHASE DETAILS</strong><br><hr style="border-top: 1px solid #dc3545;"></div>
				<div class="hdr" style="width: 100%;"><strong>Reference ID:</strong> #<?php echo $orderID; ?></div>
				<div class="hdr" style="width: 100%;"><strong>Grand Total:</strong> <?php echo '$' . number_format($orderInfo['grand_total'], 2, '.', ',' ) .' AUD'; ?></div>
				<div class="hdr" style="width: 100%;"><strong>Placed On:</strong> <?php echo $date; ?></div><div class="hdr" style="width: 100%;"><strong>Placed At:</strong> <?php echo $time; ?></div>
				<div class="hdr" style="width: 100%; height:100%;">&nbsp;</div>
				<div class="hdr" style="width: 100%; height:100%;">&nbsp;</div>
			</div>
			<div class="row col-lg-4 ord-contact-info" style="">	
				<div class="spacer" style="padding:20px; border-spacing: 20px;"></div>	
			</div>	
			<div class="row col-lg-3 ord-contact-info" style="background-color: paleturquoise; border-radius: 25px;">
                <div class="hdr" style="width: 100%; text-align: center; padding-top: 10px;"><strong>CONTACT US</strong><br><hr style="border-top: 1px solid #dc3545;"></div>
				<div class="hdr" style="width: 100%;"><b>Name:</b> Fast 'N' Fresh Produce</div>
				<div class="hdr" style="width: 100%;"><b>Address:</b> U 2 19 Showground Road, Tamworth, N.S.W, 2340</div>	
				<div class="hdr" style="width: 100%;"><b>Phone:</b> 0413 111 222</div>
				<div class="hdr" style="width: 100%;"><b>Email:</b> admin@fastnfreshproduce.com.au</div>
				<div class="hdr" style="width: 100%; height:100%;">&nbsp;</div>
				<div class="hdr" style="width: 100%; height:100%;">&nbsp;</div>		
				<div class="hdr" style="width: 100%; height:100%;">&nbsp;</div>						
			</div>
				<div class="row">
				<div class="row col-lg-2 ord-contact-info" style="">	
				<div class="spacer" style="padding:20px; border-spacing: 20px;"></div>	
			</div>
		</div>
		
            </div>
			<div class="spacer" style="padding:20px; border-spacing: 20px; height: 20px;"></div>
            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
							<th>Category</th>
							<th>Product</th>
                            <th>Variety</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Unit</th>
                            <th>Sub Total</th>
                            <th>Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $orderItemsQ = "SELECT pi.*, c.categoryName, p.productName, pt.ptName 
										  FROM `purchaseorder_items` AS `pi`						 
										  LEFT JOIN `producttype` AS `pt` 
										  ON `pt`.`ptid` = `pi`.`ptid`
										  RIGHT JOIN  `product` AS `p` 
										  ON `p`.`pid` = `pt`.`pid`
										  RIGHT JOIN  `category` AS `c` 
										  ON `c`.`cid` = `p`.`cid`
										  WHERE `pi`.`order_id` = $orderID
										  && `c`.`cid` = `pt`.`cid`
										  ORDER BY `c`.`categoryName`, `p`.`productName`, `pt`.`ptName` ASC";
						$orderItemsR = $conn->query( $orderItemsQ );	
	
						if($orderItemsR !== false) {
	
						foreach( $orderItemsR as $item ){
                                $unit = $item["uom_id"]; 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ( $price * $quantity ); 
                        ?>
								<tr>
									<td style="text-align:left;"><?php echo $item["categoryName"]; ?></td>
									<td style="text-align:left;"><?php echo $item["productName"]; ?></td>
									<td style="text-align:left;"><?php echo $item["ptName"]; ?></td>
									<td style="text-align:left;"><?php echo '$' . number_format($price, 2, '.', ',' ); ?></td>
									<td style="text-align:left;"><?php echo $quantity; ?></td>
									<td style="text-align:left;"><?php echo getUomLong( $conn, $unit ); ?></td>
									<td style="text-align:left;"><?php echo '$' . number_format($sub_total, 2, '.', ',' ); ?></td>
									<td></td>
								</tr>
                        <?php  
                        } 
						?>
						<tr>
							<td colspan="7"></td>
							<td style="text-align: left; color:red;">
								<strong>$<?php echo number_format($orderInfo['grand_total'], 2, '.', ',' ); ?> AUD</strong>
							</td>
						</tr>
						<tr>
							<td colspan="8" style="text-align:right; color:darkgreen;";>
								<strong>Thanking you for Shopping with us!</strong>
							</td>
						</tr>
						<tr>
							<td colspan="8">
								<a href="door.php">
									<img src="../images/home.png" width="25px" height="25px" alt="Home" title="Home">
								</a>
							</td>
						</tr>
                    </tbody>					
                </table>				
            </div>
        <?php }
		} else { 
	    ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>