<?php
session_start();
include('db.php');
// new data
$id = ($_POST['customer_ID'])? $_POST['customer_ID'] : '';
$a = ($_POST['firstName'])? $_POST['firstName'] : '';
$b = ($_POST['lastName'])? $_POST['lastName'] : '';
$c = ($_POST['contact'])? $_POST['contact'] : '';
$d = ($_POST['phone1'])? $_POST['phone1'] : '';
$e = ($_POST['phone2'])? $_POST['phone2'] : '';
$f = ($_POST['fax'])? $_POST['fax'] : '';
$g = ($_POST['email'])? $_POST['email'] : '';
$h = ($_POST['billAddress1'])? $_POST['billAddress1'] : '';
$i = ($_POST['billAddress2'])? $_POST['billAddress2'] : '';
$j = ($_POST['billFlat'])? $_POST['billFlat'] : '';
$k = ($_POST['billStreetNumber'])? $_POST['billStreetNumber'] : '';
$l = ($_POST['billStreet'])? $_POST['billStreet'] : '';
$m = ($_POST['billStreetType'])? $_POST['billStreetType'] : '';
$n = ($_POST['billSuburb'])? $_POST['billSuburb'] : '';
$o = ($_POST['billCity'])? $_POST['billCity'] : '';
$p = ($_POST['billState'])? $_POST['billState'] : '';
$q = ($_POST['billPostcode'])? $_POST['billPostcode'] : '';
$r = ($_POST['billNotes'])? $_POST['billNotes'] : '';
$s = ($_POST['deliveryTitle1'])? $_POST['deliveryTitle1'] : '';
$t = ($_POST['deliveryTitle2'])? $_POST['deliveryTitle2'] : '';
$u = ($_POST['deliveryFlat'])? $_POST['deliveryFlat'] : '';
$v = ($_POST['deliveryStreetNumber'])? $_POST['deliveryStreetNumber'] : '';
$w = ($_POST['deliveryStreetName'])? $_POST['deliveryStreetName'] : '';
$x = ($_POST['deliveryStreetType'])? $_POST['deliveryStreetType'] : '';
$y = ($_POST['deliverySuburb'])? $_POST['deliverySuburb'] : '';
$z = ($_POST['deliveryCity'])? $_POST['deliveryCity'] : '';
$aa = ( $_POST['deliveryState'])? $_POST['deliveryState'] : '';
$ab = ( $_POST['deliveryPostcode'])? $_POST['deliveryPostcode'] : '';
$ac = ( $_POST['deliveryNotes'])? $_POST['deliveryNotes'] : '';
$ad = ( $_POST['terms'])? $_POST['terms'] : '';

// query
$sql = "INSERT INTO `customer` ( `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `billFlat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billPostcode`, `billNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryFlat`, `deliveryStreetNo`, `deliveryStreetName`, `deliveryStreetType`, `deliverySuburb`, `deliveryCity`, `deliveryState`, `deliveryPostcode`, `deliveryNotes`, `terms`) 
		VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u,:v,:w,:x,:y,:z,:aa,:ab,:ac,:ad)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':o'=>$o,':p'=>$p,':q'=>$q,':r'=>$r,':s'=>$s,':t'=>$t,':u'=>$u,':v'=>$v,':w'=>$w,':x'=>$x,':y'=>$y,':z'=>$z,':aa'=>$aa,':ab'=>$ab,':ac'=>$ac,':ad'=>$ad));
header("location: customerView.php");
?>