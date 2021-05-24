<?php
session_start();
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Frontpage</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
	
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
	
	<style>
	.quick{
		backround: #08FF08;
		border-radius: 11px;
		padding: 20px 45px;
		color: #08FF08;
		display: inline-block;
		font: normal bold 16px/1 "open sans", sans-serif;
		text-align: center;
	}
    </style>
</head>
<body>

  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
      </a>
    </span>
	  Insert Logo Here
	  
	  <button class="accordion"><i class="fas fa-shopping-cart"></i></button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <i class="fas fa-shopping-cart fa-3x"></i>
			  </div>
		  </div>
		  </p>
	  </div>
		  
	<div class="shop">
<?php
		  $categoryQ = "SELECT * FROM `category`";
		  $categoryR = $conn->query($categoryQ);

		  if($categoryR !== false) {
			foreach( $categoryR as $category){
				$cid = $category['cid'];
				echo '<button class="accordion">' . $category['categoryName'] . '</button>
					  <div class="panel">
					  <p>
					  <div id="parent">';
				
				$productQ = "SELECT * FROM `product` WHERE `cid` = '$cid'";
		  		$productR = $conn->query($productQ);
				if($productR !== false) {
					foreach($productR as $product) {
						$pid = $product['pid'];
						echo '<div class="title" style="color:black;"><strong>' . $product['productName'] . '</strong><br>';	
						
						$productTypeQ = "SELECT * FROM `producttype` WHERE `pid` = '$pid'";
		  				$productTypeR = $conn->query($productTypeQ);
						if($productTypeR !== false) {
							foreach($productTypeR as $productType) {
								echo '<div id="child-left">';
								echo '<div class="title" style="color:black;"><strong>' . $productType['ptName'] . '</strong><br>';
								echo'</div></div>';
							}
						} else {
							echo '<div id="child-left">';
							echo '<div class="title" style="color:black;"><strong>No Products Type to display.</strong><br>';
							echo'</div></div>';
						}
					}				
				} else {
					echo '<div id="child-left">';
					echo '<div class="title" style="color:black;"><strong>No Products to display.</strong><br>';
					echo'</div></div>';
				}
			} 					
		  } else {
				echo '<div class="title" style="color:black;"><strong>No Categories to display.</strong>';
				echo'</div></div>';		
		  }
?>
		
			  
	</div> <!-- END PARENT DIV-->
		  </p>
</div> <!-- END CONTENT DIV-->
		</div>
	</div> 

    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
      	<a href="#order">Order</a>
		<?php
			if( !isset( $_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == FALSE ){
				echo '<a href="login.html">Login</a>';
				echo '<a href="rego.html">Register</a>';
			}
		?>		
  	</div>
	  <script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
			  panel.style.display = "none";
			} else {
			  panel.style.display = "block";
			}
		  });
		}

		  function update( id  ){
			var itemID = document.getElementsById( id );
			var itemAmount = document.getElementsById( id ).value;
			var cart = [];
			  alert("you added" + itemAmount + " " + itemID );
			if ( cart.length === 0 ){
				cart.add([ itemID, itemAmount]);
				// update dom
				alert("you added" + itemAmount + " " + itemID );
			} 
			// check if already in cart
			
			// if not in cart then add to array
			// else update with current value
			
			
		}
		  
		 		
		
</script>
</body>
</html>