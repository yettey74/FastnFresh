<?php
include 'sec.layer.php';
// new data
// $id = ($_POST['customer_ID'])? $_POST['customer_ID'] : '';
$date=date_create();
$a = isset($_POST['supplier_name'])? $_POST['supplier_name'] : '';
$b = isset($_POST['company'])? $_POST['company'] : '';
$d = isset($_POST['address1'])? $_POST['address1'] : '';
$e = isset($_POST['address2'])? $_POST['address2'] : '';
$f = isset($_POST['address3'])? $_POST['address3'] : '';
$g = isset($_POST['address4'])? $_POST['address4'] : '';
$h = isset($_POST['address5'])? $_POST['address5'] : '';
$i = isset($_POST['contact'])? $_POST['contact'] : '';
$j = isset($_POST['alt_contact'])? $_POST['alt_contact'] : '';
$k = isset($_POST['phone1'])? $_POST['phone1'] : '';
$l = isset($_POST['phone2'])? $_POST['phone2'] : '';
$m = isset($_POST['fax'])? $_POST['fax'] : '';
$n = isset($_POST['email'])? $_POST['email'] : '';
$o = isset($_POST['chequeName'])? $_POST['chequeName'] : '';
$p = isset($_POST['account_number'])? $_POST['account_number'] : '';
$q = isset($_POST['supplier_type'])? $_POST['supplier_type'] : '';
$r = isset($_POST['terms'])? $_POST['terms'] : '';
$s = isset($_POST['credit_limit'])? $_POST['credit_limit'] : '';
$t = isset($_POST['tax_id'])? $_POST['tax_id'] : '';
$u = isset($_POST['note'])? $_POST['note'] : '';
$v = isset($_POST['status'])? $_POST['status'] : '';
$w = date_timestamp_get($date);
// query
$q = $conn->prepare("INSERT INTO `assets` ( `supplier_name`, `company`, `address1`, `address2`, `address3`, `address4`, `address5`, `contact`, `alt_contact`, `phone1`, `phone2`, `fax`, `email`, `chequeName`, `account_number`, `supplier_type`, `terms`, `credit_limit`, `tax_id`, `note`, `status` ) 
		VALUES ( :a, :b, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o, :p, :q, :r, :s, :t, :u, :v )");

$q->execute( array( ':a'=>$a,':b'=>$b,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,'k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':o'=>$o,':p'=>$p,':q'=>$q,':r'=>$r,':s'=>$s,':t'=>$t,':u'=>$u,':v'=>$v ) );
header("location: suppliers.php");
?>