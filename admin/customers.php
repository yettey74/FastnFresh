<?php
	include 'sec.layer.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <title>Customer</title>
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
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content">
	  <?php
	  include ('slide.php');
	  // Get status message from session 
		$sessData = !empty($_SESSION['sessData'])? $_SESSION['sessData'] : ''; 
		if( !empty( $sessData['status']['msg'] ) ){ 
			$statusMsg = $sessData['status']['msg']; 
			$statusMsgType = $sessData['status']['type']; 
			unset( $_SESSION['sessData']['status'] ); 
		}
		?>
		  <div class="row">
                <?php if( !empty($statusMsg ) && ( $statusMsgType == 'success' ) ){ ?>
					<div class="col-md-12">
						<div class="alert alert-success"><?php echo $statusMsg; ?></div>
					</div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
					<div class="col-md-12">
						<div class="alert alert-danger"><?php echo $statusMsg; ?></div>
					</div>
                <?php } ?>
		  </div>
	  </span>
	  <?php
	  // LOAD MESSAGE IF ANY
	  if ( $msgType ){
		  echo $msgContent;
	  }
	?>   
<div class="shop">
<ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
		</form>
	</span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Customers</li>

<div style="margin-top: -19px; margin-bottom: 21px;">
<?php 
	$result = $conn->prepare("SELECT * FROM fnfcustomer");
	$result->execute();
	$rowcount = $result->rowcount();
?>
	<div id="count" style="text-align:center;">
	Total Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
	</div>
</div>

	<a rel="facebox" href="addcustomer.php">
		<Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
			<i class="icon-plus-sign icon-large"></i> Add Customer
		</button>
	</a>
	</ul>
	<br><br>
	<div class="row">
	<div class="col-md-6" style="align-content: center; text-align: center; width: 90%;">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Customers">
	</div>
</div>

<div style="overflow-x:auto;">
<table class="table table-bordered fix_header_table" id="myTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="23%"> Name </th>	
			<th width="10%"> Email </th>
			<th width="15%"> Phone </th>
			<th width="15%"> Bill Address </th>
			<th width="15%"> Mail Address </th>
			<!--<th width="9%"> Action </th>-->
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $conn->prepare("SELECT * FROM fnfcustomer ");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$customer_id = $row['customer_id'];
					$first_name = $row['first_name'];
					$cilast_namety = $row['last_name'];
					$email = $row['email'];
					$phone = $row['phone'];
					//$address = $row['address'];
					$billAddress1 = $row['billAddress1'];
					$billAddress2 = $row['billAddress2'];
					$billFlat = $row['billFlat'];
					$billStreetNumber = $row['billStreetNumber'];
					$billStreet = $row['billStreet'];
					$billStreetType = $row['billStreetType'];
					$billSuburb = $row['billSuburb'];
					$billCity = $row['billCity'];
					$billState = $row['billState'];
					$billPostcode = $row['billPostcode'];
					$billAddress = !empty($billFlat)?? $billFlat . ' / ';
					$billAddress .= $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType;					
					$billAddress .= !empty($billSuburb)? ', ' . $billSuburb : '';
					$billAddress .= !empty($billCity)? ', ' . $billCity : '';
					$billAddress .= ', ' . $billState . ', ' . $billPostcode;
					
					$billNotes = $row['billNotes'];
					
			?>
			<tr class="record">
			<td><?php echo $row['first_name'] . ' ' . $row['last_name'] ; ?></td>
			<td><?php echo $row['email']; ?></td>			
			<td><?php echo $row['phone']; ?></td>	
			<td><?php echo $billAddress; ?></td>		
			<td><?php echo $billAddress; ?></td>
			
			<!--<td>
				<a title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php //echo $customer_id; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a href="#" id="<?php //echo $customer_id; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button>
				</a>
			</td>-->
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

	//Build a url to send
	var info = 'id=' + del_id;
	var call = "";
	if(confirm("Are you sure want to delete this Customer?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteCustomer.php",
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