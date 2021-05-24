<?php
session_start();
include('db.php');
if ( isset( $_GET[ 'id' ] ) ){
	$ptid = strip_tags( trim( $_GET[ 'id' ] ) );	
} else {
	$ptid ='';
	echo '<script>window.location="index.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Product Type</title>
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
</head>
<body>
  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
      </a>
    </span>
	  Insert Logo Here
	  
	<div class="shop">
<?php
		$categoryQ = "SELECT * FROM `category`";
		$categoryR = $conn->query($categoryQ);
		
		$productQ = "SELECT * FROM `product`";
		$productR = $conn->query($productQ);
		
		$uomQ = "SELECT * FROM `uom`";
		$uomR = $conn->query($uomQ);
		
		$ptQ = "SELECT * FROM `producttype` WHERE `ptid` = '$ptid'";
		$ptR = $conn->query($ptQ);

		  if($ptR !== false) {
			foreach( $ptR as $productType){
				$ptstatus = $productType['status'];
				
				echo '<form action="admin.php" method="post" name="ptupdate" name="ptupdate">';
				echo '<table>';
				echo '<tr><td>Category</td></tr>';
				echo '<tr><td>';
				
				echo '<select name="categoryTypeGroup" id="categoryTypeGroup">';
				foreach( $categoryR as $category){
					if( $category['cid'] == $productType['cid'] ){
						echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '" selected >' . $category['categoryName'] . '';
					} else {
						echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '" >' . $category['categoryName'] . '';
					}					
				}
				echo '</td></tr>';				
				
				echo '<tr><td>Product</td></tr>';
				echo '<tr><td>';
				
				echo '<select name="productTypeGroup" id="productTypeGroup">';
				foreach( $productR as $product){
					if( $product['pid'] == $productType['pid'] ){
						echo '<option name="' . $product['productName'] . '" value="' . $product['pid'] . '" selected >' . $product['productName'] . '';
					} else {
						echo '<option name="' . $product['productName'] . '" value="' . $product['pid'] . '">' . $product['productName'];
					}					
				}
				echo '</td></tr>';
				echo '<tr><td>Unit Measure </td></tr>';
				echo '<tr><td style="align:left;">';
				echo '<input type="checkbox" name="kilo" value="' . $productType['kilo'] . '">Kilo';
				echo '</br>';
				
				echo '<tr><td>';
				echo '<input type="checkbox" name="box" value="' . $productType['box'] . '">Box';
				echo '</br>';
				
				echo '<tr><td>';
				echo '<input type="checkbox" name="punnet" value="' . $productType['punnet'] . '">Punnet';
				echo '</br>';
				
				echo '<tr><td>';
				echo '<input type="checkbox" name="bunch" value="' . $productType['bunch'] . '">Bunch';
				echo '<td></tr>';
				echo '<tr>';
				if ( $ptstatus == 1 ){
					echo '<td>';
					echo '<label for="active">Active</label>';
					echo '<input type="radio" id="active" name="ptstatus" value="1" checked>';
					echo '<label for="hold">Hold</label>';
					echo '<input type="radio" id="hold" name="ptstatus" value="0">';
					echo '</td>';
				} else {
					echo '<td>';
					echo '<label for="active">Active</label>';
					echo '<input type="radio" id="active" name="ptstatus" value="1" >';
					echo '<label for="hold">Hold</label>';
					echo '<input type="radio" id="hold" name="ptstatus" value="0" checked>';
					echo '</td>';
				}						 
				echo '</tr>';
				echo '<tr><td>Variety Name </td></tr>';
				echo '<td><input type="text" value="'. $productType['ptName'] .'" id="ptname" name="ptname"></td>';
				echo '</tr>';
				//echo '<tr>';
				//echo '<td>Variety Image </td><td><input type="text" value="'. $productType['ptImage'] .'" id="'. $productType['ptImage'] . '"></td>';
				//echo '</tr>';
				echo '<tr><td>Variety R.W.P Margin </td></tr>';
				echo '<tr><td><input type="number" size="7" step="0.1" min="0" value="'.$productType['rwpmargin'].' id="rwpmargin" name="rwpmargin" /><span style="font-size:25px;">%</span> </td></tr>';
				
				
				echo '<tr><td>Variety R.W.P </td></tr>';
				echo '<tr><td><span style="font-size:25px;">$</span><input type="number" size="7" step="0.1" min="0" value="'.$productType['rwp'].'" id="rwp" name="rwp"></td></tr>';
				
				echo '<tr><td>Variety R.R.P Margin </td></tr>';
				echo '<tr><td><input type="number" size="7" step="0.1" min="0" value="'.$productType['rrpmargin'].' id="rrpmargin" name="rrpmargin" /><span style="font-size:25px;">%</span> </td></tr>';
				
				
				echo '<tr><td>Variety R.R.P </td></tr>';
				echo '<tr><td><span style="font-size:25px;">$</span><input type="number" size="7" step="0.1" min="0" value="'.$productType['rrp'].'" id="rrp" name="rrp"></td></tr>';
				
				echo '<tr><td>Variety Blurb </td></tr>';
				echo '<tr><td><input type="text" row="20" cols="20" value="' . $productType['ptBlurb'] . '" id="ptblurb" name="ptblurb"></td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>Variety Receipe </td></tr>';
				echo '<tr><td><input type="text" row="20" cols="20" value="'.$productType['ptReceipe'].'" id="ptreceipe" name="ptreceipe">';
				echo '</td></tr>';
				echo '<tr><td>';
				echo '<input type="submit" value="Update" name="ptupdate-submit" id="ptupdate-submit" name="ptupdate-submit">';
				echo '<input type="button" value="No, go back!" onclick="history.go(-1)">';
				echo '</td></tr>';
				echo '</table>';
				echo '<input type="hidden" id="ptid" name="ptid" value="' . $ptid .'">';
				echo '</form>';
			}
		}
	
?>
	</div> <!-- END OF SHOP CLASS -->
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
			
			
		}
		  
		 		
		
</script>
</body>
</html>