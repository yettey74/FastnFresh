<html>
<head>
<title>
Customer View
</title>

<?php
	//require_once('auth.php');
?>
 	<link rel="stylesheet" href="admin/main/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="admin/main/css/DT_bootstrap.css">  
  	<link rel="stylesheet" href="admin/main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="admin/main/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="admin/main/style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
	<script src="admin/main/js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="admin/main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="admin/main/lib/jquery.js" type="text/javascript"></script>
	<script src="admin/main/src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
	  jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : 'src/loading.gif',
		  closeImage   : 'src/closelabel.png'
		})
	  })
	</script>
</head>

<body>
	
	<div class="contentheader">
			<i class="icon-group"></i> Customers
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Customers</li>
			</ul><div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="admin/shop.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('db.php');
				$result = $conn->prepare("SELECT * FROM fnfCustomer ORDER BY customer_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Customer..." autocomplete="off" />
<a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Customer</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> ID </th>
			<th width="23%"> Name </th>	
			<th width="10%"> Contact </th>
			<th width="15%"> Billing </th>
			<th width="15%"> Delivery </th>
			<th width="10%"> Phone </th>
			<th width="10%"> Email </th>			
			<th width="17%"> Note </th>
			<th width="9%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('db.php');
				$result = $conn->prepare("SELECT * FROM fnfCustomer ORDER BY customer_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$flat = $row['billFlat'];
					$city = $row['billCity'];
					$deliveryFlat = $row['deliveryFlat'];
					$deliveryStreetNumber = $row['deliveryStreetNumber'];
					$deliveryCity = $row['deliveryCity'];
			?>
			<tr class="record">
			<td><?php echo $row['customer_ID']; ?></td>
			<td><?php echo $row['firstName'] . ' ' . $row['lastName'] ; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td><?php 
					if( $flat != ''){
						echo $flat . ' / ';
					}
						echo $row['billStreetNumber'] . ' ' . $row['billStreet'] . ' ' . $row['billStreetType'] . ',<br> ' . $row['billSuburb'] . ', ';
					if( $city != ''){
						echo $city . ', ';
					}
					echo  $row['billState'] . ', ' . $row['billPostcode']; ?>
			</td>
			<td><?php 
					if( $deliveryFlat != ''){
						echo $deliveryFlat . ' / ';
					}
					if( $deliveryStreetNumber != ''){
						echo $deliveryStreetNumber;
					} 
						echo $row['deliveryStreetNumber'] . ' ' . $row['deliveryStreetName'] . ' ' . $row['deliveryStreetType'] . ',<br> ' . $row['deliverySuburb'] . ', ';
					if( $deliveryCity != ''){
						echo $deliveryCity . ', ';
					}
					echo  $row['deliveryState'] . ', ' . $row['deliveryPostcode']; ?>
			</td>
			<td><?php echo $row['phone1']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['billNotes']; ?></td>
			

			<td><a title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $row['customer_ID']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="#" id="<?php echo $row['customer_ID']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
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
 if(confirm("Are you sure want to delete?"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
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
</body>
<?php //include('footer.php');?>

</html>