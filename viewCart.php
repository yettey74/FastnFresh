<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include('db.php');

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
sleep(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart Area</title>
<meta charset="utf-8">
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap core CSS 
<link href="css/bootstrap.min.css" rel="stylesheet">-->
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script>
	  function openSlideMenu(){
		document.getElementById('menu').style.width = '250px';
		document.getElementById('content').style.marginLeft = '250px';
	  }
	  function closeSlideMenu(){
		document.getElementById('menu').style.width = '0';
		document.getElementById('content').style.marginLeft = '0';
	  }		
    </script>
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
function updateCartWeight(obj, id){	
    $.get("cartAction.php", {action:"updateCartPrice", id:id, price:obj.value}, function(data){
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
<div class="container">
	<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Add Product OR Variety By Search..." />
        <div class="result"></div>
      </div>
    <h1>Your Cart</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="17%">Variety</th>
                                <th width="17%">Type</th>
                                <th width="10%">Quantity</th>
                                <th width="9%">Unit</th>
                                <th width="17%">Price</th>
                                <th class="text-right" width="20%">Sub Total</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($cart->total_items() > 0){															
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
								foreach ($cartItems as $item){
                            ?>
                            <tr>
                                <td><?php echo $item["name"]; ?></td>
								<td><?php echo $item["productName"]; ?></td>
                                
                                <td>
									<input class="form-control" type="number" min="0" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/>
								</td>								
								<td>
									<select id="unitType" name="unitType" tabindex=""  onchange="updateCartWeight(this, '<?php echo $item["rowid"] ; ?>')">
									<?php	
										//echo '<option value="" selected="">Weigh By</option>';
										if( $item['single'] > 0){
											if( $item['single'] == $item['price']){
												echo '<option value="' . $item['single'] .'" selected="">Single</option>';						
											} else {
												echo '<option value="' . $item['single'] .'">Single</option>';
											}								
																		
										} 
									
										if( $item['kilo'] > 0){
											if( $item['kilo'] == $item['price']){
												echo '<option value="' . $item['kilo'] .'" selected="">Kilo</option>';
											} else {
												echo '<option value="' . $item['kilo'] .'">Kilo</option>';
											}
										}
									
										if( $item['box'] > 0){								
											if( $item['box'] == $item['price']){
												echo '<option value="' . $item['box'] .'" selected="">Box</option>';
											} else {
												echo '<option value="' . $item['box'] .'">Box</option>';
											}
										}
										if( $item['bunch'] > 0){
											if( $item['bunch'] == $item['price']){
												echo '<option value="' . $item['bunch'] .'" selected="">Bunch</option>';
											} else {
												echo '<option value="' . $item['bunch'] .'">Bunch</option>';
											}
										}
									
										if( $item['punnet'] > 0 ){
											if( $item['punnet'] == $item['price']){
												echo '<option value="' . $item['punnet'] .'" selected="">Punnet</option>';
											} else {
												echo '<option value="' . $item['punnet'] .'">Punnet</option>';
											}
										}
									?>
									</select>
								</td>
								<td><?php echo '<span>$</span>' . number_format( $item["price"], 2, '.', ','); ?></td>
								
                                <td class="text-right"><?php echo '$' . number_format( $item["subtotal"], 2, '.', ','); ?></td>
								
                                <td colspan="2" class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><img src="images/trashRed.png" width="25px" height="25px" alt="Remove" title="Remove" /> </button> </td>
                            </tr>
                            <?php }
							} else { ?>
                            <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td colspan="4"></td>
                                <td style="color:red; font-size:10px"><strong>Cart Total</strong></td>
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
                        <!--<a href="index.php" class="btn btn-block btn-warning">Continue Shopping</a>-->
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn btn-lg btn-block btn-success">Checkout</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>