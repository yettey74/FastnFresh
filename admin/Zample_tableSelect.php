<?php
session_start();
include('db.php');
include 'apple/seed.php';
setlocale(LC_MONETARY, 'en_AU.UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Shop</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/styleAdmin.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/search.css">
  <link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>	

<script>  
	$("tbody tr").click(function () {
            $('.selected').removeClass('selected');
            $(this).addClass("selected");
            var product = $('.p',this).html();
            var infRate =$('.i',this).html();
            var note =$('.n',this).html();
            alert(product +','+ infRate+','+ note);
    });
</script>
	 <style>
	 /*** central column on page ***/
        div#divContainer
        {
            max-width: 800px;
            margin: 0 auto;
            font-family: Calibri;
            padding: 0.5em 1em 1em 1em;
 
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
 
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#808080));
            background: -moz-linear-gradient(top, #606060, #808080);
 
            /* add box shadows */
            -moz-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
        }
 
        h1 {color:#FFE47A; font-size:1.5em;}
 
        /*** sample table to demonstrate CSS3 formatting ***/
        table.formatHTML5 {
            width: 100%;
            border-collapse:collapse;
            text-align:left;
            color: #606060;
        }
 
        /*** table's thead section, head row style ***/
        table.formatHTML5 thead tr td  {
            background-color: White;
            vertical-align:middle;
            padding: 0.6em;
            font-size:0.8em;
        }
 
        /*** table's thead section, coulmns header style ***/
        table.formatHTML5 thead tr th
        {
            padding: 0.5em;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's tbody section, odd rows style ***/
        table.formatHTML5 tbody tr:nth-child(odd) {
           background-color: #fafafa;
        }
 
        /*** hover effect to table's tbody odd rows ***/
        table.formatHTML5 tbody tr:nth-child(odd):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's tbody section, even rows style ***/
        table.formatHTML5 tbody tr:nth-child(even) {
            background-color: #efefef;
        }
 
        /*** hover effect to apply to table's tbody section, even rows ***/
        table.formatHTML5 tbody tr:nth-child(even):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
		 
		/*** table's tbody section, last row style ***/
        table.formatHTML5 tbody tr:first-child {
             border-top: solid 3px #404040;
        }
 
       /*** table's tbody section, last row style ***/
        table.formatHTML5 tbody tr:last-child {
             border-bottom: solid 3px #404040;
        }
 
        /*** table's tbody section, separator row pseudo-class ***/
        table.formatHTML5 tbody tr.separator {
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's td element, all section ***/
        table.formatHTML5 td {
           vertical-align:middle;
           padding: 0.5em;
        }
 
        /*** table's tfoot section ***/
        table.formatHTML5 tfoot{
            text-align:center;
            color:#303030;
            text-shadow: 0 1px 1px rgba(255,255,255,0.3);
        }

		table.formatHTML5 tr.selected {
			background-color: #e92929 !important;
			color:#fff;
            vertical-align: middle;
            padding: 1.5em;
        }
	 </style>
</head>
<body>
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content">
  <div class="shop">
	<ul class="breadcrumb">
		<span>
			<form name="clock">
				<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
			</form>
		</span>
		<li><a href="door.php">Dashboard</a></li>
		<li>Shop</li>
	</ul>
    <!-- CENTTERED COLUMN ON THE PAGE-->
    <div id="divContainer">
 
        <h1>Demo</h1>
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
               <tr><td colspan=3>DEMO</td></tr>
                <tr>
                    <th>Product</th><th>Inflation Rate</th><th>Note</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p">Coke® Inflation Index</td>
					<td class="i">7.23%</td>
					<td class="n">Yeah, it's about $2/bottle now</td>
                </tr>
                <tr>
                    <td class="p">Gas Inflation Index</td>
					<td class="i">6.94%</td>
					<td class="n">Such a pain at the pump!</td>
                 </tr>
                <tr>
                    <td class="p">How could I select this row</td><td class="i">6.94%</td><td class="n">Hello</td>
                 </tr>
                <tr>
                    <td class="p">Nope cannot select this row either</td><td class="i">6.94%</td><td class="n">Nothing</td>
                 </tr>

            </tbody>
         </table>
    </div>
</div>
	</div>
</body>

</html>