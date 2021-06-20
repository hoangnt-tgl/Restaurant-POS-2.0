<?php
require_once('config.php');

//Sử dụng hàm này thêm, sửa, xóa
function execute($sql) {
    //tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //query
    mysqli_query($conn, $sql);

    //đóng connection
    mysqli_close($conn);
}

//Sử dụng cho lệnh select
function executeResult($sql) {
    //tạo connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    //query
    $resultset = mysqli_query($conn, $sql);
    $list = [];
    while($row = mysqli_fetch_array($resultset, 1)) {
        $list[] = $row;
    }

    //đóng connection
    mysqli_close($conn);

    return $list;
}