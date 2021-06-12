<?php
// Start session 
if(!session_id()){ 
    session_start();	
}
// Include the database config file 
require_once 'db.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if( $cart->total_items() <= 0 ){ 
    header("Location: index.php"); 
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
    <h1>CHECKOUT</h1>
	<?php
	$cartArray = $cart->contents();
	/* foreach( $cartArray as $arrayItems ){
			foreach( $arrayItems as $key => $value ){
				echo $key . ' => ' . $value .'<br>';
			}
		} */
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
							include 'apple/seed.php';
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
							?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">
										<span>
											<?php echo $item["qty"]; ?> 
											<?php echo getUomLong( $conn, $item["type"] ); ?> 
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
                    <a href="index.php" class="btn btn-block btn-warning">Add More Items</a>
                </div>
				
				<!-- END ADD MORE ITEMS -->
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Contact Details</h4>
                    <form action="cartAction.php" method="post" >
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
								<?php 
							if( isset( $postData['first_name'] ) ){
								echo '<input type="text" class="form-control" name="first_name" value="' . $postData['first_name'] . '" required>';
							} else if( isset( $_SESSION['first_name']) ){
								echo '<input type="text" class="form-control" name="first_name" value="' . $_SESSION['first_name'] . '" required>';
							} else {
								echo '<input type="text" class="form-control" name="first_name" value="" required>';
							}
							?> 
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name</label>
								<?php 
							if( isset( $postData['last_name'] ) ){
								echo '<input type="text" class="form-control" name="last_name" value="' . $postData['last_name'] . '" required>';
							} else if( isset( $_SESSION['last_name']) ){
								echo '<input type="text" class="form-control" name="last_name" value="' . $_SESSION['last_name'] . '" required>';
							} else {
								echo '<input type="text" class="form-control" name="last_name" value="" required>';
							}
							?>                              
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
							<?php 
							if( isset( $postData['email'] ) ){
								echo '<input type="email" class="form-control" name="email" value="' . $postData['email'] . '" required>';
							} else if( isset( $_SESSION['email']) ){
								echo '<input type="email" class="form-control" name="email" value="' . $_SESSION['email'] . '" required>';
							} else {
								echo '<input type="email" class="form-control" name="email" value="" required>';
							}
							?>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo (!empty($postData['phone'])? $postData['phone'] : (!empty($_SESSION['phone'])? $_SESSION['phone'] : '')) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])? $postData['address'] : (!empty($_SESSION['address'])? $_SESSION['address'] : ''); ?>" required>
                        </div>
                    
						<input type="hidden" name="customer_id" value="<?php echo isset($_SESSION['uid'])? $_SESSION['uid']:'333'; ?>"/>
						<input type="hidden" name="action" value="placeOrder"/>
                        <input class="btn btn-success btn-lg btn-block" type="submit" name="checkoutSubmit" value="Place Order">
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
	
</body>
</html>