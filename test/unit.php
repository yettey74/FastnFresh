<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Price Update</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script>
		  alert("you have loaded");
	</script>
	<script type="text/javascript">
		function update(){
			alert("Hi : " + unitTypeForm.unitType[unitTypeForm.unitType.selectedIndex].value);
			document.getElementById('uom').innerHTML = unitTypeForm.unitType[unitTypeForm.unitType.selectedIndex].value		
		}
	</script>
</head>

<body>
<form id="unitTypeForm" name="unitTypeForm" method="post" action="unit.php">	
	<select id="unitType" class="selectpicker form-control shipping-method" name="unitType" aria-label="Unit of Measure" tabindex="" onChange="update()">
		<option value="" selected="">Selet a Shipping Method</option>
		<option value="2.95">US Mail - $2.95</option>
		<option value="3.50">Priority Mail - $3.50</option>
		<option value="4.67">Fedex - $4.67</option>
	</select>
		
</form>
	<div class="uom" id="uom" name="uom"></div>
</body>
</html>