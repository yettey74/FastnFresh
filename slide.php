<span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
		  <img src="images/shop/store_logo_head400x120_trans.png" alt="logo" title="logo" />
      </a>
	<div style="float:right;">Beta Version 0.3.1</div>
	<div style="float:right;">
		<a href="cartview.php">
			<img src="images/cartYellow.png" width="135px" height="100px" alt="cart" title="cart" />
		</a>	
	</div>
	<?php
	 if ( $cart->total_items() > 0 ){
			  
			  echo '<a href="cartview.php">
			  			<div style="float: right;
			  				color: gold;
							text-align: center;
							font-size: 30px;
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style:inset;
							border-spacing: 20px; 
							padding: 10px; 
							width: auto;
							min-width: 135px; 
							height: 100px;" >';
			  
				  if ( $cart->total() > 0 ){
					  echo ' $ ' . number_format( $cart->total(), 2 , '.' , ',' );					 
				  } else {
					  echo ' $ ' . number_format( 0, 2 , '.' , ',' );					 
				  }
			  	echo '<br>';
				  if( $cart->total_items() == 1 ){
					  echo '<span style="color:green;">' . $cart->total_items() . ' Item</span>';
				  } else {
					  echo '<span style="color:green;">' . $cart->total_items() . ' Items</span>';				  
				  }	
			  echo '</div></a>';
	 }
		 ?>
</span>