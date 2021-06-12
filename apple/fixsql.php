<?php
include ('../db.php');

// get all each product from the product type table

// for each uom type update the the product_cost table

// that will give us the data we need to select the right product to price for the uom drop down

//

$sql = '';
$ptq = "SELECT * FROM `producttype`";
$ptr = $conn->query($ptq);

foreach($ptr as $pt) {
    // get the row data and see if there is more than one type of price
    if ( $pt['kilo'] > 0 )
    {
        $ptid = $pt['ptid'];
        $kilo = $pt['kilo'];
        // make sql entry
        $sql .= "INSERT INTO `product_cost_price` (`ptid`, `uomid`, `cost_price`) VALUES ('$ptid', '1', '$kilo');";
    }
    if ( $pt['box'] > 0 )
    {
        $ptid = $pt['ptid'];
        $box = $pt['box'];
        // make sql entry
        $sql .= "INSERT INTO `product_cost_price` (`ptid`, `uomid`, `cost_price`) VALUES ('$ptid', '2', '$box');";
    }
    if ( $pt['punnet'] > 0 )
    {
        $ptid = $pt['ptid'];
        $punnet = $pt['punnet'];
        // make sql entry
        $sql .= "INSERT INTO `product_cost_price` (`ptid`, `uomid`, `cost_price`) VALUES ('$ptid', 1 , '3');";
    }
    if ( $pt['bunch'] > 0 )
    {
        $ptid = $pt['ptid'];
        $bunch = $pt['bunch'];
        // make sql entry
        $sql .= "INSERT INTO `product_cost_price` (`ptid`, `uomid`, `cost_price`) VALUES ('$ptid', '4', '$bunch');";
    }
    if ( $pt['single'] > 0 )
    {
        $ptid = $pt['ptid'];
        $single = $pt['single'];
        // make sql entry
        $sql .= "INSERT INTO `product_cost_price` (`ptid`, `uomid`, `cost_price`) VALUES ('$ptid', '5', '$single');";
    }
    
}
echo $sql;

?>
