<?php
header("Content-Type:application/json");
@$kw=$_REQUEST['kw'];
if(empty($kw)){
    echo '[]';
    return;
}
include('0_config.php');
$conn=mysqli_connect($db_url,$db_user,$db_pwd,$db_name,$db_port);
$sql="SET NAMES UTF-8";
mysqli_query($conn,$sql);
$sql="SELECT did,name,price,img_sm,material FROM kf_dish WHERE name LIKE '%$kw%' OR material LIKE '%$kw%'";

$result=mysqli_query($conn,$sql);

$list=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($list);