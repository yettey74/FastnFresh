<html>
<head>
	<title>Test</title>
	<script>
	  function update( id, value )
		{
			// var arr = [];
			var container = document.getElementById(test);
			//container.innerHTML = value;	
			
			alert("Id is : " + id + " && Value is : " + value);
			/*
			if ( value == 0 ){		   	
				for ( var i=0; i=arr.length; i++ ){
					if ( arr[i].id == id ){
						delete arr[i];
					}
				}
			}	
			if ( id in arr){				
				// get value
				for ( var i=0; i=arr.length; i++ )
					{						
						if ( arr[i].id == this.id ){
							alert("cart before " + arr[i].value);
							arr[i].value = this.value;
							alert("cart after " + arr[i].value);
						}
					}
				// increase or decrease
				// test if 0 and remove if required
			} else {
				// add new product to cart
				arr.push({id:this.id,value:1});
			}
*/


		}
	</script>
</head>

<body>
	<div class="cart" id="cart">0</div>
	<label>Item</label>
	<input type="number" id="test" name="test" value="" min="0" onClick = "update( id, value )"/>
</body>
</html>