<?php
include 'sec.layer.php';

$categories = $conn->query("SELECT * FROM `category`");
$categories->execute();

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Edit Category</title>
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
	<li><a href="production.php">Production</a></li>
	<li>Edit Category</li>
	</ul>
	<br>
	<br>
</ul>	
	<center><h2><i class="icon-edit icon-large"></i> Edit Categories</h2></center>	
<br><br>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align: center; font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Name </th>
			<th width="6%"> Image </th>
			<th width="6%"> Status </th>
			<th width="6%"> Archive </th>
			<th width="6%"> Action </th>
		</tr>
	</thead>
	<tfoot>
		<tr style="background: #0AFF00; text-align:center;font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Name </th>
			<th width="6%"> Image </th>
			<th width="6%"> Status </th>
			<th width="6%"> Archive </th>
			<th width="6%"> Action </th>
		</tr>
	</tfoot>
	<tbody>
			<hr>
			<div id="ac">
				<?php
				foreach ( $categories as $category ){	
					$cid = $category['cid'];
					$categoryName = $category['categoryName'];
					$categoryImage = $category['categoryImage'];
					$status = $category['status'];
					$archive = $category['archive'];
				?>
				<form action="updateCategory.php" method="post">
				<tr class="record">
					<td><?php echo $cid; ?></td>
					<td>
						<input type="text" name="categoryName" value="<?php echo !empty( $categoryName )? $categoryName : '';?>" />
					</td>
					<td>
						<img src="../images/<?php $categoryImage; ?>.png" width="50px" height="50px" alt="<?php echo $categoryName; ?>" title="<?php echo $categoryName; ?>" />
						<span style="font-size:16; font-style: italic; color:red;">In use <?php echo $categoryImage; ?></span>
						
						<input type="file" name="categoryImage"  />
					</td>
					<td>
					<?php if( $category['status'] == 1 ){?>
							<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="1" checked="checked" /><label for="active">On</label>

							<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="0" /><label for="active">Off</label>

							<?php } else { ?>

							<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="1" /><label for="active">On</label>

							<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="0" checked="checked"/><label for="active">Off</label>
					<?php } ?>
					</td>
					<td>
						<?php echo ( $archive == 1 )? '<img src="../images/tick.png" height="50px" width="50px" alt="Tick" title="Variety Archived" />' : '<img src="../images/cross.png" height="50px" width="50px" alt="Cross" title="Variety Not Archived" />'; ?>
					</td>	
					<td>
						<input type="hidden" name="ci" value="<?php echo $categoryImage; ?>" />
						<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
						<button class="btn btn-success btn-block btn-large" style="width:267px;">
							<i class="icon icon-save icon-large"></i> Update <?php echo $categoryName; ?>
						</button>						
					</td>
				</tr>
			</form>
				<?php } ?>
	</tbody>
</table>
	</div>
<div class="clearfix"></div>

<script src="js/jquery.js"></script>

<?php include( 'menu.php'); ?>