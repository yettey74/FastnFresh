<?php
include 'sec.layer.php';
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Recipes</title>  
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/search.css">
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
	<script type="text/javascript">
$(document).ready(function(){
    $('.recipe-search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("recipe-backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".recipe-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".result").empty();
		
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
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Recipes</li>

<div style="margin-top: -19px; margin-bottom: 21px;">
<?php 
	$result = $conn->prepare("SELECT * FROM recipes");
	$result->execute();
	$rowcount = $result->rowcount();
?>
	<div id="count" style="text-align:center;">
	Total Recipes: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
	</div>
</div>

<div class="recipe-search-box">
	<input type="text" autocomplete="off" placeholder="Search Campaigns..." id="search" name="search" onBlur="clear()" value=""/>
	<div class="result"></div>
</div>

	<a rel="facebox" href="addrecipe.php">
		<Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />
			<i class="icon-plus-sign icon-large"></i> New Recipe 
		</button>
	</a>
	</ul>
	<br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="17%"> ID </th>
			<th width="23%"> Title </th>	
			<th width="10%"> Image </th>	
			<th width="23%"> Blurb </th>
			<th width="10%"> Variety </th>	
			<th width="23%"> link </th>
			<th width="10%"> Status </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
		include('db.php');
		$result = $conn->prepare("SELECT * FROM recipes");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			$id = $row['recipe_id'];					
			?>
			<tr class="record">
			<td><?php echo $id ?></td>
			<td><?php echo $row['recipe_title']; ?></td>
			<td><img src="../images/<?php echo $row['recipe_image']; ?>" width="50px" height="50px" alt=" <?php echo $row['recipe_title']; ?>" title="<?php echo $row['recipe_title'];?>" /></td>
			<td><?php echo $row['recipe_blurb']; ?></td>			
			<td><?php echo $row['ptid']; ?></td>			
			<td><?php echo $row['recipe_link']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td>
				<a title="Click To Edit Recipe" rel="facebox" href="editRecipe.php?id=<?php echo $id; ?>">
					<button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button>
				</a> 
				
				<a title="Click To View Recipe" href="recipeview.php?id=<?php echo $id; ?>">
					<button class="btn btn-info btn-mini"><i class="icon-edit"></i> View </button>
				</a>
				
				<a href="#" id="<?php echo $id; ?>" class="delbutton" title="Click To Delete">
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
	if(confirm("Are you sure want to delete this Recipe?"))
		{
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
</div> <!-- END OF SHOP CLASS -->
<?php include( 'menu.php'); ?>