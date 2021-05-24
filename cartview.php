<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include 'db.php';
include 'apple/seed.php';

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cart</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/slide.js" ></script>
	<style>
		.carousel-inner > .item > img, .carousel-inner > .item > a > img { width: 20%;
											margin: auto;
										  }
	</style>
		
<style>
::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: black;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: black;
}
</style>
<script type="text/javascript">
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
<script>
function updateCartPrice(obj, id){	
    $.get("cartAction.php", {action:"updateCartPrice", id:id, price:obj.value }, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
	
<style>
/* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
		text-color: black;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(top left, green, yellow);
		background-image: -o-linear-gradient(top left, green, yellow);
		background-image: linear-gradient(to bottom right, green, yellow);
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
		filter:alpha(opacity=150); /* IE */
		-moz-opacity:1.5; /* Mozilla */
		opacity: 1.5; /* CSS3 */
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(left, green, yellow);
		background-image: -o-linear-gradient(left, green, yellow);
		background-image: linear-gradient(left, green, yellow);
    }
    .result p:hover{
        background: orange;
    }
</style>
	<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".result").empty();
		
		// redirect may be required
    });
});
</script>
</head>
<body>
  <div id="content">
	 <?php $specials = getSpecialCount( $conn );
		include( 'slide.php' );
	    ( $specials > 0 )?? include( 'specials.php' );
	  ?>
	  	 
<div class="shop">
<div class="container">
	<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Add Product ..." />
        <div class="result"></div>
      </div>
    <h1>Your Cart</h1>
	<?php
/*	if( $cart->total_items() > 0 ){
		$cartArray = $cart->contents();
		foreach( $cartArray as $arrayItems ){
			foreach( $arrayItems as $key=>$value ){
				echo $key . ' => ' . $value .'<br>';
			}
		}
	}	*/
	?>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">						
                        <thead>
                            <tr>
                                <th class="text-center" width="17%">Product</th>
                                <th class="text-center" width="10%">Quantity</th>
                                <th class="text-center" width="9%">Unit</th>
                                <th class="text-center" width="17%">Price</th>
                                <th class="text-right" width="20%">Sub Total</th>
                            </tr>
                        </thead>
						
                        <tbody>
                            <?php 
                            if($cart->total_items() > 0){															
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
								foreach ($cartItems as $item){ 
									$ptid = $item["id"];
									$ptImageQ = $conn->query( "SELECT ptImage FROM `producttype` WHERE `ptid` = '$ptid'" );
									$ptInfo = $ptImageQ->fetch();	
									$ptImage = $ptInfo['ptImage'];
                            ?>
                            <tr>
                                <td>
									<span style="font-size: 14px; font-style: normal; font-weight:bolder;">
										<?php echo $item["name"] . ' ' . $item["productName"]; ?>
									</span>
									<br>
									<img src="images/<?php echo $ptImage; ?>" width="50px" height="50px" alt="<?php $item["productName"]; ?>" title="<?php $item["productName"]; ?>" />
								</td>
                                
                                <td>
									<input class="form-control" type="number" min="0" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/>
								</td>
								
								<td>
									<select id="unitType" 
											name="unitType" 
											tabindex=""  
											onchange="updateCartPrice(this, '<?php echo $item["rowid"] ; ?>')">
									<?php
									// load this from the db and not from the cached cart
									//echo '<option value="" selected="">Weigh By</option>';
									
									// get list of uoms
									$uomArray = getUomAndPrices( $conn, $ptid );
									ksort( $uomArray);
									
									foreach( $uomArray as $key=>$value ){
										if( $key == $item['type']){
											echo '<option value="' . $value . '" selected="">' . getUomLong( $conn, $key ). ' $' . number_format( $value, 2, '.', ',') . '</option>';	
										} else {
											echo '<option value="' . $value . '">' . getUomLong( $conn, $key ). ' $' . number_format( $value, 2, '.', ',') . '</option>';
										}										
									}									
									?>
									</select>
								</td>
								
								<td><span><?php echo '$' . number_format( $item["price"], 2, '.', ','); ?></span></td>
								
                                <td class="text-right"><?php echo '$' . number_format( $item["subtotal"], 2, '.', ','); ?></td>
								
                                <td colspan="2" class="text-right">
									<button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;">
										<img src="images/trashRed.png" width="25px" height="25px" alt="Remove" title="Remove" /> 
									</button> 
								</td>
                            </tr>
                            <?php }
							} else { ?>
                            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                            <?php } ?>
								
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td colspan="5"></td>
                                <td style="color:red; font-size:25px"><strong>Cart Total</strong></td>
                                <td class="text-right" style="color:red; font-size:24px"><strong><?php echo '$' . number_format( $cart->total(), '2', '.', ',' ); ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="index.php" class="btn btn-lg btn-block btn-warning">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php 
						if($cart->total_items() > 0){ 
							if( $cart->total() > 29 ) {
								echo '<div>';
								echo '<a href="checkout.php" class="btn btn-lg btn-block btn-success">Checkout</a>';
								echo '</div>';
							} else {
								echo '<div>';
								echo '<a href="index.php" class="btn btn-lg btn-block btn-danger">$30 Minimum</a>';
								echo '</div>';
							}
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- END OF SHOP CLASS -->
<?php include( 'menu.php');?>
</body>
</html>