<?php
include 'sec.layer.php';
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Marketing</title> 
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
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Marketing</li>

<div style="margin-top: 10px; margin-bottom: 10px;">
<?php 
	$result = $conn->prepare("SELECT * FROM special");
	$result->execute();
	$rowcount = $result->rowcount();
?>
	<div id="count" style="text-align:center;">
	Total Campaigns: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
	</div>
</div>


	<a rel="facebox" href="addcampaign.php">
		<Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
			<i class="icon-plus-sign icon-large"></i> New Campaign 
		</button>
	</a>
	</ul>
	<br><br>

<div class="row">
	<div class="col-md-6" style="align-content: center; text-align: center; width: 90%;">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Specials">
	</div>
</div>
<br>
<div style="overflow-x:auto;  width: 100%;">
<table class="table table-bordered fix_header_table" id="myTable" data-responsive="table" style="text-align: left;  width: 90%;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<tr style="background: #0AFF00; text-align:center;">
			<th width="5%"> ID </th>
			<th width="23%"> Title </th>	
			<th width="20%"> Blurb </th>	
			<th width="5%"> Image </th>
			<th width="5%"> ptid </th>
			<th width="5%"> Active </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('db.php');
				$result = $conn->prepare("SELECT * FROM special");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
					$sid = $row['sid'];					
			?>
			<tr class="record">
			<td><?php echo $sid ?></td>
			<td><?php echo $row['specialTitle']; ?></td>
			<td><?php echo $row['specialBlurb']; ?></td>
			<td><?php echo $row['specialImage']; ?></td>
			
			<td><?php echo $row['ptid']; ?></td>
			<td><?php echo $row['active']; ?></td>
			

			<td>
				<a title="Click To Edit Campaign" rel="facebox" href="editCampaign.php?id=<?php echo $sid; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a href="#" id="<?php echo $sid; ?>" class="delbutton" title="Click To Delete">
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

<script src="../js/jquery.js"></script>

<script type="text/javascript">
$(function() {

	$(".delbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure want to delete this Special?"))
		{
		 $.ajax({
		   type: "GET",
		   url: "deleteCampaign.php",
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