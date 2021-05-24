<?php
include 'sec.layer.php';

$id = isset($_GET['id'])? $_GET['id'] : '';
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Employee View</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
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
	  

</head>
<body>
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content"><?php
	  include ('slide.php');
	  ?>
	  <?php
		  // Get status message from session 
			$sessData = !empty($_SESSION['sessData'])? $_SESSION['sessData'] : ''; 
			if( !empty( $sessData['status']['msg'] ) ){ 
				$statusMsg = $sessData['status']['msg']; 
				$statusMsgType = $sessData['status']['type']; 
				unset( $_SESSION['sessData']['status'] ); 
			}
		  ?>
		  <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
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
	<li><a href="employee.php">Human Resources</a></li>
	<li>Employee View</li>
	</ul>
	<br>
	<br>
	</ul>
	

	<h2>Employee Details</h2>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="5%"> ID </th>
			<th width="20%"> Name </th>	
			<th width="10%"> Phone </th>
			<th width="10%"> TFN </th>	
			<th width="10%"> Commencement </th>
			<th width="10%"> Ceassation </th>
			<th width="10%"> Holidays </th>
			<th width="5%"> Active </th>
			<th width="10%"> Notes </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$result = $conn->prepare("SELECT * FROM employee WHERE `emp_id` = '$id'");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
				$emp_id = $row['emp_id'];
				$name = $row['employee_firstName'] . ' ' . $row['employee_lastName'] ;
				$starts = new DateTime($row['employee_commencement'] );
				$start = $starts->format('Y/m/d H:i:s');
				$ends = new DateTime();				
				$end = $ends->format('Y/m/d H:i:s');
				$interval = $ends->diff( $starts );
				$year = $interval->format('%y');
				$month = $interval->format('%m');
				$day = $interval->format('%d');
				$hour = $interval->format('%h');
				$minute = $interval->format('%m');
				$second = $interval->format('%s');
				$prorata = 52/4; // every 13 weeks you get 1 week
				// work out years holdidays accrud
				$year_hols = $year * 4;
				$month_hols = $month/3;
				$day_hols = $day/90;
				
				$total_holidays = $year_hols + $month_hols + $day_hols;
				
			?>
			<div class="profilePicture"><img src="images/employees/<?php echo $row['employee_image']; ?>" width="250px" height="250px" alt="' . $name . '"</div>
			<td><?php echo $emp_id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $row['employee_phone']; ?></td>
			<td><?php echo $row['employee_tfn']; ?></td>		
			<td><?php echo date( 'd/m/Y', strtotime( $row['employee_commencement'] ) ); ?></td>
			<td><?php echo ($row['employee_ceassation'] == 'NULL')? date( 'd/m/Y', strtotime( $row['employee_ceassation'] ) ) : 'N/A'; ?></td>
				
			<td><?php echo ($total_holidays < 1 )? number_format($total_holidays*5*60, 2, '.',',') .' Hours' : number_format($total_holidays*5, 2, '.',',') . ' Days</td>';?></td>
				
			<td><?php echo $row['status']; ?></td>
			<td><?php echo $row['employee_notes']; ?></td>			
			<td>
				<a title="Click To Edit Employee" rel="facebox" href="editEmployee.php?id=<?php echo $id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php echo $emp_id; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete
					</button>
				</a>
			</td>
			</tr>
			<?php
			}
			?>
	</tbody>
	</table>
	<br>
	<h2>Rostered Hours 
		<a title="Click To Add Hours" rel="facebox" href="addHours.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Hours  
			</button>
		</a></h2>
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="10%"> Start Date </th>
			<th width="10%"> Start Time  </th>	
			<th width="10%"> End Date </th>
			<th width="10%"> End Time  </th>	
			<th width="10%"> Total Hours </th>
			<th width="10%"> Notes </th>
			<th width="10%"> Created </th>
			<th width="10%"> Modified </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php
				$hoursQ = $conn->prepare("SELECT * FROM roster WHERE `emp_id` = '$id'");
				$hoursQ->execute();
				for( $i = 0; $roster = $hoursQ->fetch(); $i++ ){
					$roster_id = $roster['roster_id'];
					$emp_id = $roster['emp_id'];
					
					$start = new DateTime( $roster['start'] );
					$end = new DateTime( $roster['end'] );
					$interval = $end->diff( $start );
					?>

					<td><?php echo date( 'd/m/Y', strtotime( $roster['start'] ) ); ?></td>
					<td><?php echo date( 'H:i A', strtotime( $roster['start']) ); ?></td>
					<td><?php echo date( 'd/m/Y', strtotime( $roster['end'] ) ); ?></td>
					<td><?php echo date( 'H:i A', strtotime( $roster['end']) ); ?></td>
					<td><?php echo $interval->format('%h hours %i minutes'); ?></td>
					<!--<td><?php //echo $interval->format('%y years %m months %a days %h hours %i minutes %s seconds'); ?></td>-->
					<td>Notes</td>
					<td><?php echo $roster['created_on']; ?></td>
					<td><?php echo $roster['modified_on']; ?></td>			
					<td>
				<a title="Click To Edit Hours" rel="facebox" href="editHours.php?id=<?php echo $roster_id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php echo $roster_id; ?>" class="delHourbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete
					</button>
				</a>
			</td>
			</tr>
			<?php
			}
			?>
		
	</tbody>
	</table>
	<br>
	<div class="clear"></div>
	<h2>Holidays 
		<a title="Click To Add Leave" rel="facebox" href="addleave.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Leave  
			</button>
		</a></h2>
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="10%"> Start Date </th>
			<th width="10%"> Start Time  </th>	
			<th width="10%"> End Date </th>
			<th width="10%"> End Time  </th>	
			<th width="10%"> Total Hours </th>
			<th width="10%"> Notes </th>
			<th width="10%"> Created </th>
			<th width="10%"> Modified </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php
				$leaveQ = $conn->prepare("SELECT * FROM `entitlements` WHERE `emp_id` = '$id'");
				$leaveQ->execute();
				for( $i = 0; $leave = $leaveQ->fetch(); $i++ ){
					$leave_id = $leave['leave_id'];
					$emp_id = $leave['emp_id'];
					
					$start = new DateTime( $leave['start'] );
					$end = new DateTime( $leave['end'] );
					$interval = $end->diff( $start );
					?>

					<td><?php echo date( 'd/m/Y', strtotime( $leave['start'] ) ); ?></td>
					<td><?php echo date( 'H:i A', strtotime( $leave['start']) ); ?></td>
					<td><?php echo date( 'd/m/Y', strtotime( $leave['end'] ) ); ?></td>
					<td><?php echo date( 'H:i A', strtotime( $leave['end']) ); ?></td>
					<td><?php echo $interval->format('%h hours %i minutes'); ?></td>
					<!--<td><?php //echo $interval->format('%y years %m months %a days %h hours %i minutes %s seconds'); ?></td>-->
					<td>Notes</td>
					<td><?php echo $leave['created_on']; ?></td>
					<td><?php echo $leave['modified_on']; ?></td>			
					<td>
				<a title="Click To Edit Hours" rel="facebox" href="editHours.php?id=<?php echo $leave_id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php echo $leave_id; ?>" class="delHourbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete
					</button>
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
	if(confirm("Are you sure you want to delete this Employee?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteEmployee.php",
		   data: info,
		   success: function(){}
		 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
	
	 }

	return false;

	});

});
</script>

<script type="text/javascript">
$(function() {

	$(".delHourbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this Employees Rostered Hours?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteHours.php",
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