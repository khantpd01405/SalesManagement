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
        $tf="1";
        header("Location:index.php?signal=".$tf);
      }else{
        header("Location:index.php");
      }
  }else{
  }
  if(isset($_POST['lsp'])){
    $id_lsp = $_POST['id_lsp'];$ten_lsp = $_POST['ten_lsp'];
    $sql = "INSERT INTO loai_sanpham
    VALUES ('$id_lsp', '$ten_lsp')";
    if ($conn->query($sql) === TRUE) {
      $tf="1";
    header("Location:index.php?signal=".$tf);
    }
  }

    if(isset($_POST['sp'])){
      $id_sp = $_POST['id_sp']; $id_lsp = $_POST['id_lsp']; $ten_sp = $_POST['ten_sp'];$soluong = $_POST['sl'];
      $sql = "INSERT INTO san_pham
      VALUES ('$id_sp', '$id_lsp','$ten_sp','$soluong')";
      if ($conn->query($sql) === TRUE) {
        $tf="1";
      header("Location:index.php?signal=".$tf);
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
      header("Location:index.php?signal=".$tf);
    }
  }

  if(isset($_POST['cthd'])){
    $id_cthd = $_POST['id_cthd']; $id_hd = $_POST['id_hd']; $id_sp = $_POST['id_sp'];$slm = $_POST['slm']; $gia_ban = $_POST['gia_ban'];
    $sql = "INSERT INTO chitiet_hoadon
    VALUES ('$id_cthd', '$id_hd','$id_sp','$slm','$gia_ban')";
    if ($conn->query($sql) === TRUE) {
      $tf="1";
    header("Location:index.php?signal=".$tf);
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
      header("Location:index.php?signal=".$tf);
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
      header("Location:index.php?signal=".$tf);
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
      header("Location:index.php");
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
      header("Location:index.php");
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
      header("Location:index.php");
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

function deleteDb($name,$name_tb_id,$m){

    global $conn;
    $sql = "DELETE FROM $name WHERE $name_tb_id='$m'";
    if($result = $conn->query($sql) === TRUE){
          echo "<script> Materialize.toast('Xóa thành công!', 600); setTimeout(function(){location.href='http://localhost/startbootstrap-grayscale-gh-pages/index.php';}, 1000);</script>";

    }else{
      echo "Error deleting record: " . $conn->error;
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
