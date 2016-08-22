<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <script src="js/jquery-3.1.0.min.js"></script>
</head>

<body>
    <script type="text/javascript">
        function myFunction() {
            var cf = false;
            var r = confirm("Bạn có chắc chắn xóa không?");
            if (r == true) {
                cf = true;
            } else {
                cf = false;
            }
            return cf;
          }
    </script>
</body>


</html>
