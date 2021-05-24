<?php
include 'sec.layer.php';
 
// Initialize shopping cart class 
include_once '../Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if( $cart->total_items() <= 0 ){ 
    header("Location: purchaseOrder.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])? $_SESSION['postData'] : array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])? $_SESSION['sessData'] : ''; 
if( !empty( $sessData['status']['msg'] ) ){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset( $_SESSION['sessData']['status'] ); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
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
    <h1>Raise Order</h1>
	<?php
/*	foreach( $_SESSION as $key=>$value ){
		echo $key . '=>' . $value . '<br>';
	}*/
	
	
	?>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
					<div class="col-md-12">
						<div class="alert alert-success"><?php echo $statusMsg; ?></div>
					</div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
					<div class="col-md-12">
						<div class="alert alert-danger"><?php echo $statusMsg; ?></div>
					</div>
                <?php } ?>
				
				<!-- START ADD MORE ITEMS -->
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
							?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">
										<span>
											<?php echo $item["qty"]; ?> 
											<?php echo strtoupper( getUomLong( $conn, $item["type"] ) ); ?>
											<?php echo $item["name"]; ?>
										</span>
									</h6>
								</div>
								<span class="text-muted"><?php echo '$' . number_format($item["subtotal"], '2', '.', ','); ?></span>
							</li>
						<?php } 
						} ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (AUD)</span>
                            <strong><?php echo '$' . number_format( $cart->total(), '2','.', ','); ?></strong>
                        </li>
                    </ul>
                    <a href="addProcurement.php" class="btn btn-block btn-warning">Add More Items</a>
                </div>
				
				<!-- END ADD MORE ITEMS -->
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Purchase details below</h4>
                    <form action="cartAction.php" method="post" >
                        <div class="row">
                            
						<input type="hidden" name="emp_id" value="<?php echo isset($_SESSION['emp_id'])? $_SESSION['emp_id']:''; ?>"/>
						<input type="hidden" name="action" value="placeOrder"/>
						<br>
						<br>
						<input class="btn btn-success btn-lg btn-block" type="submit" name="checkoutSubmit" width="256px" height="35px" value="Place Order">
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
	
</body>
</html>