<?

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
function select1($name){
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
  select1("khach_hang");

  select1("loai_sanpham");

  select1("san_pham");

  select1("hoa_don");

  select1("chitiet_hoadon");

?>
