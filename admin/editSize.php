<?php
include 'sec.layer.php';

$sizes = $conn->query("SELECT * FROM `sizes`");
$sizes->execute();

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Edit Sizes</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
</head>
<body>
  <div id="content">
	  <img src="images/store_logo_head400x120_trans.png" width="auto" height="auto" alt="logo" title="logo" />
	<center><h2><i class="icon-edit icon-large"></i> Edit Sizes</h2></center>	
<br><br>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align: center; font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Size </th>
			<th width="6%"> Action </th>
		</tr>
	</thead>
	<tfoot>
		<tr style="background: #0AFF00; text-align:center;font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Name </th>
			<th width="6%"> Action </th>
		</tr>
	</tfoot>
	<tbody>
			<hr>
			<div id="ac">
				<?php
				foreach ( $sizes as $size ){	
					$size_id = $size['size_id'];
					$size_title = $size['size_title'];
				?>
				<form action="updateSize.php" method="post">
				<tr class="record">
					<td><?php echo $size_id; ?></td>
					<td>
						<input type="text" name="size_title" value="<?php echo !empty( $size_title )? $size_title : '';?>" />
					</td>
					
					<td>
						<input type="hidden" name="size_id" value="<?php echo $size_id; ?>" />
						<button class="btn btn-success btn-block btn-large" style="width:267px;">
							<i class="icon icon-save icon-large"></i> Update <?php echo $size_title; ?>
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