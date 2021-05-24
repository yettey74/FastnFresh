<?php
session_start();
include('db.php');
setlocale(LC_MONETARY, 'en_US.UTF-8');

/*********************************************
ADD NEW CATEGORY
*********************************************/
if ( !empty( $_POST[ 'category-submit' ] ) ){
	$categoryname = isset( $_POST[ 'categoryname' ] )? $_POST[ 'categoryname' ] : '';
	$addCatQ = "INSERT INTO `category` (`categoryName`, `status`) VALUES ('$categoryname', '1')";
	if( $conn->exec( $addCatQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $addCatQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $addCatQ;
	}
	
}

/*********************************************
UPDATE CATEGORY STATUS
*********************************************/
if ( isset( $_GET[ 'cid' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'update' ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$cid = strip_tags( trim( $_GET[ 'cid' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );	
	
	if ( $status == '0' ){
		$sql = "UPDATE `category` SET `status` = '1' WHERE `cid` = '$cid'";		
	} else {
		$sql = "UPDATE `category` SET `status` = '0' WHERE `cid` = '$cid'";		
	} 
	
	if( $conn->exec($sql) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $sql;
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $sql;
	}	
} else {
	// we have not passd the right data
}

/*********************************************
DELETE CATEGORY
*********************************************/
if ( isset( $_GET[ 'cid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'delete' ){
	$cid = isset( $_GET[ 'cid' ] )? $_GET[ 'cid' ] : '';
	$archivecategoryQ = "UPDATE `category` SET `archive` = '1' WHERE `cid` = '$cid'";
	
	if( $conn->exec( $archivecategoryQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $archivecategoryQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $archivecategoryQ;
	}
	echo 'Action : ' . $_GET[ 'action' ];
	
}


/*********************************************
UPDATE PRODUCT STATUS
*********************************************/
if ( isset( $_GET[ 'pid' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'update' ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$pid = strip_tags( trim( $_GET[ 'pid' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );	
	
	if ( $status == '0' ){
		$sql = "UPDATE `product` SET `status` = '1' WHERE `pid` = '$pid'";		
	} else {
		$sql = "UPDATE `product` SET `status` = '0' WHERE `pid` = '$pid'";		
	} 
	
	if( $conn->exec($sql) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $sql;
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $sql;
	}	
} else {
	// we have not passd the right data
}

/*********************************************
UPDATE PRODUCT TYPE STATUS
*********************************************/
if ( isset( $_GET[ 'id' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$ptid = strip_tags( trim( $_GET[ 'id' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );
	
	if ( $status == '0' ){
		$sql = "UPDATE `producttype` SET `status` = '1' WHERE `ptid` = '$ptid'";		
	} else {
		$sql = "UPDATE `producttype` SET `status` = '0' WHERE `ptid` = '$ptid'";		
	} 
	
	if( $conn->exec($sql) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $sql;
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $sql;
	}	
} else {
	// we have not passd the right data
}



/*********************************************
ADD NEW PRODUCT
*********************************************/
if ( !empty( $_POST[ 'product-submit' ] ) ){
	$cid = isset( $_POST[ 'cid' ] )? $_POST[ 'cid' ] : '';
	$productname = isset( $_POST[ 'productname' ] )? $_POST[ 'productname' ] : '';
	$productimage = isset( $_POST[ 'productimage' ] )? $_POST[ 'productimage' ] : '';
	$productblurb = isset( $_POST[ 'productblurb' ] )? $_POST[ 'productblurb' ] : '';
	$addCatQ = "INSERT INTO `product` (`productname`, `productImage`, `productBlurb`, `cid`) VALUES ('$productname', '$productimage', '$productblurb', '$cid' )";
	
	if( $conn->exec( $addCatQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $addCatQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $addCatQ;
	}
	
}

/*********************************************
ADD NEW PRODUCT TYPE
*********************************************/




/*********************************************
DELETE PRODUCT
*********************************************/
if ( isset( $_GET[ 'pid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'delete' ){
	$pid = isset( $_GET[ 'pid' ] )? $_GET[ 'pid' ] : '';
	$archiveproductQ = "UPDATE `product` SET `archive` = '1' WHERE `pid` = '$pid'";
	
	if( $conn->exec( $archiveproductQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $archiveproductQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $archiveproductQ;
	}
	
}
	
/*********************************************
DELETE PRODUCT VARIETY
*********************************************/
if ( isset( $_GET[ 'ptid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] = 'delete' ){
	$ptid = isset( $_GET[ 'ptid' ] )? $_GET[ 'ptid' ] : '';
	$archiveproducttypeQ = "UPDATE `producttype` SET `status` = '0', `archive` = '1' WHERE `ptid` = '$ptid'";
	
	if( $conn->exec( $archiveproducttypeQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $archiveproducttypeQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $archiveproducttypeQ;
	}
	
}


// UPDATE Product VARIETY
if ( !empty( $_POST[ 'ptupdate-submit' ] ) ){
	$cid = isset( $_POST[ 'categoryTypeGroup' ] )? $_POST[ 'categoryTypeGroup' ] : '';
	$pid = isset( $_POST[ 'productTypeGroup' ] )? $_POST[ 'productTypeGroup' ] : '';
	$ptid = isset( $_POST[ 'ptid' ] )? $_POST[ 'ptid' ] : '';
	$kilo = isset( $_POST[ 'kilo' ] )? $_POST[ 'kilo' ] : '';
	$box = isset( $_POST[ 'box' ] )? $_POST[ 'box' ] : '';
	$punnet = isset( $_POST[ 'punnet' ] )? $_POST[ 'punnet' ] : '';
	$bunch = isset( $_POST[ 'bunch' ] )? $_POST[ 'bunch' ] : '';
	$ptname = isset( $_POST[ 'ptname' ] )? $_POST[ 'ptname' ] : '';
	$ptprice = isset( $_POST[ 'ptprice' ] )? $_POST[ 'ptprice' ] : '';
	$ptblurb = isset( $_POST[ 'ptblurb' ] )? $_POST[ 'ptblurb' ] : '';
	$ptreceipe = isset( $_POST[ 'ptreceipe' ] )? $_POST[ 'ptreceipe' ] : '';
	$ptstatus = isset( $_POST[ 'ptstatus' ] )? $_POST[ 'ptstatus' ] : '';
	/*	
	$updateQ = "UPDATE `producttype` SET `ptname` = '$ptname', `kilo` = '$kilo', `box` = '$box', `punnet` = '$punnet', `bunch` = '$bunch', `ptprice` = '$ptprice', `ptblurb` = '$ptblurb', `ptreceipe` = '$ptreceipe', `status` = '$ptstatus', `pid` = '$pid', `cid` = '$cid' WHERE `ptid` = '$ptid'";
	*/
	$updateQ = "UPDATE `producttype` SET `ptname` = '$ptname', `kilo` = '$kilo', `box` = '$box', `punnet` = '$punnet', `bunch` = '$bunch', `ptprice` = '$ptprice', `ptblurb` = '$ptblurb', `ptreceipe` = '$ptreceipe', `status` = '$ptstatus', `pid` = '$pid', `cid` = '$cid' WHERE `ptid` = '$ptid'";
		
	if( $conn->exec( $updateQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $updateQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $updateQ;
	}
}

// ADD PRODUCT VARIETY
if ( !empty( $_POST[ 'ptadd-submit' ] ) ){
	$cid = isset( $_POST[ 'categoryTypeGroup' ] )? $_POST[ 'categoryTypeGroup' ] : '';
	$pid = isset( $_POST[ 'productTypeGroup' ] )? $_POST[ 'productTypeGroup' ] : '';
	$kilo = isset( $_POST[ 'kilo' ] )? $_POST[ 'kilo' ] : '';
	$box = isset( $_POST[ 'box' ] )? $_POST[ 'box' ] : '';
	$punnet = isset( $_POST[ 'punnet' ] )? $_POST[ 'punnet' ] : '';
	$bunch = isset( $_POST[ 'bunch' ] )? $_POST[ 'bunch' ] : '';
	$ptname = isset( $_POST[ 'ptname' ] )? $_POST[ 'ptname' ] : '';
	$ptprice = isset( $_POST[ 'ptprice' ] )? $_POST[ 'ptprice' ] : '';
	$ptblurb = isset( $_POST[ 'ptblurb' ] )? $_POST[ 'ptblurb' ] : '';
	$ptreceipe = isset( $_POST[ 'ptreceipe' ] )? $_POST[ 'ptreceipe' ] : '';
	$ptstatus = isset( $_POST[ 'ptstatus' ] )? $_POST[ 'ptstatus' ] : '';
	
	$addQ = "INSERT INTO `producttype` (`ptname`, `ptprice`, `kilo`, `ptblurb`, `ptreceipe`, `status`, `pid`, `cid`) VALUES ('$ptname', '$ptprice', '$kilo', '$ptblurb', '$ptreceipe', '$ptstatus', '$pid', '$cid')";
		
	if( $conn->exec( $addQ ) == TRUE ){
		// message to say it is updated successfully
		echo 'Good ' . $addQ;		
	} else {
		// message that it did not update correctly
		echo 'Bad ' . $addQ;
	}
}
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
	
	<button class="accordion"><i class="fas fa-award"></i>
				  Product List</button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <i class="fas fa-shopping-cart fa-3x"></i>
				  <div> <table><tr><td>Price list</td></tr>
					  <tr><td>item</td><td>kilo</td><td>each</td></tr>
					  <?php
					  for ($i=0;$i<=10;$i++){
						  echo '<tr><td>' . $i . '</td><td>$' . $i . '</td></<tr>';
					  }
					  
					  ?>
					  </table></div>
			  </div>
		  </div>
		  </p>
	  </div>
	
	<button class="accordion"><i class="fas fa-award"></i>
				  Product Order</button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <i class="fas fa-shopping-cart fa-3x"></i>
				  <div> <table><tr><td>Price list</td></tr>
					  <tr><td>item</td><td>kilo</td><td>each</td></tr>
					  <?php
					  for ($i=0;$i<=10;$i++){
						  echo '<tr><td>' . $i . '</td><td>$' . $i . '</td></<tr>';
					  }
					  
					  ?>
					  </table></div>
			  </div>
		  </div>
		  </p>
	  </div>

	<button class="accordion"><i class="fas fa-address-book"></i></button>
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
		
		  echo '<div style="overflow-x:auto;">';
		  echo '<table id="detail_table" class="detail" width="100%">';
		  echo '<tr>';
		  echo '<td style="text-align:center; background-color: lightcoral;" colspan="12">Add New Category &nbsp; <a href="addcat.php"><img src="images/add.png" width="20px" height="20px" alt="Add Category" title="Add Category" ></a></td>';
				echo '</tr>';
		  if($categoryR !== false) {
			  
			  foreach( $categoryR as $category ){
				$cid = $category['cid'];
				$categoryStatus = $category['status'];
				echo '<tr>';
				echo '<td style="text-align:center; background-color: orange;" colspan="12">' . $category['categoryName'];
				  
				if ( $categoryStatus == '0' ){
					echo '<a href="admin.php?cid='. $cid .'&status=0&action=update"> <img src="images/hold.png" width="50px" height="50px" alt="Hold" title="Hold"></a>';
				} else {
					echo '<a href="admin.php?cid='. $cid .'&status=1&action=update"> <img src="images/active.png" width="50px" height="50px" alt="Active" title="Active"></a>';
				};
				echo '&nbsp;<a href="admin.php?cid='. $cid . '"><img src="images/add.png" width="20px" height="20px" alt="Update Category" title="Update Category" ></a><br><br>Add New ' . $category['categoryName'] . ' Type<a href="addprod.php?cid='. $cid . '"><img src="images/add.png" width="20px" height="20px" alt="Add Product" title="Add Product"></a>
				</td>';
				echo '</tr>';
				
				$productQ = "SELECT * FROM `product` WHERE `cid` = '$cid'";
		  		$productR = $conn->query($productQ);
				if($productR !== false) {
					foreach($productR as $product) {
						$pid = $product['pid'];
						$productStatus = $product['status'];
						echo '<tr>';
						echo '<td style="background-color: #FCD299;" colspan="12">' . $product['productName'];
				 		if ( $productStatus == '0' ){
							echo '<a href="admin.php?pid='. $pid .'&status=0&action=update"> <img src="images/hold.png" width="50px" height="50px" alt="Hold" title="Hold"></a>';
						} else {
							echo '<a href="admin.php?pid='. $pid .'&status=1&action=update"> <img src="images/active.png" width="50px" height="50px" alt="Active" title="Active"></a>';
						};
						
						echo '<br><br>Add New ' . $product['productName'] . ' Variety<a href="addprodvar.php?pid='. $pid . '"><img src="images/add.png" width="20px" height="20px" alt="Add Product" title="Add Product"></a></td>';
						echo '</tr>';
						  echo '<thead>';
							echo '<tr style="background-color: green;">';
								echo '<th>Variety</th>';
								echo '<th>Image</th>';
								echo '<th>RRP</th>';
								echo '<th>Kilo</th>';
								echo '<th>Box</th>';
								echo '<th>Punnet</th>';
								echo '<th>Bunch</th>';
								echo '<th>Blurb</th>';
								echo '<th>Receipe</th>';
								echo '<th>Status</th>';
								echo '<th>Update</th>';
								echo '<th>Delete</th>';
							echo '</tr>';
						  echo '</thead>';
						
						$productTypeQ = "SELECT * FROM `producttype` WHERE `pid` = '$pid' && `status` = '1'";
		  				$productTypeR = $conn->query($productTypeQ);
						if($productTypeR !== false) {												
							foreach($productTypeR as $productType) {
								$ptid = $productType['ptid'];
								$status = $productType['status'];
								$price = $productType['ptPrice'];
								echo '<a id="' . $ptid . '">';
								echo '<tr>';
								echo '<td>' . $productType['ptName'] . '</td>';
								echo '<td><img src="images/' . $productType['ptImage'] . '" width="50px"height="50px" /></td>';
								echo '<td>$' . number_format($price, 2) . '</td>';			
								if ( $productType['kilo'] == '1'){
								echo '<td><a href="admin.php?id='. $ptid .'&status=0&uom=kilo#'. $ptid .'"><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><a href="admin.php?id='. $ptid .'&status=1&uom=kilo#'. $ptid .'"><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}
								
								if ( $productType['box'] == '1'){
								echo '<td><a href="admin.php?id='. $ptid .'&status=0&uom=box"><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><a href="admin.php?id='. $ptid .'&status=1&uom=box"><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}
								
								if ( $productType['punnet'] == '1'){
								echo '<td><a href="admin.php?id='. $ptid .'&status=0&uom=punnet"><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><a href="admin.php?id='. $ptid .'&status=1&uom=punnet"><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}
								
								if ( $productType['bunch'] == '1'){
								echo '<td><a href="admin.php?id='. $ptid .'&status=0&uom=bunch"><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><a href="admin.php?id='. $ptid .'&status=1&uom=bunch"><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}
								if ( $productType['ptBlurb'] != ''){
								echo '<td><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}
								if ( $productType['ptReceipe'] != ''){
								echo '<td><img src="images/tick.png" width="50px" height="50px" alt="on" title="on"></a></td>';
								} else {
								echo '<td><img src="images/cross.png" width="50px" height="50px" alt="off" title="off"></a></td>';									
								}			
								
								/* STATUS */
								if ( $status == '0' ){
									echo '<td><a href="admin.php?id='. $ptid .'&status=0&action=update"> <img src="images/hold.png" width="50px" height="50px" alt="Hold" title="Hold"></a></td>';
								} else {
									echo '<td><a href="admin.php?id='. $ptid .'&status=1&action=update"> <img src="images/active.png" width="50px" height="50px" alt="Active" title="Active"></a></td>';
								}
								
								/* UPDATE */
								echo '<td><a href="update.php?id='.$ptid .'"><img src="images/update.png" width="50px" height="50px" alt="update" title="Update"></a></td>';
								
								/* DELETE */
								echo '<td><a href="admin.php?ptid='.$ptid .'&action=delete"><img src="images/delete1.png" width="50px" height="50px" alt="Delete" title="Delete"></a></td>';
								
								echo '</tr>';
								echo '</a>';
							}
						} else {
							echo '<tr><td>No Product Types';
						}	
					} 	
				} else {
					echo '<tr><td>No Products';
				}				
			 } 
			  echo '</div>'; // END RESPONSIVE DIV
		  } else {
			echo '<tr><td>No Categories';
		}	 
		echo'</table>';
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