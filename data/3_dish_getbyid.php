<?php
header("Content:application/json");
@$id=$_REQUEST['id'];
if(empty($id)){
    echo '[]';
    return;
}
include('0_config.php');
$conn=mysqli_connect($db_url,$db_user,$db_pwd,$db_name,$db_port);
$sql="SET NAMES UTF-8";
mysqli_query($conn,$sql);
$sql="SELECT did,name,price,img_lg,detail FROM kf_dish WHERE did=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if(empty($row)){
    echo '[]';
}else{
    echo json_encode($row);
}
