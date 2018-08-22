<?php

require_once "../../../ConnectDatabase/connectionDb.inc.php";


$id =  $_POST['_id'];
$code = $_POST['_code'];
$name = $_POST['_name'];
$name2 = $_POST['_name2'];
$name3 = $_POST['_name3'];
$name4 = $_POST['_name4'];
$type = $_POST['_type'];
$price = $_POST['_price'];
$typeProduct = $_POST['_typeProduct'];
$status = $_POST['_status'];
$detail = $_POST['_detail'];
$amount= $_POST['_amount'];
//size
// $xs = $_POST['_xs'];
// $s = $_POST['_s'];
// $m = $_POST['_m'];
// $l = $_POST['_l'];
// $xl = $_POST['_xl'];
// $xxl = $_POST['_xxl'];

$image_path = "../../../images/";

if ($_FILES['_image']['name'] != '') {
    $path = $_FILES['_image']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $new_image_name = 'img_'.uniqid().".".$ext;
    $upload_path = $image_path.$new_image_name;

    //upload to database
     $isUpload = move_uploaded_file($_FILES['_image']['tmp_name'], $upload_path);
}

if ($_FILES['_image2']['name'] != '') {
    $path2 = $_FILES['_image2']['name'];
    $ext2 = pathinfo($path2, PATHINFO_EXTENSION);
    $new_image_name2 = 'img_'.uniqid().".".$ext2;
    $upload_path2 = $image_path.$new_image_name2;

    //upload to database
     $isUpload2 = move_uploaded_file($_FILES['_image2']['tmp_name'], $upload_path2);
}

if ($_FILES['_image3']['name'] != '') {
    $path3 = $_FILES['_image3']['name'];
    $ext3 = pathinfo($path3, PATHINFO_EXTENSION);
    $new_image_name3 = 'img_'.uniqid().".".$ext3;
    $upload_path3 = $image_path.$new_image_name3;

    //upload to database
     $isUpload3 = move_uploaded_file($_FILES['_image3']['tmp_name'], $upload_path3);
}

if ($_FILES['_image4']['name'] != '') {
    $path4 = $_FILES['_image4']['name'];
    $ext4 = pathinfo($path, PATHINFO_EXTENSION);
    $new_image_name4 = 'img_'.uniqid().".".$ext4;
    $upload_path4 = $image_path.$new_image_name4;

    //upload to database
     $isUpload4 = move_uploaded_file($_FILES['_image4']['tmp_name'], $upload_path4);
}

// if ($isUpload==false){
//   alertMassage("ไม่สามารถ upload image ได้");
//   exit();
// }else {
//
//   $code = $_POST['_code'];
//   $name = $_POST['_name'];
//   $type = $_POST['_type'];
//   $amount = $_POST['_amount'];
//   $price = $_POST['_price'];
//   $typeProduct = $_POST['_typeProduct'];
//   $status = $_POST['_status'];
//   $detail = $_POST['_detail'];
//

  if (intval($id) > 0){
    // $value = array(
    //     "productsphoto"=>$new_image_name
    //      ,"productsphoto2"=>$new_image_name2
    //      ,"productsphoto3"=>$new_image_name3
    //      ,"productsphoto4"=>$new_image_name4
    //      ,"productscode"=>$code
    //      ,"productsname"=>$name
    //      ,"productstypecode"=>$type
    //      ,"amount"=>$amount
    //      ,"productsprice"=>$price
    //      ,"readprd"=>$typeProduct
    //      ,"status"=>$status
    //      ,"productsdetail"=>$detail
    //      ,"xs"=>$xs
    //      ,"s"=>$s
    //      ,"m"=>$m
    //      ,"l"=>$l
    //      ,"xl"=>$xl
    //      ,"xxl"=>$xxl
    // );

    updateProduct($new_image_name,$new_image_name2,$new_image_name3,$new_image_name4,$code,$name,$type,$price,$typeProduct,$detail,$amount,$id);

    // if ($conn->update("products", $value, array("productid" => $id))) {
      alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','productsList.php');
    // }else{
    //   alertMassageAndRedirect("ไม่สามารถบันทึกข้อมูลได้",'productsList.php');
    // }
  }
  else{
    $value = array(
        "productsphoto"=>$new_image_name
         ,"productsphoto2"=>$new_image_name2
         ,"productsphoto3"=>$new_image_name3
         ,"productsphoto4"=>$new_image_name4
         ,"productscode"=>$code
         ,"productsname"=>$name
         ,"productstypecode"=>$type
         ,"productsprice"=>$price
         ,"readprd"=>$typeProduct
         ,"productsdetail"=>$detail
         ,"amount"=>$amount
         // ,"xs"=>$xs
         // ,"s"=>$s
         // ,"m"=>$m
         // ,"l"=>$l
         // ,"xl"=>$xl
         // ,"xxl"=>$xxl
    );

    if($conn->create("products",$value)){
      alertMassageAndRedirect('บันทึกข้อมูลเรียบร้อยแล้ว','productsList.php');
    }else{
      alertMassageAndRedirect("ไม่สามารถบันทึกข้อมูลได้",'productsList.php');
    }
  }
// }
//
// }else{
//   alertMassage('ไม่พบรูปภาพ');
// }
