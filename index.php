<?php
include_once("connect.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlykhachhang";


$row_kh;

$kh_text = "";
$lsp_text = "";
$sp_text ="";
$hd_text ="";
$cthd_text ="";
$conn = new mysqli($servername , $username , $password , $dbname);


function adDB(){
  global $conn;
if (isset($_POST['kh']))
{
      $id_kh = $_POST['id_kh'];$ten_kh = $_POST['ten_kh'];$phone = $_POST['phone'];$diachi = $_POST['diachi'];
      $sql = "INSERT INTO khach_hang
      VALUES ('$id_kh', '$ten_kh', '$phone', '$diachi')";

      if ($conn->query($sql) === TRUE) {

          echo "<script>Materialize.toast('Thêm thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

      }
  }else{
  }
  if(isset($_POST['lsp'])){
    $id_lsp = $_POST['id_lsp'];$ten_lsp = $_POST['ten_lsp'];
    $sql = "INSERT INTO loai_sanpham
    VALUES ('$id_lsp', '$ten_lsp')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>Materialize.toast('Thêm thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";
    }
  }

    if(isset($_POST['sp'])){
      $id_sp = $_POST['id_sp']; $id_lsp = $_POST['id_lsp']; $ten_sp = $_POST['ten_sp'];$soluong = $_POST['sl'];
      $sql = "INSERT INTO san_pham
      VALUES ('$id_sp', '$id_lsp','$ten_sp','$soluong')";
      if ($conn->query($sql) === TRUE) {
        $tf="1";
      echo "<script>Materialize.toast('Thêm thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

    if(isset($_POST['hd'])){
      $id_hd = $_POST['id_hd']; $id_kh = $_POST['id_kh']; $ntl = $_POST['ntl'];
      $sql = "INSERT INTO hoa_don
      VALUES ('$id_hd', '$id_kh','$ntl')";
      if ($conn->query($sql) === TRUE) {
        $tf="1";
      echo "<script>Materialize.toast('Thêm thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

    }
  }

  if(isset($_POST['cthd'])){
    $id_cthd = $_POST['id_cthd']; $id_hd = $_POST['id_hd']; $id_sp = $_POST['id_sp'];$slm = $_POST['slm']; $gia_ban = $_POST['gia_ban'];
    $sql = "INSERT INTO chitiet_hoadon
    VALUES ('$id_cthd', '$id_hd','$id_sp','$slm','$gia_ban')";
    if ($conn->query($sql) === TRUE) {
      $tf="1";
    echo "<script>Materialize.toast('Thêm thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

  }
}
}

function updateDB_kh($id){
  global $conn;
      $id_kh = $id;
      $ten_kh = $_POST['name'];
      $phone = $_POST['phone'];
      $diachi = $_POST['diachi'];
      $sql = "UPDATE khach_hang SET  ten_kh='$ten_kh' ,  sdt = '$phone', dia_chi = '$diachi' WHERE ma_kh = '$id_kh'";

      if ($conn->query($sql) === TRUE) {
      // select("khach_hang");
      $tf="2";
      echo "<script>Materialize.toast('Sửa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function updateDB_lsp($id){
  global $conn;
      $id_lsp = $id;
      $ten_lsp = $_POST['ten_lsp'];
      $sql = "UPDATE loai_sanpham SET  ten_lsp='$ten_lsp' WHERE ma_lsp = '$id_lsp'";

      if ($conn->query($sql) === TRUE) {
      // select("khach_hang");
      $tf="2";
      echo "<script>Materialize.toast('Sửa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";

  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}





function updateDB_sp($id){
  global $conn;
      $id_sp = $id;
      $ten_sp = $_POST['ten_sp'];
      $sl = $_POST['sl'];
      $sql = "UPDATE san_pham SET  ten_sp='$ten_sp' , so_luong = '$sl' WHERE ma_sp = '$id_sp'";

      if ($conn->query($sql) === TRUE) {
      // select("khach_hang");
      echo "<script>Materialize.toast('Sửa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";
  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateDB_hoadon($id){
  global $conn;
      $id_hd = $id;
      $ntl = $_POST['ntl'];
      $sql = "UPDATE hoa_don SET  ngay_lap = '$ntl' WHERE ma_hd = '$id_hd'";

      if ($conn->query($sql) === TRUE) {
      // select("khach_hang");
      echo "<script>Materialize.toast('Sửa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";
  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function updateDB_chitiethd($id){
  global $conn;
      $id_cthd = $id;
      $id_hd = $_POST['id_hd'];
      $id_sp = $_POST['id_sp'];
      $slm = $_POST['slm'];
      $giaban = $_POST['gia_ban'];
      $sql = "UPDATE chitiet_hoadon SET   Hoa_don_ma_hd = '$id_hd',
San_pham_ma_sp = '$id_sp', soluongmua = '$slm', gia_ban='$giaban' WHERE ma_chitiethd = '$id_cthd'";

      if ($conn->query($sql) === TRUE) {
      // select("khach_hang");
     echo "<script>Materialize.toast('Sửa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php'}, 1000);</script>";
  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function getIsset(){
  if(isset($_POST['editkh'])){
      updateDB_kh($_POST['ma_kh']);
    }
  if(isset($_POST['editlsp'])){
      updateDB_lsp($_POST['ma_lsp']);
  }
  if(isset($_POST['editsp'])){
      updateDB_sp($_POST['id_sp']);
  }
  if(isset($_POST['edithd'])){
      updateDB_hoadon($_POST['id_hd']);
  }
  if(isset($_POST['editcthd'])){
      updateDB_chitiethd($_POST['id_cthd']);
  }
}




if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}



function select($name){
  global $conn, $kh_text, $lsp_text, $sp_text, $hd_text, $cthd_text, $row_kh;
  if($name == "khach_hang"){
    $i=0;

    $sql = "SELECT * FROM $name";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      $row1=  array();
    while($row = $result->fetch_assoc()){

        $i++;
         $kh_text .= "<tr id='kh$i'><td id='mkh'>".$row["ma_kh"]."</td><td id='tkh'>".$row["ten_kh"]."</td><td id='pkh'>".$row["sdt"]."</td><td id='dkh'>".$row["dia_chi"]."</td>".
         "<td style='width:300px'><a class='waves-effect waves-light btn modal-trigger btn1'  href='#modal1'><i class='large material-icons'>mode_edit</i></a>"
         ."<a href='delete.php?id=".$row['ma_kh']."&name=1' id='kh_bt$i' class='waves-effect waves-light btn btn_a'> <i class='material-icons'>delete_forever</i></a></td></tr>";

        }

      }
    }

     if($name == "loai_sanpham"){
      $i=0;
      $sql = "SELECT * FROM $name";
      $result = $conn->query($sql);

      if($result->num_rows > 0){

      while($row = $result->fetch_assoc()){
        $i++;
        $lsp_text .= "<tr id='lsp$i'><td id='mlsp'>".$row["ma_lsp"]."</td><td id='tlsp'>".$row["ten_lsp"]."</td>"
        ."<td style='width:300px'><a class='waves-effect waves-light btn modal-trigger btn2' href='#modal2'><i class='large material-icons'>mode_edit</i></a>"
        ."<a href='delete.php?id=".$row['ma_lsp']."&name=2' class='waves-effect waves-light btn'> <i class='material-icons'>delete_forever</i></a></td></tr>";
          }
        }
      }

      if($name == "san_pham"){
       $i=0;
       $sql = "SELECT * FROM $name";
       $result = $conn->query($sql);
       if($result->num_rows > 0){

       while($row = $result->fetch_assoc()){

         $i++;
         $sp_text .="<tr id='sp$i'><td id='msp'>".$row["ma_sp"]."</td><td id='mlsp_edit'>".$row["Loai_sanpham_ma_lsp"]."</td>"
         ."<td id='tsp'>".$row["ten_sp"]."</td><td id='sl'>".$row["so_luong"]
         ."</td><td><a class='waves-effect waves-light btn modal-trigger btn3' href='#modal3'><i class='large material-icons'>mode_edit</i></a>"
         ."<a href='delete.php?id=".$row['ma_sp']."&name=3' class='waves-effect waves-light btn'> <i class='material-icons'>delete_forever</i></a></td></tr>";
$row_kh= $row;
           }

         }
       }

       if($name == "hoa_don"){
        $i=0;
        $sql = "SELECT * FROM $name";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $i++;
          $hd_text .= "<tr id='hd$i'><td id='mhd'>".$row["ma_hd"]."</td><td id='mkh_edit'>".$row["Khach_hang_ma_kh"]."</td>"
          ."<td id='ntl_edit'>".$row["ngay_lap"]."</td>"
          ."<td><a class='waves-effect waves-light btn modal-trigger btn4' href='#modal4'><i class='large material-icons'>mode_edit</i></a>"
          ."<a href='delete.php?id=".$row['ma_hd']."&name=4' class='waves-effect waves-light btn'> <i class='material-icons'>delete_forever</i></a></td></tr>";
            }
          }
        }

        if($name == "chitiet_hoadon"){
         $i=0;
         $sql = "SELECT * FROM $name";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
           $i++;
           $cthd_text .= "<tr id='cthd$i'><td id='mcthd'>".$row["ma_chitiethd"]."</td><td id='mhd'>".$row["Hoa_don_ma_hd"]."</td>"
           ."<td id='msp'>".$row["San_pham_ma_sp"]."</td><td id='slm'>".$row["soluongmua"]."</td><td id='giaban'>".$row["gia_ban"]."</td>".
           "<td><a class='waves-effect waves-light btn modal-trigger btn5' href='#modal5'><i class='large material-icons'>mode_edit</i></a>"
           ."<a href='delete.php?id=".$row['ma_chitiethd']."&name=5' class='waves-effect waves-light btn'> <i class='material-icons'>delete_forever</i></a></td></tr>";
              }
           }
         }

  }


  function select_1($name){
    global $conn, $kh_text, $lsp_text, $sp_text, $hd_text, $cthd_text, $row_kh;


        if($name == "san_pham"){
         $i=0;
         $sql = "SELECT * FROM $name";
         $result = $conn->query($sql);
         if($result->num_rows > 0){

         while($row = $result->fetch_assoc()){

           $i++;

           echo "<option value='$row[ma_sp]'>".$row['ma_sp']."</option>";
             }

           }
         }

        if($name == "loai_sanpham"){
         $i=0;
         $sql = "SELECT * FROM $name";
         $result = $conn->query($sql);
         if($result->num_rows > 0){

         while($row = $result->fetch_assoc()){

           $i++;
            echo "<option value='$row[ma_lsp]'>".$row['ma_lsp']."</option>";
             }

           }
         }

         if($name == "khach_hang"){
          $i=0;
          $sql = "SELECT * FROM $name";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            $i++;
              echo "<option value='$row[ma_kh]'>".$row['ma_kh']."</option>";
            }
          }
        }
                 if($name == "hoa_don"){
                  $i=0;
                  $sql = "SELECT * FROM $name";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    $i++;
                     echo "<option value='$row[ma_hd]'>".$row['ma_hd']."</option>";
                    }
                  }

                }
     }


select("khach_hang");

select("loai_sanpham");

select("san_pham");

select("hoa_don");

select("chitiet_hoadon");

adDB();

getIsset();


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/materialize.min.css" media="screen" title="no title" charset="utf-8">
  <script src="js/jquery-3.1.0.min.js"></script>
 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="js/materialize.min.js"></script>
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
table.highlight > tbody > tr {
  transition: background-color .25s ease;
  
}
table.highlight > tbody > tr:hover {
  background-color: hsla(124, 0%, 91%, 0.33);
  font-weight:bold;
  color:hsla(0, 0%, 0%, 0.58);
  font-size:18px;
}
.btn, .btn-large {
    text-decoration: none;
    color: #fff;
    background-color: hsla(124, 0%, 50%, 0.33);
    text-align: center;
    letter-spacing: .5px;
    transition: .2s ease-out;
    cursor: pointer;
	font-family:Time new roman;
}
.tabs{
	font-size:18px;
	background-color:hsla(0, 0%, 0%, 0);
}

thead{
	font-size : 16px;
	color: hsla(266, 87%, 100%, 0.72);
	background-color:hsla(0, 0%, 0%, 0.6);
}
tr{
	color:hsla(266, 87%, 100%, 0.72);
}
table {
    background: hsla(0, 0%, 0%, 0.32);
    width: 100%;
    display: table;
}
.row input{
	color: #9e9e9e;
}
</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light"></span>Sales Management 
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Chức năng</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Hiển thị</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="brand-heading" style="font-size:50px">QUẢN LÝ BÁN HÀNG</h3>
                        <p class="intro-text" style="font-family:Time new roman">Miễn phí, dễ sử dùng, bảo mật tốt.
                            <br>Created by Kha Nguyen.</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="width:110%; margin-left:-50px">
                <div class="col s12" style="margin-bottom: 50px;">
			   <ul class="tabs" style="background-color:black;">
				 <li class="tab col s3"><a id="a1" href="#test1">Khách hàng</a></li>
				 <li class="tab col s3"><a id="a2"  href="#test2">Loại sản phẩm</a></li>
				 <li class="tab col s3"><a id="a3"  href="#test3">Sản phẩm</a></li>
				 <li class="tab col s3"><a id="a4" href="#test4">Hóa đơn</a></li>
				 <li class="tab col s3"><a id="a5" href="#test5">Chi tiết hóa đơn</a></li>
			   </ul>
				</div>

 <!--test 1-->
 
<div id="test1" class="col s12 ">
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">assignment_ind</i>
          <input id="icon_prefix" type="text" name ="id_kh"  class="validate" required>
          <label for="icon_prefix">Id khách hàng</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_telephone" type="text" name ="ten_kh" class="validate" required>
          <label for="icon_telephone">Tên khách hàng</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input id="phone" type="number" name ="phone" class="validate" required>
          <label for="phone">Phone number</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">place</i>
          <input id="diachi" type="text" name="diachi" class="validate" required>
          <label for="diachi">Địa chỉ</label>
        </div>
      </div>
      <div align=center>
        <button class='waves-effect waves-light btn' name="kh" type="submit">Thêm</button>
        <button class='waves-effect waves-light btn' type="Reset" >Hủy</button>
      </div>

    </form>
  </div>
</div>

 <!--test 2-->
 
<div id="test2" class="col s12">
   <div class="row">
     <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       <div class="row">
         <div class="input-field col s6">
           <i class="material-icons prefix">assignment_late</i>
           <input id="icon_prefix" type="text" name ="id_lsp" class="validate" required>
           <label for="icon_prefix">Id loại sản phẩm</label>
         </div>
         <div class="input-field col s6">
           <i class="material-icons prefix">local_offer</i>
           <input id="icon_telephone" type="text" name ="ten_lsp" class="validate" required>
           <label for="icon_telephone">Tên loại sản phẩm</label>
         </div>
       </div>
       <div align=center>
         <button class='waves-effect waves-light btn' name="lsp" type="submit">Thêm</button>
         <button class='waves-effect waves-light btn' type="Reset">Hủy</button>
       </div>

     </form>
	</div>

 </div>

  <!--test 3-->
 
 <div id="test3" class="col s12">
   <div class="row">
     <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       <div class="row">
         <div class="input-field col s6">
           <i class="material-icons prefix">line_weight</i>
           <input id="icon_prefix" type="text" name ="id_sp" class="validate" required>
           <label for="icon_prefix">Id sản phẩm</label>
         </div>

         <div class="input-field col s6">
            <select name ="id_lsp" class="form-control" 	style="margin-left:100px;color:#9e9e9e;font-size:1rem; font-weight:bold; background-color:black ;margin-top:15px; width:70%">
             <option value="0" disabled selected>Chọn mã loại sản phẩm</option>
            <?
             select_1("loai_sanpham");
             ?>
           </select>
       </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <i class="material-icons prefix">style</i>
           <input id="phone" type="text" name ="ten_sp" class="validate" required>
           <label >Tên sản phẩm</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <i class="material-icons prefix">shopping_cart</i>
           <input id="diachi" type="text" name="sl" class="validate" required>
           <label for="diachi">Số lượng</label>
         </div>
       </div>
       <div align=center>
         <button class='waves-effect waves-light btn' name="sp" type="submit">Thêm</button>
         <button class='waves-effect waves-light btn' type="Reset">Hủy</button>
       </div>
     </form>
   </div>
 </div>
 
 <!-- test4 hoa don -->
 
 <div id="test4" class="col s12">
   <div class="row">
     <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       <div class="row">
         <div class="input-field col s6">
           <i class="material-icons prefix">assignment</i>
           <input id="icon_prefix" type="text" name ="id_hd" class="validate" required>
           <label for="icon_prefix">Id hóa đơn</label>
         </div>
         <div class="input-field col s6">
           <select name ="id_lsp" class="form-control" 	style="margin-left:100px;color:#9e9e9e;font-size:1rem; font-weight:bold; background-color:black ;margin-top:15px; width:70%">
             <option value="0" disabled selected>Chọn mã khách hàng</option>
            <?
             select_1("khach_hang");
             ?>
           </select>
       </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <i class="material-icons prefix">date_range</i>
           <input id="datetl" type="date" name ="ntl" class="datepicker" required>
          <label >Ngày thành lập</label>
         </div>
       </div>
       <div align=center>
         <button class='waves-effect waves-light btn' name="hd" type="submit">Thêm</button>
         <button class='waves-effect waves-light btn' type="Reset">Hủy</button>
       </div>
     </form>
   </div>
 </div>

<!-- test5 chi tiet hoa don -->

 <div id="test5" class="col s12">

   <div class="row">
     <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       <div class="row">
         <div class="input-field col s6">
           <i class="material-icons prefix">receipt</i>
           <input type="text" name ="id_cthd" class="validate" required>
           <label for="icon_prefix">Id chi tiết hóa đơn</label>
         </div>
         <div class="input-field col s6">
           <select name ="id_hd" class="form-control" 	style="margin-left:100px;color:#9e9e9e;font-size:1rem; font-weight:bold; background-color:black ;margin-top:15px; width:70%">
             <option value="0" disabled selected>Chọn mã hóa đơn</option>
            <?
             select_1("hoa_don");
             ?>
           </select>
         </div>

       </div>

       <div class="row">
         <div class="input-field col s6">
           <select name ="id_sp" class="form-control" 	style="margin-left:45px;color:#9e9e9e;font-size:1rem; font-weight:bold; background-color:black ;margin-top:15px; width:80%">
             <option value="0" disabled selected>Chọn mã sản phẩm</option>
            <?
             select_1("san_pham");
             ?>
           </select>
         </div>
         <div class="input-field col s6">
           <i class="material-icons prefix">add_shopping_cart</i>
           <input type="number" name="slm" class="validate" required>
           <label for="slm">Số lượng mua</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s12">
           <i class="material-icons prefix">monetization_on</i>
           <input type="text" name="gia_ban" class="validate" required>
           <label for="diachi">Giá bán</label>
         </div>
       </div>
       <div align=center>
         <button class='waves-effect waves-light btn' name="cthd" type="submit">Thêm</button>
         <button class='waves-effect waves-light btn' type="Reset">Hủy</button>
       </div>

     </form>
   </div>

 </div>

 
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2" style="width:110%; margin-left:-50px">
                    <div class="col s12" style="margin-bottom: 50px;">
					   <ul class="tabs" >
						 <li class="tab col s3"><a id="a11" href="#test11">Khách hàng</a></li>
						 <li class="tab col s3"><a id="a22"  href="#test22">Loại sản phẩm</a></li>
						 <li class="tab col s3"><a id="a33"  href="#test33">Sản phẩm</a></li>
						 <li class="tab col s3"><a id="a44" href="#test44">Hóa đơn</a></li>
						 <li class="tab col s3"><a id="a55" href="#test55">Chi tiết hóa đơn</a></li>
					   </ul>
				   </div>
                </div>
				
				<!-- Table Kh -->
				
				<div id="test11" class="col s12 ">
				<div class="row">
				<table class="highlight centered">
				<thead>
				  <tr>

					<th data-field="id">Id khách hàng</th>
					<th data-field="name">Tên khách hàng</th>
					<th data-field="price">Số điện thoại</th>
					<th data-field="price">Địa chỉ</th>
					<th data-field="edit">Tùy chọn</th>
				  </tr>
				</thead>
					<tbody id="bd1">

					</tbody>
				</table>
				</div>
				</div>
				
				<!-- Table lsp -->
				
				<div id="test22" class="col s12 ">
				<div class="row">
				<table class="highlight centered">
				 <thead>
				   <tr>
					 <th data-field="id">Mã loại sản phẩm</th>
					 <th data-field="name">Tên loại sản phẩm</th>
					   <th data-field="edit">Tùy chọn</th>
				   </tr>
				 </thead>
				 <tbody id="bd2">

				 </tbody>
			    </table>
				</div>
				</div>
				
				<!-- Table sp -->
				
				<div id="test33" class="col s12 ">
				<div class="row">
				<table class="highlight centered">
					 <thead>
					   <tr>
						 <th data-field="id">Id sản phẩm</th>
						 <th data-field="price">Id loại sản phẩm</th>
						 <th data-field="name">Tên sản phẩm</th>
						 <th data-field="price">Số lượng</th>
						 <th data-field="edit">Tùy chọn</th>
					   </tr>
					 </thead>
					 <tbody id="bd3">

					 </tbody>
				</table>
				</div>
				</div>
				
				<!-- Table hd -->
				
				<div id="test44" class="col s12 ">
				<div class="row">
				 <table class="highlight centered">
					 <thead>
					   <tr>
						 <th data-field="id">Id hóa đơn</th>
						 <th data-field="price">Id khách hàng</th>
						 <th data-field="name">Ngày lập hóa đơn</th>
						 <th data-field="edit">Tùy chọn</th>
					   </tr>
					 </thead>
					 <tbody id="bd4">

					 </tbody>
				</table>
				</div>
				</div>
				
				<!-- Table cthd -->
				
				<div id="test55" class="col s12 ">
				<div class="row">
				<table class="highlight centered">
				 <thead>
				   <tr>
					 <th data-field="id">Id chi tiết hóa đơn</th>
					 <th data-field="name">Mã hóa đơn</th>
					 <th data-field="price">Mã sản phẩm</th>
					 <th data-field="price">Số lượng mua</th>
					 <th data-field="price">Giá bán</th>
					   <th data-field="edit">Tùy chọn</th>
				   </tr>
				 </thead>
				 <tbody id="bd5">

				 </tbody>
				</table>
				</div>
				</div>
            </div>
        </div>
		
		
		
		
		
		 <!-- kh modal  -->
<div id='modal1' class='modal'>
  <div class='modal-content'>
  <div class='row'>
    <form class='col s12' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="mkh1"  readOnly="true" name ="ma_kh" class="validate" required>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="tkh1" type="text" name ="name" class="validate" required>
        </div>
      </div>
        <div class='input-field col s12'>
          <i class='material-icons prefix'>phone</i>
          <input id='pkh1' type='number' name ='phone' class='validate' required>
        </div>

        <div class='input-field col s12'>
          <i class='material-icons prefix'>place</i>
          <input id='dkh1' type='text' name='diachi' class='validate' required></div>
          <div align=center>
            <button class='waves-effect waves-light btn' style="background-color: #26a69a;" name='editkh' type='submit'>Sửa</button>
            <button class='waves-effect waves-light btn' style="background-color: #26a69a;" type="Reset">Hủy</button>
          </div>
    </form>
  </div>
</div>
</div>

 <!-- lsp modal  -->

<div id='modal2' class='modal'>
  <div class='modal-content'>
  <div class='row'>
    <form class='col s12' action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="mlsp1"  readOnly="true" name ="ma_lsp" class="validate">
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="tlsp1" type="text" name ="ten_lsp" class="validate">
        </div>
      </div>
          <div align=center>
            <button class='waves-effect waves-light btn' style="background-color: #26a69a;" name='editlsp' type='submit'>Sửa</button>
            <button class='waves-effect waves-light btn' style="background-color: #26a69a;" type="Reset">Hủy</button>
          </div>
    </form>
  </div>
</div>
</div>

<!-- sp modal  -->

<div id='modal3' class='modal'>
  <div class='modal-content'>
    <div class="row">
      <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">line_weight</i>
            <input id="msp1" type="text" name ="id_sp" readOnly = "true" class="validate">
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">assignment_late</i>
            <input id="mlsp1_edit" readonly="true" type="text" name ="id_lsp" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">style</i>
            <input id="tsp1" type="text" name ="ten_sp" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">add_shopping_cart</i>
            <input id="sl1" type="text" name="sl" class="validate">
          </div>
        </div>
        <div align=center>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" name="editsp" type="submit">Thêm</button>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" type="Reset">Hủy</button>
        </div>
      </form>
    </div>
 </div>
</div>

<!-- hd modal  -->

<div id='modal4' class='modal'>
  <div class='modal-content'>
    <div class="row">
      <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">assignment</i>
            <input id="mhd1" readonly="true" type="text" name ="id_hd" class="validate">
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">assignment_ind</i>
            <input id="mkh1_hd" readonly="true" type="text" name ="id_kh" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">date_range</i>
            <input id="ntl1" type="date" name ="ntl" class="datepicker">
          </div>
        </div>
        <div align=center>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" name="edithd" type="submit">Sửa</button>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" type="Reset">Hủy</button>
        </div>
      </form>
    </div>
 </div>
</div>

<!-- cthd modal  -->

<div id='modal5' class='modal'>
  <div class='modal-content'>
    <div class="row">
      <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">receipt</i>
            <input id="mcthd1" type="text" name ="id_cthd" readonly="true" class="validate">
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">assignment</i>
            <input id="mhd_edit" type="text" name ="id_hd" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">line_weight</i>
            <input id="msp_edit" type="text" name ="id_sp" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">add_shopping_cart</i>
            <input id="slm1" type="number" name="slm" class="validate">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">monetization_on</i>
            <input id="giaban1" type="text" name="gia_ban" class="validate">
          </div>
        </div>
        <div align=center>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" name="editcthd" type="submit">Sửa</button>
          <button class='waves-effect waves-light btn' style="background-color: #26a69a;" >Hủy</button>
        </div>

      </form>
    </div>
 </div>
</div>
    </section>

   

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Salesmanagement.16mb.com</p>
        </div>
    </footer>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>
<script>
  function load() {
    var kh_text = "<?echo $kh_text?>";
    var lsp_text= "<?echo $lsp_text?>";
    var sp_text = "<?echo $sp_text?>";
    var hd_text = "<?echo $hd_text?>";
    var cthd_text = "<?echo $cthd_text?>";

    function addBody(bd_Id, text){
          var bd= document.getElementById(bd_Id);
                  bd.innerHTML = text;
      }

    //table kh.

      function sub_text_kh(id,ten,sdt,dc) {
         $('#mkh1').val(id);
         $('#tkh1').val(ten);
         $('#pkh1').val(sdt);
         $('#dkh1').val(dc);
      }

      addBody("bd1",kh_text);

      $(".btn1").click(function() {
            var text1 = $(this).parents("tr").find('#mkh').text();
            var text2 = $(this).parents("tr").find('#tkh').text();
            var text3 = $(this).parents("tr").find('#pkh').text();
            var text4 = $(this).parents("tr").find('#dkh').text();
            sub_text_kh(text1,text2,text3,text4);
      });


      //table lsp.

      function sub_text_lsp(id,ten) {
         $('#mlsp1').val(id);
         $('#tlsp1').val(ten);
      }
      addBody("bd2",lsp_text);

      $(".btn2").click(function() {
            var text1 = $(this).parents("tr").find('#mlsp').text();
            var text2 = $(this).parents("tr").find('#tlsp').text();
            sub_text_lsp(text1,text2);
      });


      // table sp.

      function sub_text_sp(id,idlsp,tsp,sl) {
         $('#msp1').val(id);
         $('#mlsp1_edit').val(idlsp);
         $('#tsp1').val(tsp);
         $('#sl1').val(sl);
      }

      addBody("bd3",sp_text);

      $(".btn3").click(function() {
            var text1 = $(this).parents("tr").find('#msp').text();
            var text2 = $(this).parents("tr").find('#mlsp_edit').text();
            var text3 = $(this).parents("tr").find('#tsp').text();
            var text4 = $(this).parents("tr").find('#sl').text();
            sub_text_sp(text1,text2,text3,text4);
      });


      // //table hd.

      function sub_text_hd(id,idkh,ntl) {
         $('#mhd1').val(id);
         $('#mkh1_hd').val(idkh);
         $('#ntl1').val(ntl);
      }


      addBody("bd4",hd_text);

      $(".btn4").click(function() {
            var text1 = $(this).parents("tr").find('#mhd').text();
            var text2 = $(this).parents("tr").find('#mkh_edit').text();
            var text3 = $(this).parents("tr").find('#ntl_edit').text();
            sub_text_hd(text1,text2,text3);
      });


      //table cthd.

      function sub_text_cthd(id,mhd,msp,slm,gb) {
         $('#mcthd1').val(id);
         $('#mhd_edit').val(mhd);
         $('#msp_edit').val(msp);
         $('#slm1').val(slm);
         $('#giaban1').val(gb);
      }

      addBody("bd5",cthd_text);

      $(".btn5").click(function() {
            var text1 = $(this).parents("tr").find('#mcthd').text();
            var text2 = $(this).parents("tr").find('#mhd').text();
            var text3 = $(this).parents("tr").find('#msp').text();
            var text4 = $(this).parents("tr").find('#slm').text();
            var text5 = $(this).parents("tr").find('#giaban').text();
            sub_text_cthd(text1,text2,text3,text4,text5);
      });


  $('.modal-trigger').leanModal();
  $('.datepicker').pickadate({

  });
  $('btn_a').click(function(){

  });
  }

load();

</script>

</body>

</html>
