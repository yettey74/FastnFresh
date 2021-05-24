<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

if ( $_SESSION['loggedin'] == false || $_SESSION['access'] >= 1 ){
header("location: index.php");
}

include 'db.php';
include 'apple/seed.php';

setlocale(LC_MONETARY, 'en_AU.UTF-8');

$id = isset($_GET['id'])? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Recipe View</title>
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
	<li><a href="recipes.php">Recipes</a></li>
	<li>Recipe View / ID is : -><?php echo $id; ?><-</li>
	</ul>
	<br>
	<br>
	</ul>
	

	<h2>Recipes Details</h2>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="5%"> ID </th>
			<th width="20%"> Variety </th>	
			<th width="10%"> Title </th>
			<th width="10%"> Image </th>	
			<th width="10%"> Blurb </th>
			<th width="10%"> Link </th>
			<th width="10%"> Status </th>
			<th width="5%"> Page Views </th>
			<th width="10%"> Created </th>
			<th width="10%"> Modified </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$result = $conn->prepare("SELECT * FROM recipes WHERE `recipe_id` = '$id'");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
				$recipe_id = $row['recipe_id'];
				$ptid = $row['ptid'];
				$recipe_title = $row['recipe_title'];
				$recipe_image = $row['recipe_image'];
				$recipe_blurb = $row['recipe_blurb'];
				$recipe_link = $row['recipe_link'];
				$status = $row['status'];
				$page_views = $row['page_views'];
				$created_on = $row['created_on'];
				$modified_on = $row['modified_on'];
				
				
			?>
			<div class="profilePicture">
				<?php 
				if( $recipe_image == '' ){
					?><img src="images/recipes/50x25_spacer_green.png" width="250px" height="250px" alt="<?php echo $recipe_title; ?>" title="<?php echo $recipe_title; ?>" /></div><?php					
				} else {
					?><img src="../images/recipes/<?php echo $recipe_image; ?>" width="250px" height="250px" alt="<?php echo $recipe_title; ?>" title="<?php echo $recipe_title; ?>" /></div><?php
				}
				?>
				
			<td><?php echo $ptid; ?></td>
			<td><?php echo $recipe_title; ?></td>
			<td><?php echo $recipe_image; ?></td>
			<td><?php echo $recipe_blurb; ?></td>		
			<td><?php echo $recipe_link; ?></td>
			<td><?php echo $status; ?></td>
			<td><?php echo $page_views; ?></td>
			<td><?php echo $created_on; ?></td>
			<td><?php echo $modified_on; ?></td>
					
			<td>
				<a title="Click To Edit Recipee" rel="facebox" href="editRecipee.php?id=<?php echo $recipe_id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php echo $recipe_id; ?>" class="delbutton" title="Click To Delete">
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
	<h2>Ingredients List 
		<a title="Click To Add Hours" rel="facebox" href="addHours.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Ingredient  
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
		$ingredients = $conn->prepare("SELECT * FROM recipe_ingredients WHERE `recipe_id` = '$id'");
		$ingredients->execute();
		for( $i = 0; $ings = $ingredients->fetch(); $i++ ){
			$ri_id = $ings['ri_id'];
			$ri_ingredient = $ings['ri_ingredient'];
			$ri_amount = $ings['ri_amount'];
			?>

			<td><?php echo $ri_ingredient; ?></td>
			<td><?php echo $ri_amount; ?></td>		
			<td>
			<a title="Click To Edit Ingredient" rel="facebox" href="editIngredient.php?id=<?php echo $ri_id; ?>">
				<button class="btn btn-warning btn-mini">
					<i class="icon-edit"></i> Edit  
				</button>
			</a>
			<a href="#" id="<?php echo $ri_id; ?>" class="delHourbutton" title="Click To Delete">
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
	<h2>Steps 
		<a title="Click To Add Step" rel="facebox" href="addstep.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Step  
			</button>
		</a></h2>
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">	
			<th width="10%"> Step </th>
			<th width="10%"> Description </th>
			<th width="10%"> Created </th>
			<th width="10%"> Modified </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php
				$recipes = $conn->prepare("SELECT * FROM `recipe_steps` WHERE `recipe_id` = '$id'");
				$recipes->execute();
				for( $i = 0; $recipe = $recipes->fetch(); $i++ ){
					$rs_id = $recipe['rs_id'];
					$rs_step = $recipe['rs_step'];
					$rs_description = $recipe['rs_description'];
					$rs_created_on = $recipe['created_on'];
					$rs_modified_on = $recipe['modified_on'];
					?>

					<td><?php $rs_step; ?></td>
					<td><?php $rs_description; ?></td>	
					<td><?php $rs_created_on; ?></td>		
					<td><?php $rs_modified_on; ?></td>	
					<td>
				<a title="Click To Edit Steps" rel="facebox" href="editSteps.php?id=<?php echo $rs_id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
						
				<a href="#" id="<?php echo $rs_id; ?>" class="delbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete Recipe
					</button>
				</a>
				<a href="#" id="<?php echo $ri_id; ?>" class="delIngredientsbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete Ingredient
					</button>
				</a>
				<a href="#" id="<?php echo $rs_id; ?>" class="delStepsbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete Step
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
	if(confirm("Are you sure you want to delete this Recipe?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteRecipe.php",
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

	$(".delIngredientsbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this Recipies Ingredient?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteIngredient.php",
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

	$(".delStepsbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this Recipies Step?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteSteps.php",
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