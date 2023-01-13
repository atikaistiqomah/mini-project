<?php
include("connect.php");

$db = $connect;
$table = "mproject";
$column = ['id', 'merchant_city', 'delivery_channel', 'amount', 'trx_status'];
$fetch = fetch_data($db, $table, $column);

function fetch_data($db, $table, $column) {
    if(empty($db)) {
        $message = "Database connection error";
    } elseif (empty($column) || !is_array($column)) {
        $message = "Column name must be defined in an indexed array";
    } elseif(empty($table)) {
        $message = "Table name is empty";
    } else {
        $columnName = implode(", ", $column);
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
?>