<?php
header("Content:application/json");
@$phone=$_REQUEST['phone'];
if(empty($phone)){
    echo '[]';
    return;
}
include('0_config.php');
$conn=mysqli_connect($db_url,$db_user,$db_pwd,$db_name,$db_port);
$sql="SET NAMES UTF-8";
mysqli_query($conn,$sql);
$sql="SELECT kf_order.oid,kf_order.user_name,kf_order.order_time,kf_dish.img_sm,kf_dish.did FROM kf_order,kf_dish WHERE kf_order.did=kf_dish.did AND kf_order.phone='$phone'";
$result=mysqli_query($conn,$sql);
$list=mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($list);

