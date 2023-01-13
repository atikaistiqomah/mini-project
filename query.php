<?php
include('connect.php');

$db = $connect;
$table = "mproject";
$fetch = fetch_data($db, $table);
$fetch2 = fetch_data2($db, $table);
$fetch3 = fetch_data3($db, $table);

function fetch_data($db, $table) {
    $query = "SELECT delivery_channel, COUNT(CASE WHEN trx_status='SUCCESS' THEN 1 END) AS trx_success,COUNT(CASE WHEN trx_status='FAILED' THEN 1 END) AS trx_failed FROM $table GROUP BY delivery_channel";
    $result = $db->query($query);
    
    if($result==true) {
        if($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $message = $row;
        } else {
            $message = "No data found";
        }
    } else {
        $message = mysqli_error($db);
    }
    return $message;
}

function fetch_data2($db, $table) {
    $query = "SELECT SUBSTRING(merchant_city,6) AS city, COUNT(CASE WHEN trx_status='SUCCESS' THEN 1 END)AS trx_success FROM $table GROUP BY merchant_city";
    $result = $db->query($query);
    
    if($result==true) {
        if($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $message = $row;
        } else {
            $message = "No data found";
        }
    } else {
        $message = mysqli_error($db);
    }
    return $message;
}

function fetch_data3($db, $table) {
    $query = "SELECT delivery_channel, SUM(CASE WHEN trx_status='SUCCESS' THEN amount END) AS total_amount FROM $table GROUP BY delivery_channel";
    $result = $db->query($query);
    
    if($result==true) {
        if($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $message = $row;
        } else {
            $message = "No data found";
        }
    } else {
        $message = mysqli_error($db);
    }
    return $message;
}
?>