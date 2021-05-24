<?php
include 'sec.layer.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='utf-8'>
  <title>Production</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>		
	<script language="javascript" type="text/javascript" src="js/fixHeader.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<script type="text/javascript">
	  $(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : 'src/loading.gif',
		  closeImage   : 'src/closelabel.png'
		})
	  })
	</script>
	<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      /*if (txtValue.toUpperCase().indexOf(filter) > -1) {*/
	  if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
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
		#myInput {
		  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
		  background-position: 10px 12px; /* Position the search icon */
		  background-repeat: no-repeat; /* Do not repeat the icon image */
		  width: 100%; /* Full-width */
		  font-size: 16px; /* Increase font-size */
		  padding: 12px 20px 12px 40px; /* Add some padding */
		  border: 1px solid #ddd; /* Add a grey border */
		  margin-bottom: 12px; /* Add some space below the input */
		}

		#myTable {
		  border-collapse: collapse; /* Collapse borders */
		  width: 100%; /* Full-width */
		  border: 1px solid #ddd; /* Add a grey border */
		  font-size: 18px; /* Increase font-size */
		}

		#myTable th, #myTable td {
		  text-align: left; /* Left-align text */
		  padding: 12px; /* Add padding */
		}

		#myTable tr {
		  /* Add a bottom border to all table rows */
		  border-bottom: 1px solid #ddd;
		}

		#myTable tr.header, #myTable tr:hover {
		  /* Add a grey background color to the table header and on hover */
		  background-color: #f1f1f1;
		}
	</style>		
</head>
	
<body>
  <div id="content">
   <?php
	  include ('slide.php');
	  ?>
	   
<div class="shop">
<ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
		</form>
		</span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Production</li>	
	
	<div style="margin-top: 10px; margin-bottom: 10px;">
	<?php 
		$categories = $conn->prepare("SELECT * FROM category");
		$categories->execute();
		$categoriescount = $categories->rowcount();

		$product = $conn->prepare("SELECT * FROM product");
		$product->execute();
		$productcount = $product->rowcount();

		$variety = $conn->prepare("SELECT * FROM producttype");
		$variety->execute();
		$varietycount = $variety->rowcount();

		/*$costOfStocks = $conn->prepare("SELECT pt.variety_stock, pt.uom_id, u.uomLong FROM producttype as pt LEFT JOIN uom as u on pt.uom_id = u.uom_id");
		$costOfStocks->execute();
		$stockCount = $costOfStocks->fetch();

		$total_value = 0;
		$price = 0;
		foreach( $stocks as $stock ){
			$uom = $stock['uomLong'];
			$onhand = $stock['variety_stock'];

			if ( $uom == 'Kilo' ){
				$price = $stock['kilo'];
			}
			if ( $uom == 'Box' ){
				$price = $stock['box'];
			}
			if ( $uom == 'Punnet' ){
				$price = $stock['punnet'];
			}
			if ( $uom == 'Bunch' ){
				$price = $stock['bunch'];
			}
			if ( $uom == 'Single' ){
				$price = $stock['single'];
			}
			if ( $uom == 'Bag' ){
				$price = $stock['bag'];
			}
			if ( $uom == 'Tray' ){
				$price = $stock['tray'];
			}
			$total_value = $total_value + ( $onhand * $price );
		}*/
		?>
		<div id="count" style="text-align:center;">
			<div style="width:250px;" style="text-align:center;"> 
				Total Number of Categories: 
				<font color="green" style="font:bold 22px 'Aleo';"><?php echo $categoriescount;?></font>
			</div>
				
			<div style="width:250px;">
				Total Number of Products: 
				<font color="green" style="font:bold 22px 'Aleo';"><?php echo $productcount;?></font>
			</div>
			<div style="width:250px;">
				Total Number of Varieties: 
				<font color="green" style="font:bold 22px 'Aleo';"><?php echo $varietycount;?></font>
			</div>
			<!--Total Stock Value: <font color="green" style="font:bold 22px 'Aleo';">$<?php // echo number_format($total_value,2,'.',',');?></font><br>-->
		</div>
</ul>
		
		<div id="count" style="text-align:center; float:left;">	
			<div style="width:250px; float:left;">
				<a rel="facebox" href="addcategory.php">
					<Button type="submit" class="btn btn-success" style="float:center; width:200px; height:35px;" />
						<i class="icon-plus-sign icon-large"></i> New Category
					</button>
				</a>
			</div>
			<br>
			<br>
			<div style="width:250px;">
				<a href="editCategory.php">
					<Button type="submit" class="btn btn-success" style="float:center; width:200px; height:35px;" />
						<i class="icon-plus-sign icon-large"></i> Edit Category
					</button>
				</a>
			</div>	
			<br>
		</div>
	
	  	<div id="count" style="text-align:center; float:left;">
			<div style="width:250px; float:left;">
				<a rel="facebox" href="addproduct.php">
					<Button type="submit" class="btn btn-warning" style="float:center; width:200px; height:35px;" />
						<i class="icon-plus-sign icon-large"></i> New Product
					</button>
				</a>
			</div>
			<br>
			<br>
			<div style="width:250px;">
				<a href="editProduct.php">
					<Button type="submit" class="btn btn-warning" style="float:center; width:200px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Edit Product</button>
				</a>	  
			</div>	
			<br>
		</div>
	
		<div id="count" style="text-align:center; float:left;">			
			<div style="width:250px; float:left;">
				<a rel="facebox" href="addvariety.php">
					<Button type="submit" class="btn btn-danger" style="float:center; width:200px; height:35px;" />
						<i class="icon-plus-sign icon-large"></i> New Variety
					</button>
				</a>
			</div>
			<br>
			<br>
		</div>
<!--	
		<div id="count" style="text-align:center; float:left;">	
			<div style="width:250px; float:left;">
				<a rel="facebox" href="addsize.php">
					<Button type="submit" class="btn btn-danger" style="float:center; width:200px; height:35px;" />
						<i class="icon-plus-sign icon-large"></i> New Size
					</button>
				</a>
			</div>
			<br>
			<br>
			<div id="count" style="text-align:center; float:left;">
				<div style="width:250px;">
					<a rel="facebox" href="editsize.php">
						<Button type="submit" class="btn btn-danger" style="float:center; width:200px; height:35px;" />
							<i class="icon-plus-sign icon-large"></i> Edit Size
						</button>
					</a>
				</div>
			</div>
		</div>-->
	</div>
	</div>
<div class="row">
	<div class="col-md-6" style="align-content: center; text-align: center; width: 90%;">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Varieties">
	</div>
</div>
<br>
<div style="overflow-x:auto;">
<table class="table table-bordered fix_header_table" id="myTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="15%"> Variety </th>
			<th width="5%"> Image </th>	
			<th width="5%"> Blurb </th>	
			<th width="5%"> Receipe </th>
			<th width="5%"> Active </th>
			<!--<th width="6%" style="background:#FFFE44 ;"> Unit Size </th>
			<th width="6%" style="background:#FFFE44 ;"> Unit Count </th>
			<th width="6%" style="background:#FFFE44 ;"> Unit Type </th>
			<th width="6%" style="background:#FFB600 ;"> Kilo </th>
			<th width="6%" style="background:#FFB600 ;"> Box </th>		
			<th width="6%" style="background:#FFB600 ;"> Punnet </th>		
			<th width="6%" style="background:#FFB600 ;"> Bunch </th>		
			<th width="6%" style="background:#FFB600 ;"> Single </th>
			<th width="6%" style="background:#FFB600 ;"> Tray </th>	
			<th width="6%" style="background:#FFB600 ;"> Bag </th>
			<th width="6%" style="background: black; color: white;"> Archive </th>-->
			<th width="15%" style="background:#FFFFFF ;"> Action </th>
		</tr>
	</thead>
	<tfoot>
		<tr style="background: #0AFF00; text-align:center; font-weight: bold; cursor: default;">
			<th width="6%"> Variety </th>
			<th width="6%"> Image </th>
			<th width="6%"> Blurb </th>	
			<th width="6%"> Receipe </th>
			<th width="6%"> Active </th>
			<!--<th width="6%" style="background:#FFFE44 ;"> Unit Size </th>
			<th width="6%" style="background:#FFFE44 ;"> Count </th>
			<th width="6%" style="background:#FFFE44 ;"> Unit Type </th>
			<th width="6%" style="background:#FFB600 ;"> Kilo </th>
			<th width="6%" style="background:#FFB600 ;"> Box </th>		
			<th width="6%" style="background:#FFB600 ;"> Punnet </th>		
			<th width="6%" style="background:#FFB600 ;"> Bunch </th>		
			<th width="6%" style="background:#FFB600 ;"> Single </th>
			<th width="6%" style="background:#FFB600 ;"> Tray </th>	
			<th width="6%" style="background:#FFB600 ;"> Bag </th>	
			<th width="6%" style="background: black; color: white;"> Archive </th>-->
			<th width="6%" style="background:#FFFFFF ;"> Action </th>
		</tr>
	</tfoot>
	<tbody>
		
			<?php
				$query = $conn->query("SELECT `c`.`categoryName`, `c`.`categoryImage`, `c`.`status` AS `cStatus`, `c`.`archive` AS `cArchive`, `p`.`productName`, `p`.`productBlurb`, `p`.`status` AS `pStatus` , `p`.`archive` AS `pArchive` ,`pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`,`pt`.`size_id`, `pt`.`count`, `pt`.`buy`, `pt`.`variety_stock`, `pt`.`uom_id`, `pt`.`ptBlurb`, `pt`.`varietyRecipe`, `pt`.`cid` AS `cid`,  `pt`.`status` AS `ptStatus`, `pt`.`archive` AS `ptArchive`, `u`.`uomLong`
						FROM `category` AS `c` 
						LEFT JOIN `product` AS `p` 
						ON `c`.`cid` = `p`.`cid` 
						RIGHT JOIN `producttype` AS `pt` 
						ON `p`.`pid` = `pt`.`pid`
						JOIN `uom` as `u`
						ON `u`.`uom_id` = `pt`.`uom_id`
						&& `pt`.`status` = '1'
						&& `pt`.`archive` = '0'
						ORDER BY `pt`.`cid`, `p`.`productName`, `pt`.`ptName` ASC");
				$query->execute();
		
				for($i=0; $row = $query->fetch(); $i++){
					$productName = $row['productName'];
					$ptid = $row['ptid'];
					$uom_id = $row['uom_id'];
					$uomLong = $row['uomLong'];
					$ptName = $row['ptName'];
					$ptBlurb = $row['ptBlurb'];
					$varietyRecipe = $row['varietyRecipe'];
					$ptStatus = $row['ptStatus'];
					$ptArchive = $row['ptArchive'];	
					$cid = $row['cid'];
					$categoryName = getCategoryName( $conn, $cid );
					$categoryImage = getCategoryImage( $conn, $cid );
					
			?>
			<tr class="record">			
				
			<td style="background-color: #EAFFEA;"><?php echo $row['ptName']; ?></td>
				
			<td style="background-color: #EAFFEA;">
				<image src="../images/<?php echo $row['ptImage']; ?>" width="50px" height="50px" alt="" title="" />
			</td>	
				
			<td style="background-color: #EAFFEA;"><?php echo ( !empty($ptBlurb) )? '<a href="editvariety.php?id=' . $ptid . '" title="Click To Edit ' . $ptName . ' Blurb" rel="facebox" ><img src="../images/tick.png" height="50px" width="50px" alt="Tick" title="Variety Blurb Present" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Cross" title="No Variety Blurb" />'; ?>
			</td>
				
			<td style="background-color: #EAFFEA;"><?php echo ( !empty($varietyRecipe) )? '<a href="recipes.php?id=' . $ptid . '" title="Click To Edit ' . $ptName . '  Recipe" ><img src="../images/tick.png" height="50px" width="50px" title="Click To Edit ' . $ptName . ' Recipe" title="Click To Edit ' . $ptName . ' Recipe" /></a>' : '<img src="../images/cross.png" height="50px" width="50px" alt="Cross" title="No Recipe Present" />'; ?>
			</td>
			<td style="background-color: #EAFFEA;"><?php echo ( $ptStatus == 1 )? '<a href="updateproduction.php?id='. $ptid . '&s=' . $ptStatus . '" title="Click to Deactivate Variety" ><img src="../images/tick.png" height="50px" width="50px" alt="Click To De-Activate ' . $ptName . '" title="Click To De-Activate ' . $ptName . '" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Click To Activate ' . $ptName . '" title="Click To Activate ' . $ptName . '" />'; ?>
			</td>
			<!--<td style="background-color: #FDFFD7;"><?php echo $row['size_id']; ?></td>
			<td style="background-color: #FDFFD7;"><?php echo $row['count']; ?></td>
			<td style="background-color: #FDFFD7;"><?php echo $row['uomLong']; ?></td>		-->	
			<?php
			/*	$uom = []; 
				$rrp = [];
				$uoms = getUom_ids( $conn );
				foreach ( $uoms as $uom_id ){				
					$rrp = getRRP( $conn, $ptid, $uom_id );
					if( $rrp > 0 ){
						echo '<td style="background-color: #FFF5D2;">$' . number_format( $rrp, 2, '.',',') . '</td>';	
					} else {
						echo '<td style="background-color: #FFF5D2;"><img src="../images/cross.png" height="50px" width="50px" alt="Cross" title="No Variety Blurb" /></td>';
					}			
				}*/
			?>
				
			
			<!--<td style="background-color: black; color: white;"><?php// echo ( $ptArchive == 1 )? '<img src="../images/tick.png" height="50px" width="50px" alt="Tick" title="Variety Archived" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Cross" title="Variety Not Archived" />'; ?>
			</td>	-->

			<td>
				<a title="Click To Edit Variety" rel="facebox" href="editVariety.php?id=<?php echo $ptid; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a href="#" id="<?php echo $ptid; ?>" productName="<?php echo $productName; ?>" ptName="<?php echo $ptName; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Archive</button>
				</a>
			</td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
	  </div> <!-- END OVER FLOW -->
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
		
	if(confirm("Are you sure want to Retire " + ptName + " from the Catalouge?" ))
		{
		 $.ajax({
		   type: "GET",
		   url: "deleteVariety.php",
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