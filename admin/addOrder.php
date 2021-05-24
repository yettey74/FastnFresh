<?php
include 'sec.layer.php';

// Initialize shopping cart class 
include_once '../Cart.class.php'; 
$cart = new Cart; 
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savevariety.php" method="post">
	<center>
		<h2><i class="icon-plus-sign icon-large"></i> Add Customer Order</h2>
	</center>
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
<div class="shop">
<div class="container">
	<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Add Product OR Variety By Search..." />
        <div class="result"></div>
      </div>
    <h1>Customers Cart</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
						
                        <thead>
                            <tr>
                                <th class="text-center" width="17%">Variety</th>
                                <th class="text-center" width="17%">Type</th>
                                <th class="text-center" width="6%">Type</th>
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
                                <td><?php echo $item["name"]; ?></td>
								<td><?php echo $item["productName"]; ?></td>
								<td><img src="images/<?php echo $ptImage; ?>" width="50px" height="50px" alt="<?php $item["productName"]; ?>" title="<?php $item["productName"]; ?>" /></td>
                                
                                <td>
									<input class="form-control" type="number" min="0" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/>
								</td>								
								<td>
									<select id="unitType" name="unitType" tabindex=""  onchange="updateCartPrice(this, '<?php echo $item["rowid"] ; ?>')">
									<?php
									// load this from the db and not from the cached cart
										//echo '<option value="" selected="">Weigh By</option>';
										if( $item['single'] > 0){
											if( $item['single'] == $item['price']){
												echo '<option value="' . $item['single'] .'" selected="">Single $' . $item['single'] . '</option>';	
											} else {
												echo '<option name="single" value="' . $item['single'] .'">Single $' . $item['single'] .'</option>';
											}						
										} 
									
										if( $item['kilo'] > 0){
											if( $item['kilo'] == $item['price']){
												echo '<option value="' . $item['kilo'] .'" selected="">Kilo $' . $item['kilo'] . '</option>';
											} else {
												echo '<option value="' . $item['kilo'] .'">Kilo $' . $item['kilo'] . '</option>';
											}
										}
									
										if( $item['box'] > 0){								
											if( $item['box'] == $item['price']){
												echo '<option value="' . $item['box'] .'" selected="">Box $' . $item['box'] . '</option>';
											} else {
												echo '<option value="' . $item['box'] .'">Box $' . $item['box'] . '</option>';
											}
										}
									
										if( $item['bunch'] > 0){
											if( $item['bunch'] == $item['price']){
												echo '<option value="' . $item['bunch'] .'" selected="">Bunch $' . $item['bunch'] . '</option>';
											} else {
												echo '<option value="' . $item['bunch'] .'">Bunch $' . $item['bunch'] . '</option>';
											}
										}
									
										if( $item['punnet'] > 0 ){
											if( $item['punnet'] == $item['price']){
												echo '<option value="' . $item['punnet'] .'" selected="">Punnet $' . $item['punnet'] . '</option>';
											} else {
												echo '<option value="' . $item['punnet'] .'">Punnet $' . $item['punnet'] . '</option>';
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
</body>
</html>