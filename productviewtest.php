<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include('db.php');

// Initialize User class
require_once 'apple/User.class.php';
$user = new User();

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html><head>
  <title>Frontpage</title>
  <meta charset="utf-8">
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="/admin/main/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/admin/main/style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
	  jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : 'src/loading.gif',
		  closeImage   : 'src/closelabel.png'
		})
	  })
	</script>
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
		.carousel-inner > .item > img, .carousel-inner > .item > a > img { width: 20%;
											margin: auto;
										  }
	</style>
	<script language="javascript" type="text/javascript">
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
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
	  <span><form name="clock"><input style="width:150px;" type="submit" class="trans" name="face" value=""></form></span> 
<div class="shop">
<div class="contentheader"><i class="icon-group"></i> Products</div>
			<ul class="breadcrumb">
				<li><a href="admin/main/index.php">Dashboard</a></li>
				<li class="active">Products</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="admin/shop.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('db.php');
				$result = $conn->prepare($specialQ = "SELECT `c`.`categoryName`, `c`.`categoryImage`, `c`.`status` AS `cStatus`, `c`.`Archive` AS `cArchive`, `p`.`productName`, `p`.`productBlurb`, `p`.`status` AS `pStatus` , `p`.`archive` AS `pArchive` ,`pt`.* 
						FROM `category` AS `c` 
						LEFT JOIN `product` AS `p` 
						ON `c`.`cid` = `p`.`cid` 
						RIGHT JOIN `producttype` AS `pt` 
						ON `p`.`pid` = `pt`.`pid`
						ORDER BY `c`.`categoryName`, `p`.`productName`, `pt`.`ptName` ASC");
				//$result = $conn->prepare("SELECT * FROM fnfCustomer ORDER BY customer_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Varieties: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" size="30" placeholder="Search" autocomplete="off" />
<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Category </th>
			<th width="17%"> Product </th>
			<th width="17%"> Blurb </th>
			<th width="15%"> Variety </th>
			<th width="10%"> Kilo </th>
			<th width="10%"> Box </th>			
			<th width="17%"> Punnet </th>		
			<th width="17%"> Bunch </th>		
			<th width="17%"> Single </th>	
			<th width="17%"> Blurb </th>	
			<th width="17%"> Receipe </th>
			<th width="9%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('db.php');
				$result = $conn->prepare($specialQ = "SELECT `c`.`categoryName`, `c`.`categoryImage`, `c`.`status` AS `cStatus`, `c`.`archive` AS `cArchive`, `p`.`productName`, `p`.`productBlurb`, `p`.`status` AS `pStatus` , `p`.`archive` AS `pArchive` ,`pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`, `pt`.`kilo`, `pt`.`box`, `pt`.`punnet`, `pt`.`bunch`, `pt`.`single`, `pt`.`ptBlurb`, `pt`.`varietyRecipe`,  `pt`.`status` AS `ptStatus`, `pt`.`archive` AS `ptArchive` 
						FROM `category` AS `c` 
						LEFT JOIN `product` AS `p` 
						ON `c`.`cid` = `p`.`cid` 
						RIGHT JOIN `producttype` AS `pt` 
						ON `p`.`pid` = `pt`.`pid`");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$categoryName = $row['categoryName'];
					$categoryImage = $row['categoryImage'];
					$productName = $row['productName'];
					$productBlurb = $row['productBlurb'];
					$ptName = $row['ptName'];
					$ptImage = $row['ptImage'];
					$kilo = $row['kilo'];
					$box = $row['box'];
					$punnet = $row['punnet'];
					$bunch = $row['bunch'];
					$single = $row['single'];
					$ptBlurb = $row['ptBlurb'];
					$varietyRecipe = $row['varietyRecipe'];
					/*
					$cStatus = $row['cStatus'];
					$pStatus = $row['pStatus'];
					$vStatus = $row['vStatus'];
					$cArchive = $row['cArchive'];
					$pArchive = $row['pArchive'];
					$vArchive = $row['vArchive'];
					*/
			?>
			<tr class="record">
			<td><?php echo $row['categoryName'] . '<br><img src="images/' . $row['categoryImage'] . '" width="50px" height="50px" /></td>'?>
			<td><?php echo $row['productName']; ?></td>
			<td><?php echo $row['productBlurb']; ?></td>
			<td><?php echo $row['ptName'] . '<br><img src="images/' . $row['ptImage'] . '" width="50px" height="50px" /></td>'?>
			<td><?php echo $row['kilo']; ?></td>
			<td><?php echo $row['box']; ?></td>
			<td><?php echo $row['punnet']; ?></td>
			<td><?php echo $row['bunch']; ?></td>
			<td><?php echo $row['single']; ?></td>
			<td><?php echo ( !empty($ptBlurb) )? '<img src="images/tick.png" height="50px" width="50px" alt="Image" title="Image" />' : '<img src="images/cross.png" height="50px" width="50px" alt="Image" title="Image" />'; ?></td>
				<td><?php echo ( !empty($varietyRecipe) )? '<img src="images/tick.png" height="50px" width="50px" alt="Image" title="Image" />' : '<img src="images/cross.png" height="50px" width="50px" alt="Image" title="Image" />'; ?></td>
			<!--<td><?php //echo $row['cStatus']; ?></td>
			<td><?php //echo $row['pStatus']; ?></td>
			<td><?php //echo $row['vStatus']; ?></td>
			<td><?php //echo $row['cArchive']; ?></td>
			<td><?php //echo $row['pArchive']; ?></td>
			<td><?php //echo $row['vArchive']; ?></td>-->
			

			<td><a title="Click To Edit Variety" rel="facebox" href="editvariety.php?id=<?php echo $row['ptid']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
<!--			<a href="#" id="<?php //echo $row['ptid']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a>--></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

</div>
</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete this product?"))
		  {

 $.ajax({
   type: "GET",
   url: "deletevariety.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</div> <!-- END OF SHOP CLASS -->
	
    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
		<?php if (isset($_SESSION["loggedin"] ) && $_SESSION["loggedin"] == TRUE ) { ?>
		<hr>
		Welcome <?php echo $_SESSION['uid']; ?>
		<hr>		
      	<a href="index.php">Shop</a>
		<?php			
			if( !isset( $_SESSION["loggedin"]) ){
				echo 'Login / Register';
				echo '<form method="post" action="login.php" name="signin-form">';
				echo '<div class="form-element">
						<label>Email</label>
						<input type="email" name="email" required />
					  </div>
					  <div class="form-element">
						<label>Password</label>
						<input type="password" name="password" required />
					  </div>
						<button type="submit" name="login" value="Login">Log In</button>
						
					</form>';
				echo '<div><a href="rego.html" style="text-decoration:none;">Register</a></div>';				
			} else {
				// give option to logout
				echo '<a href="logout.php" />logout</a>';
				/*foreach( $_SESSION as $key=>$value ){
					echo $key . ' ' . $value;
				}*/
				//echo '<a href="viewcart.php">Cart</a>';
				//echo '<a href="profile.php">Profile</a>';
			}
																				   }
		?>		
  	</div>
</body>
</html>