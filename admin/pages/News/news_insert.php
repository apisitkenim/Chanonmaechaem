<?php

require_once "../../../ConnectDatabase/connectionDb.inc.php";


$id =  $_POST['_id'];
$topic = $_POST['_topic'];
$message = $_POST['_message'];

if ($_FILES['_image']['name'] != '') {
    $path = $_FILES['_image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $new_image_name = 'img_'.uniqid().".".$ext;
    $image_path = "../../../images/";
    $upload_path = $image_path.$new_image_name;

    //upload to database
     $isUpload = move_uploaded_file($_FILES['_image']['tmp_name'], $upload_path);


if ($isUpload==false){
  alertMassage("ไม่สามารถ upload image ได้");
  exit();
}else {

  $topic = $_POST['_topic'];
  $message = $_POST['_message'];

  $value = array(
      "photo"=>$new_image_name
       ,"topic"=>$topic
       ,"message"=>$message
       ,"datenews"=>date("Y-m-d H:i:s")
  );


  if (intval($id) > 0){
    if ($conn->update("news", $value, array("newsid" => $id))) {
      alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','newsList.php');
    }else{
      alertMassageAndRedirect("ไม่สามารถบันทึกข้อมูลได้",'newsList.php');
    }
  }
  else{
    if($conn->create("news",$value)){
      alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','newsList.php');
    }else{
      alertMassageAndRedirect("ไม่สามารถบันทึกข้อมูลได้",'newsList.php');
    }
  }
}

}else{
  alertMassage('ไม่พบรูปภาพ');
}
