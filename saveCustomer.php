<?php
session_start();
include('db.php');
// new data
// $id = ($_POST['customer_ID'])? $_POST['customer_ID'] : '';
$a = isset($_POST['firstName'])? $_POST['firstName'] : '';
$b = isset($_POST['lastName'])? $_POST['lastName'] : '';
$c = isset($_POST['contact'])? $_POST['contact'] : '';
$d = isset($_POST['phone1'])? $_POST['phone1'] : '';
$e = isset($_POST['phone2'])? $_POST['phone2'] : '';
$f = isset($_POST['fax'])? $_POST['fax'] : '';
$g = isset($_POST['email'])? $_POST['email'] : '';
$h = isset($_POST['billAddress1'])? $_POST['billAddress1'] : '';
$i = isset($_POST['billAddress2'])? $_POST['billAddress2'] : '';
$j = isset($_POST['billFlat'])? $_POST['billFlat'] : '';
$k = isset($_POST['billStreetNumber'])? $_POST['billStreetNumber'] : '';
$l = isset($_POST['billStreet'])? $_POST['billStreet'] : '';
$m = isset($_POST['billStreetType'])? $_POST['billStreetType'] : '';
$n = isset($_POST['billSuburb'])? $_POST['billSuburb'] : '';
$o = isset($_POST['billCity'])? $_POST['billCity'] : '';
$p = isset($_POST['billState'])? $_POST['billState'] : '';
$q = isset($_POST['billPostcode'])? $_POST['billPostcode'] : '';
$r = isset($_POST['billNotes'])? $_POST['billNotes'] : '';
$s = isset($_POST['deliveryTitle1'])? $_POST['deliveryTitle1'] : '';
$t = isset($_POST['deliveryTitle2'])? $_POST['deliveryTitle2'] : '';
$u = isset($_POST['deliveryFlat'])? $_POST['deliveryFlat'] : '';
$v = isset($_POST['deliveryStreetNumber'])? $_POST['deliveryStreetNumber'] : '';
$w = isset($_POST['deliveryStreetName'])? $_POST['deliveryStreetName'] : '';
$x = isset($_POST['deliveryStreetType'])? $_POST['deliveryStreetType'] : '';
$y = isset($_POST['deliverySuburb'])? $_POST['deliverySuburb'] : '';
$z = isset($_POST['deliveryCity'])? $_POST['deliveryCity'] : '';
$aa = isset( $_POST['deliveryState'])? $_POST['deliveryState'] : '';
$ab = isset( $_POST['deliveryPostcode'])? $_POST['deliveryPostcode'] : '';
$ac = isset( $_POST['deliveryNotes'])? $_POST['deliveryNotes'] : '';
$ad = isset( $_POST['terms'])? $_POST['terms'] : '';

// query
$sql = "INSERT INTO `fnfCustomer` ( `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `billFlat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryFlat`, `deliveryStreetNumber`, `deliveryStreetName`, `deliveryStreetType`, `deliverySuburb`, `deliveryCity`, `deliveryState`, `deliveryNotes`, `terms`) 
		VALUES ( :a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o, :p, :r, :s, :t, :u, :v, :w, :x, :y, :z,:aa,:ac,:ad )";
/*$sql = "INSERT INTO `fnfCustomer` ( `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `billFlat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billPostcode`, `billNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryFlat`, `deliveryStreetNo`, `deliveryStreetName`, `deliveryStreetType`, `deliverySuburb`, `deliveryCity`, `deliveryState`, `deliveryPostcode`, `deliveryNotes`, `terms`) 
		VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u,:v,:w,:x,:y,:z,:aa,:ab,:ac,:ad)";*/
$q = $conn->prepare($sql);
/*$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d, ':e'=>$e, ':f'=>$f, ':g'=>$g, ':h'=>$h, ':i'=>$i, ':j'=>$j, ':k'=>$k, ':l'=>$l, ':m'=>$m, ':n'=>$n, ':o'=>$o, ':p'=>$p, ':q'=>$q, ':r'=>$r, ':s'=>$s, ':t'=>$t, ':u'=>$u, ':v'=>$v, ':w'=>$w, ':x'=>$x, ':y'=>$y, ':z'=>$z, ':aa'=>$aa, ':ab'=>$ab, ':ac'=>$ac, ':ad'=>$ad ) );*/

$q->execute( array( ':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g, ':h'=>$h, ':i'=>$i, ':j'=>$j, ':k'=>$k, ':l'=>$l, ':m'=>$m, ':n'=>$n, ':o'=>$o, ':p'=>$p, ':r'=>$r, ':s'=>$s, ':t'=>$t, ':u'=>$u, ':v'=>$v, ':w'=>$w, ':x'=>$x, ':y'=>$y, ':z'=>$z, ':aa'=>$aa, ':ac'=>$ac, ':ad'=>$ad ) );

header("location: customerView.php");
?>