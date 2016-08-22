<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/jquery-3.1.0.min.js"></script>
</head>

<body>
    <script type="text/javascript">

          function alert1() {
            alert("hello");
          }
    </script>
</body>

</html>

<?

  include_once("demo.php");
  $cf = false;
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     if($_GET['name']==1){
       deleteDb("khach_hang","ma_kh",$_REQUEST["id"]);
      }
      if($_GET['name']==2){
        deleteDb("loai_sanpham","ma_lsp",$_REQUEST["id"]);
      }
      if($_GET['name']==3){
      deleteDb("san_pham","ma_sp",$_REQUEST["id"]);
      }
      if($_GET['name']==4){
      deleteDb("hoa_don","ma_hd",$_REQUEST["id"]);
      }
      if($_GET['name']==5){
      deleteDb("chitiet_hoadon","ma_chitiethd",$_REQUEST["id"]);
      }
  }else{
    echo "no";
}


?>
