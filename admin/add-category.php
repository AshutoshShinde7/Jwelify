<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light mt-5 rounded">
                    <h2 class="text-center p-2">Add Category</h2>
                    <?php
                        include '../config.php';
                        $msg = "";
                        if(isset($_POST['submit'])){
                            $cName = $_POST['name'];
                            $cdesc = $_POST['desc'];

                            $target_dir = '../image/';
                            $target_file = $target_dir . basename($_FILES["cImage"]["name"]);
                            move_uploaded_file( $_FILES["cImage"]["tmp_name"], $target_file );
                            // $pImage = $_POST['pImage'];
                            $sql = "INSERT INTO category (Image, CName, Description) VALUES ('$target_file', '$cName','$cdesc')";

                            if(mysqli_query($conn, $sql)){
                                $msg = "Category Added Successfully";
                            }else{
                                $msg = "Failed to Add Category";
                            }
                        }
                    ?>
                    <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="desc" class="form-control" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="cImage" class="custom-file-input" id="customFile" required>
                                <label for="customFile" class="custom-file-label">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
                        </div>
                        <div class="form-group">
                            <h4 class="text-center"><?= $msg; ?></h4>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 p-4 mt-3 bg-light rounded">
                    <a href="admin.php" class="btn btn-warning btn-block btn-lg">Go to main page</a>
                </div>
            </div>
    </section>

</body>

</html>