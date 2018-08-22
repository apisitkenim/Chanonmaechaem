  <?php

define('DB_HOST','localhost');
define('DB_NAME','db_chanon');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('ROOTPATH',curRootPath('admin'));

//host
// define('DB_USERNAME','saaaaa');
// define('DB_PASSWORD','12345678');

// Create connection
require_once('MySQLDBConn.class.php');
$conn = new MySQLDBConn(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

function getDbConnection() {
    return new MySQLDBConn(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
}

function curRootPath($localhost_path,$server_name='localhost')
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) if($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    //$server_name = $_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $server_name.":".$_SERVER["SERVER_PORT"].'/'.$localhost_path;
    }
    else if($_SERVER["SERVER_PORT"] == "80" && ($server_name == 'localhost' || $server_name == '127.0.0.1')){
        $pageURL .= $server_name.'/'.$localhost_path;
    }
    else
    {
        $pageURL .= $server_name;
    }
    return $pageURL;
}
// echo "<script> alert('Please check username and password'); history.back(); </script>";

// echo "Connected successfully";
function getIsset($post_value){
    $value="";
    if(isset($_GET[$post_value])){
        $value = $_GET[$post_value];
    }
    if(isset($_POST[$post_value])){
        $value = $_POST[$post_value];
    }
    return $value;
}

function redirectTo($url){
  header('location: '.$url);
  exit(0);
}

function alertMassage($str){
    echo "<script>alert('".$str."');</script>";
}

function alertMassageAndRedirect($str,$url){
  	echo "<script> alert('".$str."'); location.href='".$url."'; </script>";
}

function confirmMassage($str){
    echo "<script>confirm('".$str."');</script>";
}

function generate_action_tag($type,$message){
    $tag = '';
    if('success' == $type){
        $tag = '<div class="alert alert-success alert-dismissible">
                        <h4><i class="icon fa fa-check"></i>'.$message.'</h4>
                    </div>';
    }
    if('error' == $type){
        $tag = '<div class="alert alert-danger alert-dismissible">
                        <h4><i class="icon fa fa-ban"></i>'.$message.'</h4>
                    </div>';
    }
    return $tag;
}

function inserOrderDetail($orderid,$productid,$qty,$price,$total,$size) {
    $conn = getDbConnection()->getConnection();
    $sql = "INSERT INTO orderdetails (orderid,productid,qty,price,total,size) VALUES ('$orderid','$productid','$qty','$price','$total','$size')";
    $conn->query($sql);
}


function updateStock($productid,$qty) {

  $conn = getDbConnection()->getConnection();
  $sql = "UPDATE products SET amount = '$qty' WHERE productid = $productid";
  $conn->query($sql);
}

function updateProduct($new_image_name,$new_image_name2,$new_image_name3,$new_image_name4,$code,$name,$type,$price,$typeProduct,$detail,$amount,$id) {
  $conn = getDbConnection()->getConnection();

if ($id != ""){
  $sql = "UPDATE products SET productscode = '$code' , productsname = '$name', productstypecode = '$type',   productsprice = '$price',readprd = '$typeProduct',productsdetail = '$detail',  amount = '$amount' ";
  }

  if ($new_image_name != "" ){
      $sql .=  ",productsphoto = '$new_image_name'";
  }

  if ($new_image_name2 != "" ){
  $sql .=  ",productsphoto2 = '$new_image_name2'";
  }

  if ($new_image_name3 != "" ){
    $sql .= ",productsphoto3 = '$new_image_name3'";
  }

  if ($new_image_name4 != "" ){
    $sql .=  ",productsphoto4 = '$new_image_name4'";
  }

  $sql .= " WHERE productid = $id";

   $conn->query($sql);
}

function updateStatusOrder($orderid,$status) {

  $conn = getDbConnection()->getConnection();
  $sql = "UPDATE orders SET statusnow = '$status' WHERE refid = $orderid";
  $conn->query($sql);
}

function updateStatusConfirm($orderid) {

  $conn = getDbConnection()->getConnection();
  $sql = "UPDATE orders SET statusnow = 'รอจัดส่งสินค้า' , paystatus = 'ชำระเงินแล้ว' WHERE orderid = $orderid";
  $conn->query($sql);
}

function updateStatusConfirmTransport($orderid,$transport) {

  $conn = getDbConnection()->getConnection();
  $sql = "UPDATE orders SET statusnow = 'จัดส่งสินค้าเรียบร้อยแล้ว' , sent_rate = '$transport' WHERE orderid = $orderid";
  $conn->query($sql);
}

function convertDateThaiFormatToUtc($var) {

    $time = date("H:i:s",strtotime($var));
    $H = date("H",strtotime($var));
    $SH = $H + 7;
    $DateTime = date('Y-m-d', strtotime($var))." ".$SH.":".date("i:s",strtotime($var));
    return $DateTime;
}

?>
