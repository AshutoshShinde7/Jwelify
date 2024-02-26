<?php

include '../config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="admin.css">
</head>

<body>
   <section class="base">
      <div class="container">
         <div class="content">
            <div class="button">
               <div class="log">
                  <a href="../login.php" class="btn">login</a>
                  <a href="../reg.php" class="btn">register</a>
                  <a href="../logout.php" class="btn">logout</a>
               </div>
               <div class="operation">
                  <a href="add.php" class="btn">Add Jwelery</a>
                  <a href="add-category.php" class="btn">Add Category</a>
                  <a href="user_data.php" class="btn">Users</a>
                  <a href="jwel.php" class="btn">Jwelery</a>
                  <a href="selld.php" class="btn">Jwelery Sells</a>
                  <a href="feedback-d.php" class="btn">Feedbacks</a>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>