<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="./ckeditor/ckeditor.js"></script>
   <link type="text/css" rel="stylesheet" href="./Style/style.css">
   <title>Shop GAVANI</title>
</head>
<body>
   <div class="top">
      <?php
         include'./Element/top.php';
      ?>
   </div>
   <div class="row_nowrap">
      <div class="left">
         <?php
            include'./Element/left.php';
         ?>
      </div>
      <div class="body">
         <?php
            include'./Element/body.php';
         ?>
      </div>
   </div>
   <script>
        CKEDITOR.replace('content');
    </script>
   <script src="../Js/jquery-3.7.1.js"></script>
   <script src="../Js/jquery.js"></script>
   <script src="../Js/jscript.js"></script>
</body>
</html>