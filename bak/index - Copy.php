<?php
session_start();
include('db.php');

if (isset($_POST['login'])) {
 
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    //$loginQ = "SELECT * FROM `user` WHERE `email` = '$email' && `password` = '$password'";
    $loginQ = "SELECT * FROM `user` WHERE `email` = '$email' ";
	$loginR = $conn->query($loginQ);
	if( $loginR == TRUE ) {
		foreach( $loginR as $log){
			echo '<p class="success">Congratulations, you are logged in!</p>';
			echo 'Good ' . $loginQ;
			$_SESSION ['loggedin'] = '1';
			$_SESSION ['uid'] = $log['user_id'];
			$_SESSION ['email'] = $log['email'];
			$_SESSION ['cart'] = '';
		}
		
	} else {
		echo '<p class="error">Email password combination is wrong!</p>';
		echo 'Bad ' . $loginQ;
		
	}
	
	$conn=null;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Index Copy</title>
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
	<?php
	$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	?>
  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
      </a>
    </span>
	  Insert Logo Here
	  <?php 
	  foreach ( $_SESSION as $key=>$value ){
		echo '<br>' . $key . ' : ' . $value . '<br>';
	  }
		if( isset( $_SESSION["email"]) ){
			$arr = explode("@", $_SESSION["email"], 2);			
			$name  = $arr[0];
			echo '<br>Hi, ' . $name . '<br>';
		}
		 ?>
	  
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
		  $categoryQ = "SELECT * FROM `category` WHERE `status` = '1'";
		  $categoryR = $conn->query($categoryQ);

		  if($categoryR !== false) {
			foreach( $categoryR as $category){
				$cid = $category['cid'];
				echo '<button class="accordion">' . $category['categoryName'] . '</button>';
				echo '<div class="panel">';
				
				$productQ = "SELECT * FROM `product` WHERE `cid` = '$cid' && `status` = '1'";
		  		$productR = $conn->query($productQ);
				
				if($productR !== false) {
					foreach($productR as $product) {
						$pid = $product['pid'];
						echo '<button class="accordionproduct">' . $product['productName'] . '</button>';
						echo '<div class="panel">';						
						$productTypeQ = "SELECT * FROM `producttype` WHERE `pid` = '$pid' && `status` = '1'";
		  				$productTypeR = $conn->query($productTypeQ);
						if($productTypeR !== false) {
							echo '<div class="productRow">';							
							foreach($productTypeR as $productType) {
								$ptid = $productType['ptid'];
								echo '<div class="child-left">';
								echo '<div style="text-align: center; color:black;">' . $productType['ptName'] . '</div>';
								echo '<div class="productImage"><img src="images/' . $productType['ptImage'] . '" width=50px; height=50px; /></div>';
								echo '<div class="productPrice" style="text-align: center;">$' . $productType['ptPrice'] . '</div>';
								echo '<div class="productAmount" style="text-align: center;"><input type="number" size="5" step="1" min="0" value="" name="' . $ptid . '" id="' . $ptid .'"></div>';
								echo '<div class="productBlurb" style="text-align: center;">' . $productType['ptBlurb'] . '</div>';
								echo '</div>'; // END CHILD-LEFT
							}
							echo '</div>'; // END PRODUCTTYPE ROW
							echo '<div class="clear"></div>';
						}
						echo '</div>';
					} 
				} 
				echo '</div>';
			}
			echo '</div>'; // END PANEL CLASS
		  }
?>
	</div> <!-- END OF SHOP CLASS -->
    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
		
      	<a href="index.php">Shop</a>
		
		<?php			
			if( !isset( $_SESSION["loggedin"]) ){
				echo 'Login / Register';
				echo '<form method="post" action="#" name="signin-form">';
				echo '<div class="form-element">
						<label>Email</label>
						<input type="email" name="email" required />
					  </div>
					  <div class="form-element">
						<label>Password</label>
						<input type="password" name="password" required />
					  </div>
						<button type="submit" name="login" value="Login">Log In</button>
						<button type="submit" name="register" value="Register">Register</button>
					</form>';			
				
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
		  
		var accprod = document.getElementsByClassName("accordionproduct");
		var i;

		for (i = 0; i < accprod.length; i++) {
		  accprod[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
			  panel.style.display = "none";
			} else {
			  panel.style.display = "block";
			}
		  });
		}	
		}
		
</script>
</body>
</html>