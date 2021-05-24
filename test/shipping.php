<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Same Day delivery</title>
	<!-- Added jQuery loading -->
<meta charset="utf-8">
  <link rel="shortcut icon" href="./favicon.ico">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <!-- jQuery library -->
  <script src="./js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style>
		.pr8 {
		  padding-right: 8px;
		}
		.red {
		  font-weight: 600!important;
		  color: #ff0000;
		}
		.spacer,
		.help-block {
		  clear: both;
		  padding: 0 7px;
		}
		.fw6 {
		  font-weight: 600;
		}
		.full-width {
		  width: 100%;
		}
		table#product-list {
		  width: 100%;
		}
		table#product-list thead tr th {
		  background-color: #fff !important;
		  font-weight: 500;
		  color: #0080a6 !important;
		  border-bottom: solid 2px #0080a6;
		  padding: 5px 2px 8px 2px;
		}
		table#product-list tbody {
		  background-color: #fff;
		  color: #333 !important;
		}
		table#product-list tbody tr td:first-child {
		  font-weight: 500;
		  text-align: left !important;
		}
		table#product-list tbody tr td {
		  font-weight: 300;
		  text-align: right !important;
		}
		table#product-list tbody tr td:last-child {
		  font-weight: 600;
		  text-align: right !important;
		}
		table#product-list tbody tr#product-totals {
		  clear: both;
		  padding-top: 10px;
		  margin-top: 10px;
		}
		table#product-list tbody tr#product-totals td:last-child {
		  border-top: dotted 1px #0080a6;
		  padding: 4px 0;
		  text-align: left;
		  font-weight: 600;
		  border-bottom: solid 1px #0080a6;
		}
		table#product-list tbody tr td.qty {
		  text-align: center !important;
		}
		table#product-list tbody tr td.item-cost {
		  padding: 0 4px 0 0;
		}
		table#product-list tbody tr td.tax {
		  margin: 0 5px 0 3px;
		}
		table#product-list tbody tr td.total {
		  margin: 0 0 0 5px;
		}
	</style>
	
	<script>
		$("#shippingmethod").change(function() {
  // Get the value from dropdown
  var shippingPrice = $(this).val()
  // Get the value from id="shippingqty" td content
  var shippingQty = $("#shippingqty").html();
  // get the value from id="producttotal" td content
  var prodPriceWithSymbol = $("#producttotal").html();

  // remove the $ symbol from prodPriceWithSymbol text 
  var productTotal = prodPriceWithSymbol.substring(1, prodPriceWithSymbol.length);
  // strings to floats, multiply, round to 2 decimals
  var shippingTotal = (parseFloat(shippingPrice) * parseFloat(shippingQty)).toFixed(2);
  // strings to float, add, round to 2 decimals
  var grandTotal = (parseFloat(shippingTotal) + parseFloat(productTotal)).toFixed(2);

  // Set id="shippingprice" td content
  $("#shippingprice").html("$" + shippingPrice);
  // set id="shippingtotal" td content
  $("#shippingtotal").html("$" + shippingTotal);
  // set id='grandtotal" td content
  $("#grandtotal").html("$" + grandTotal);
});
	</script>
</head>
<body>	
<form id="ReviewShippingAndPayment" name="ReviewShippingAndPayment" method="post" action="shipping.php">
    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12 p0">
        <div class="pl8 bbcustom p0">
            <h2 class="page-header"><i class="fa fa-cube pr8 hidden-sm hidden-xs"></i>Shipping Method Selection</h2>
            <p>
            The desired outcome is driven by the "<span class="fw6">Select a Shipping Method</span>" dropdown.<br /><br />When a shipping method is selected, then the "Item Cost" should be multiplied by the "Qty." and displayed in the Shipping Cost Total column.<br /><br />Such selection should also update the final cost that include the Product Cost + Total Shipping. 
            </p>
            <span class="spacer"></span>
        </div>
        <div class="spacer"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p0">
            <div class="shipping-method-container">
                <div class="field-wrapper">
                    <div class="input-group full-width">
                        <span class="input-group-addon main-color hidden-sm hidden-xs">$</span>		
                        <select id="shippingmethod" class="selectpicker form-control shipping-method" name="shippingmethod" aria-label="Shipping Method" tabindex="">
                            <option value="" selected="">Selet a Shipping Method</option>
                            <option value="2.95">US Mail - $2.95</option>
                            <option value="3.50">Priority Mail - $3.50</option>
                            <option value="4.67">Fedex - $4.67</option>
                        </select>
                    </div>
                </div>
                <span class="help-block"></span>
            </div>           
            <div class="clearfix"></div>
            <hr style="margim:0px;padding:0;" />
            <div class="clearfix"></div>
            <table id="product-list">
                <thead>
                    <tr>
                        <th class="text-left">Item</th>
                        <th class="text-center">Qty.</th>
                        <th class="text-center">Item Cost</th>
                        <th class="text-center">Tax</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="pt5"></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td class="qty">1</td>
                        <td class="item-cost">$10.00</td>
                        <td class="tax">$0.68</td>
                        <td class="total">$10.68</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="pt5"></td>
                    </tr>
                    <tr>
                        <td>Shipping Cost</td>
                        <td class="qty red">1</td>
                        <td class="item-cost red">$2.95</td>
                        <td class="tax">$0.00</td>
                        <td class="total red">$5.90</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="pt5"></td>
                    </tr>
                    <tr id="product-totals">
                        <td colspan="4"></td>
                        <td class="total red">$13.02</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>
</html>