<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include('db.php');
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Customer</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>	
	
	<script type="text/javascript">
	  $(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : 'src/loading.gif',
		  closeImage   : 'src/closelabel.png'
		})
	  })
	</script>
<style>
/* Formatting search box */
    .customer-search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .customer-search-box input[type="text"]{
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
    .customerResult{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .customer-search-box input[type="text"], .customerResult{
        width: 100%;
        box-sizing: border-box;
		filter:alpha(opacity=150); /* IE */
		-moz-opacity:1.5; /* Mozilla */
		opacity: 1.5; /* CSS3 */
    }
    /* Formatting result items */
    .customerResult p{
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
    .customerResult p:hover{
        background: orange;
    }
	</style>
<script type="text/javascript">
$(document).ready(function(){
    $('.customer-search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var customerResultDropdown = $(this).siblings(".customerResult");
        if(inputVal.length){
            $.get("customer-backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                customerResultDropdown.html(data);
            });
        } else{
            customerResultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".customerResult p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".customer-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".customerResult").empty();
		
		// redirect may be required
    });
});
</script>

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
	$result = $conn->prepare("SELECT * FROM fnfCustomer");
	$result->execute();
	$rowcount = $result->rowcount();
?>
	<div id="count" style="text-align:center;">
	Total Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
	</div>
</div>

<div class="customer-search-box">
	<input type="text" autocomplete="off" placeholder="Search Customer..." id="Search" name="Search" onBlur="clear()" value=""/>
	<div class="customerResult"></div>
</div>

	<a rel="facebox" href="addcustomer.php">
		<Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
			<i class="icon-plus-sign icon-large"></i> Add Customer
		</button>
	</a>
	</ul>
	<br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
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
					$customer_id = $row['customer_ID'];
					$flat = $row['billFlat'];
					$city = $row['billCity'];
					$deliveryFlat = $row['deliveryFlat'];
					$deliveryStreetNumber = $row['deliveryStreetNumber'];
					$deliveryCity = $row['deliveryCity'];
			?>
			<tr class="record">
			<td><?php echo $customer_id ?></td>
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
			
			<td>
				<a title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $customer_id; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a href="#" id="<?php echo $customer_id; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button>
				</a>
			</td>
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