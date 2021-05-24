<?php
include 'sec.layer.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset='utf-8'>
  <title>Build A Box</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
	<script type="text/javascript" src="js/jquery.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>		
		<script language="javascript" type="text/javascript" src="js/fixHeader.js">	</script>
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('.production-search-box input[type="text"]').on("keyup input", function(){
			/* Get input value on change */
			var inputVal = $(this).val();
			var resultDropdown = $(this).siblings(".result");
			if(inputVal.length){
				$.get("production-backend-search.php", {term: inputVal}).done(function(data){
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
        $(this).parents(".production-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".result").empty();
		
		// redirect may be required
		});

	});
	</script>	
	<style>
		.image-upload > input {
		  visibility:hidden;
		  width:0;
		  height:0
		}
		.image-upload img
		{
			/*width: 50px;
			height: 50px;*/
			cursor: pointer;
		}
	</style>
	<style>
	/* Formatting search box */
    .production-search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .production-search-box input[type="text"]{
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
    .production-search-box input[type="text"], .result{
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
</head>
<body>
  <div id="content">
   <?php
	  include ('slide.php');
	  ?>
	   
<div class="shop">
<ul class="breadcrumb"><span><form name="clock"><input style="width:150px;" type="submit" class="trans" name="face" value="" disabled></form></span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Builders</li>

<div style="margin-top: 10px; margin-bottom: 21px;">
<?php 
	include('db.php');
	$fruittray = $conn->prepare("SELECT `pt`.*, `p`.`pid`, `p`.`productName` FROM `product` AS `p` LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` WHERE `p`.`productName` LIKE '%Fruit%' ");
	$fruittray->execute();
	$fruittrays = $fruittray->rowcount();
	
	
	$vegtray = $conn->prepare("SELECT `pt`.*, `p`.`pid`, `p`.`productName` FROM `product` AS `p` LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` WHERE `p`.`productName` LIKE '%Fruit%' ");
	$vegtray->execute();
	$vegtrays = $vegtray->rowcount();
	
	
	$fvtray = $conn->prepare("SELECT `pt`.*, `p`.`pid`, `p`.`productName` FROM `product` AS `p` LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` WHERE `p`.`productName` LIKE '%Fruit%' ");
	$fvtray->execute();
	$fvtrays = $fvtray->rowcount();
	?>
	<div id="count" style="text-align:center;">
	Total Number of Fruit Trays: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $fruittrays;?></font><br>
	Total Number of Vegetable Trays: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $vegtrays;?></font><br>
	Total Number of Fruit &amp; Vegetable Trays: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $fvtrays;?></font>
	</div>
</div>

<div class="production-search-box">
	<input type="text" style="float:left; width:230px; height:35px;" autocomplete="off" placeholder="Search Products..." id="Search" name="search" onBlur="clear()" value=""/>
	<div class="result"></div>
</div>

	
<a rel="facebox" href="addBox.php">
	<Button type="submit" class="btn btn-success" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> New Box</button>
</a>
	<br>
	<br>
</ul>
<br><br>
<table class="table table-bordered fix_header_table" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="6%" > Tray Title </th>
			<th width="6%"> Blurb </th>	
			<th width="6%" style="background:#FFFE44 ;"> Total Cost </th>
			<th width="6%"> Active </th>
			<th width="6%" style="background: black; color: white;"> Archive </th>
			<th width="6%" style="background:#FFFFFF ;"> Action </th>
		</tr>
	</thead>
	<tfoot>
		<tr style="background: #0AFF00; text-align:center; font-weight: bold; cursor: default;">
			<th width="6%" > Tray Title </th>
			<th width="6%"> Blurb </th>	
			<th width="6%" style="background:#FFFE44 ;"> Total Cost </th>
			<th width="6%"> Active </th>
			<th width="6%" style="background: black; color: white;"> Archive </th>
			<th width="6%" style="background:#FFFFFF ;"> Action </th>
		</tr>
	</tfoot>
	<tbody>
		
			<?php
				$result = $conn->prepare($specialQ = "SELECT `pt`.*, `p`.`pid`, `p`.`productName`, `p`.`productBlurb`, `p`.`status` AS pstatus, `p`.`archive` AS parchive FROM `product` AS `p` LEFT JOIN `producttype` AS `pt` ON `p`.`pid` = `pt`.`pid` WHERE `p`.`productName` LIKE '%Tray%' && `p`.`status` = '1' && `pt`.`status` = '1' && `p`.`archive` = '0' && `pt`.`archive` = '0'");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$ptid = $row['ptid'];
					$productName = $row['productName'];
					$productBlurb = $row['productBlurb'];
					$ptName = $row['ptName'];
					$ptImage = $row['ptImage'];
					$pstatus = $row['pstatus'];
					$status = $row['status'];
					$parchive = $row['parchive'];
					$archive = $row['archive'];
			?>
			<tr class="record">			
				
			<td style="background-color: #EAFFEA;">
				<form action="updateProductImage.php" method="post">
					<?php echo $ptName . '<br>' . (($ptImage !== '' )? '<div class="image-upload"><label for="file-input"><img src="../images/' . $ptImage . '" width="50px" height="50px" alt="Click to Update Image"  title="Click to Update Image" /></label><input id="file-input" type="file" /> </div>' : '<img src="../images/blank.png" width="50px" height="50px" alt="Variety"  title="No Tray Image" />'); ?>
				</form>
			</td>
				
			<td style="background-color: #EAFFEA;"><?php echo ( !empty($productBlurb) )? '<img src="../images/tick.png" height="50px" width="50px" alt="Image" title="Product Blurb Present" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Image" title="No Product Blurb" />'; ?>
			</td>
				
			<td style="background-color: #EAFFEA;">				
				$<?php echo number_format( $totalcost = 0, 2, '.',','); ?>
			</td>
			
			<td style="background-color: #EAFFEA;"><?php echo ( $pstatus == 1 )? '<a href="updateproduction.php?id='. $ptid . '&s=' . $status . '" title="Click to Deactivate Variety" ><img src="../images/tick.png" height="50px" width="50px" alt="Click To De-Activate ' . $ptName . ' ' . $productName . '" title="Click To De-Activate ' . $ptName . ' ' . $productName . '" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Click To Activate ' . $ptName . ' ' . $productName . '" title="Click To Activate ' . $ptName . ' ' . $productName . '" />'; ?>
			</td>
				
			<td style="background-color: #EAFFEA;"><?php echo ( $parchive == 1 )? '<a href="updateproduction.php?id='. $ptid . '&s=' . $status . '" title="Click to Deactivate Variety" ><img src="../images/tick.png" height="50px" width="50px" alt="Click To De-Activate ' . $ptName . ' ' . $productName . '" title="Click To De-Activate ' . $ptName . ' ' . $productName . '" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Click To Activate ' . $ptName . ' ' . $productName . '" title="Click To Activate ' . $ptName . ' ' . $productName . '" />'; ?>
			</td>
			</td>

			<td>
				<a title="Click To Edit Box" rel="facebox" href="editBox.php?id=<?php echo $ptid; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a href="#" id="<?php echo $ptid; ?>" productName="<?php echo $productName; ?>" ptName="<?php echo $ptName; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button>
				</a>
			</td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
	</div>
	  </div>
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
	var productName = element.attr("productName");
	var ptName = element.attr("ptName");
		
	//Built a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure want to delete " + ptName + " " + productName + " from the Catalouge?" ))
		{
		 $.ajax({
		   type: "GET",
		   url: "deleteBox.php",
		   data: info,
		   success: function(){}
		 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
	 }

	return false;

	});

});
</script>
</div> <!-- END OF SHOP CLASS -->
<?php include( 'menu.php'); ?>