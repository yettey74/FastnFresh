   <?php
// Start session 
if(!session_id()){ 
    session_start();	
}

?>
<div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
		<?php 
			if( isset( $_SESSION['loggedin'] ) )
			{
				echo '<a href="../logout.php">Logout</a>';
			}
		?>
      	<a href="../index.php">Shopfront</a>
      	<a href="srm.php">Procurement</a>
      	<a href="production.php">Production</a>
      	<a href="scm.php">Distribution</a>
      	<a href="acc.php">Accounts</a>
      	<a href="assets.php">Assets</a>
      	<a href="shop.php">Shop</a>
      	<a href="sales.php">Sales</a>
      	<a href="marketing.php">Marketing</a>
      	<a href="customers.php">Customers</a>
      	<a href="corporate.php">Corporate</a>
      	<a href="employee.php">Employees</a>
      	<a href="ohs.php">O.H.S</a>
      	<a href="training.php">T.A.</a>
  	</div>	  
</body>
</body>
</html>