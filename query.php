<?php
include('connect.php');

$db = $connect;
$table = "mproject";
$column = ['id', 'merchant_city', 'delivery_channel', 'amount', 'trx_status'];
$fetch = fetch_data($db, $table, $column);
$fetch2 = fetch_data2($db, $table, $column);

function fetch_data($db, $table, $column) {
    if(empty($db)) {
        $message = "Database connection error";
    } elseif (empty($column) || !is_array($column)) {
        $message = "Column name must be defined in an indexed array";
    } elseif(empty($table)) {
        $message = "Table name is empty";
    } else {
        $query = "SELECT delivery_channel, COUNT(CASE WHEN trx_status='SUCCESS' THEN 1 END) AS trx_success, COUNT(CASE WHEN trx_status='FAILED' THEN 1 END) AS trx_failed FROM mproject GROUP BY delivery_channel";
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
    }
    return $message;
}

function fetch_data2($db, $table, $column) {
    if(empty($db)) {
        $message2 = "Database connection error";
    } elseif (empty($column) || !is_array($column)) {
        $message2 = "Column name must be defined in an indexed array";
    } elseif(empty($table)) {
        $message2 = "Table name is empty";
    } else {
        $query2 = "SELECT SUBSTRING(merchant_city,6) AS city, COUNT(CASE WHEN trx_status='SUCCESS' THEN 1 END) AS trx_success FROM mproject GROUP BY merchant_city";
        $result2 = $db->query($query2);

        if($result2==true) {
            if($result2->num_rows > 0) {
                $row2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                $message2 = $row2;
            } else {
                $message2 = "No data found";
            }
        } else {
            $message2 = mysqli_error($db);
        }
    }
    return $message2;
}
?>