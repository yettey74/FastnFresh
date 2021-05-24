<?php
include 'sec.layer.php';

$ytd = $conn->prepare("SELECT ROUND(SUM(balance),2) AS `total` FROM `suppliers` WHERE `balance` IS NOT NULL");
$ytd->execute();
$totalSales = $ytd->fetch();

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
	  <title>Suppliers</title>  
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
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
  <div id="content">
    <?php
	  include ('slide.php');
	  ?>
	   
<div class="shop">
<ul class="breadcrumb"><span><form name="clock"><input style="width:150px;" type="submit" class="trans" name="face" value="" disabled></form></span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Suppliers</li>

<div style="margin-top: 10px; margin-bottom: 10px;">
<?php 
	$result = $conn->prepare("SELECT * FROM suppliers");
	$result->execute();
	$rowcount = $result->rowcount();
?>
<div id="count" style="align-content: center; text-align:center;">
Total Number of Suppliers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
</div>
</div>
<div class="row" style="align-content: center; text-align: center;">
	
<a rel="facebox" href="creditSupplier.php">
	<Button type="submit" class="btn btn-success" style="float:none; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Pay Supplier
	</button>
</a>
<a rel="facebox" href="debitSupplier.php">
	<Button type="submit" class="btn btn-danger" style="float:none; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Debit Supplier
	</button>
</a>
<a rel="facebox" href="addsupplier.php">
	<Button type="submit" class="btn btn-info" style="float:none; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Supplier
	</button>
</a>
	</div>
	<br>
	<br>
<div class="row" style="align-content: center; text-align: center;">
	<div class="col-md-6" style="align-content: center; text-align: center; width: 90%;">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Suppliers">
	</div>
</div>
<br>
<br>
	</ul>
<div style="overflow-x:auto;  width: 100%;">
<table class="table table-bordered fix_header_table" id="myTable" data-responsive="table" style="text-align: left;  width: 90%;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="5%"> Name </th>	
			<th width="5%"> Balance </th>
			<th width="5%"> Balance Total </th>	
			<th width="5%"> Company </th>
			<th width="5%"> First NAme </th>	
			<th width="5%"> Last Name </th>
			<th width="5%"> Address 1 </th>	
			<th width="5%"> Address 2  </th>
			<th width="5%"> Address 3  </th>	
			<th width="5%"> Address 4  </th>
			<th width="5%"> Address 5  </th>	
			<th width="5%"> Contact </th>
			<th width="5%"> Phone </th>	
			<th width="5%"> Fax </th>
			<th width="5%"> Phone 2 </th>	
			<th width="5%"> Alt Contact </th>
			<th width="5%"> Email </th>	
			<th width="5%"> Cheque Name </th>
			<th width="5%"> Account Number </th>	
			<th width="5%"> Supplier Type </th>
			<th width="5%"> Terms </th>	
			<th width="5%"> Credit Limit </th>
			<th width="5%"> Tax Id </th>	
			<th width="5%"> Note </th>		
			<th width="5%"> Status </th>	
			<th width="5%"> Action </th>
		</tr>
	</thead>
	
	<tbody>
	<?php
		$result = $conn->prepare("SELECT * FROM suppliers");
		$result->execute();
		for( $i=0; $row = $result->fetch(); $i++ ){
			$supplier_id = $row['supplier_id'];
			$supplier_name = $row['supplier_name'];
			$balance = $row['balance'];
			$balance_total = $row['balance_total'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$address_1 = $row['address_1'];
			$address_2 = $row['address_2'];
			$address_3 = $row['address_3'];
			$address_4 = $row['address_4'];
			$address_5 = $row['address_5'];
			$contact = $row['contact'];
			$phone = $row['phone'];
			$fax = $row['fax'];
			$alt_phone = $row['alt_phone'];
			$alt_contact = $row['alt_contact'];
			$email = $row['email'];
			$chequeName = $row['chequeName'];
			$account_number = $row['account_number'];
			$supplier_type = $row['supplier_type'];
			$terms = $row['terms'];
			$credit_limit = $row['credit_limit'];
			$tax_id = $row['tax_id'];
			$note = $row['note'];
			$status = $row['status'];
	?>
		
			<tr class="record">	
				<td><?php echo $supplier_name; ?></td>
				<td><?php echo $balance; ?></td>
				<td><?php echo $balance_total; ?></td>
				<td><?php echo $first_name; ?></td>
				<td><?php echo $last_name; ?></td>
				<td><?php echo $address_1; ?></td>
				<td><?php echo $address_2; ?></td>
				<td><?php echo $address_3; ?></td>
				<td><?php echo $address_4; ?></td>
				<td><?php echo $address_5; ?></td>
				<td><?php echo $contact; ?></td>
				<td><?php echo $phone; ?></td>
				<td><?php echo $fax; ?></td>
				<td><?php echo $alt_phone; ?></td>
				<td><?php echo $alt_contact; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $chequeName; ?></td>
				<td><?php echo $account_number; ?></td>
				<td><?php echo $supplier_type; ?></td>
				<td><?php echo $terms; ?></td>
				<td><?php echo $credit_limit; ?></td>
				<td><?php echo $tax_id; ?></td>
				<td><?php echo $note; ?></td>
				<td><?php echo $status; ?></td>
			
			<td><a title="Click To Edit Order" rel="facebox" href="editOrder.php?id=<?php echo $oid; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="#" id="<?php echo $oid; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
		
			<?php
			}
			?>
	</tbody>
	
	<tfoot>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="5%"> Name </th>	
			<th width="5%"> Balance </th>
			<th width="5%"> Balance Total </th>	
			<th width="5%"> Company </th>
			<th width="5%"> First NAme </th>	
			<th width="5%"> Last Name </th>
			<th width="5%"> Address 1 </th>	
			<th width="5%"> Address 2  </th>
			<th width="5%"> Address 3  </th>	
			<th width="5%"> Address 4  </th>
			<th width="5%"> Address 5  </th>	
			<th width="5%"> Contact </th>
			<th width="5%"> Phone </th>	
			<th width="5%"> Fax </th>
			<th width="5%"> Phone 2 </th>	
			<th width="5%"> Alt Contact </th>
			<th width="5%"> Email </th>	
			<th width="5%"> Cheque Name </th>
			<th width="5%"> Account Number </th>	
			<th width="5%"> Supplier Type </th>
			<th width="5%"> Terms </th>	
			<th width="5%"> Credit Limit </th>
			<th width="5%"> Tax Id </th>	
			<th width="5%"> Note </th>		
			<th width="5%"> Status </th>	
			<th width="5%"> Action </th>
		</tr>
	</tfoot>
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

	//Build a url to send
	var info = 'id=' + del_id;
	var call = "";
	if(confirm("Are you sure want to delete?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteOrder.php",
		   data: info,
		   success: function(){}
		 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
		 var v = document.getElementById('count').value;
		 document.getElementById('count').value = v;
	
	 }

	return false;

	});

});
</script>
</div> <!-- END OF SHOP CLASS -->
<?php include( 'menu.php'); ?>