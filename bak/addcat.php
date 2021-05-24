<?php
session_start();
include('db.php');
/*if ( isset( $_GET[ 'id' ] ) ){
	$ptid = strip_tags( trim( $_GET[ 'id' ] ) );	
} else {
	echo '<script>window.location="index.php"</script>';
}*/
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Category</title>
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
	echo '<form action="admin.php" method="post" name="category-add" id="category-add">';
	echo '<table>';
	echo '<tr><td>Category Group</td></tr>';
	echo '<tr><td>';
	echo '<input type="text" value="" id="categoryname" name="categoryname" placeholder="Category Name" required>';	
	echo '</td></tr>';
	echo'<tr><td><input type="submit" value="Submit" id="category-submit" name="category-submit">';
	echo '<input type="button" value="No, go back!" onclick="history.go(-1)"></td></tr>';
	echo '</table>';				
	echo '</form>';	
?>
	</div> <!-- END OF SHOP CLASS -->
    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
      	<a href="index.php">Order</a>
		<a href="add.php">Add</a>
		<a href="update.php">Edit</a>
		<?php
			if( !isset( $_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == FALSE ){
				echo '<a href="login.html">Login</a>';
				echo '<a href="rego.html">Register</a>';
			}
		
			if( isset( $_SESSION["loggedIn"]) && $_SESSION["admin"] == TRUE ){
				echo '<a href="add.html">Add</a>';
				echo '<a href="update.html">Edit</a>';
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