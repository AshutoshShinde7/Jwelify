<link rel="stylesheet" href="admin.css">
<style>
    .head {
        padding-top: 20px;
        text-align: center;
    }

    table tr td .box-img {
        max-width: 300px;
    }
</style>

<body style="background: #f3e5ab;">

    <section>
        <?php
        include '../config.php';
        ?>
        <div class="con">
            <header class="head">
                <h1>Jwelery List</h1>
                <!-- <a href="#add_part" class="form-btn mb-4">Add New Part</a> -->
            </header>
            <?php
            if (isset($_SESSION["add"])) {
                ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["add"];
                    ?>
                </div>
                <?php
                unset($_SESSION["add"]);
            }
            ?>
            <?php
            if (isset($_SESSION["update"])) {
                ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["update"];
                    ?>
                </div>
                <?php
                unset($_SESSION["update"]);
            }
            ?>
            <?php
            if (isset($_SESSION["delete"])) {
                ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["delete"];
                    ?>
                </div>
                <?php
                unset($_SESSION["delete"]);
            }
            ?>

            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Part Name</th>
                    <th>Part Price</th>
                    <!-- <th>Part Quantity</th> -->
                    <th>Part Image</th>
                    <th>Buttons</th>
                </tr>
                <?php
                $sqlSelect = "SELECT * FROM product";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $data['ID']; ?>
                        </td>
                        <td>
                            <?php echo $data['PName']; ?>
                        </td>
                        <td>
                            <?php echo $data['PPrice']; ?>
                        </td>
                        <!-- <td>
                  <?php echo $data['PQuantity']; ?> 
               </td> -->
                        <td>
                            <?php echo "<img class='box-img' src='../image/" . basename($data['PImage']) . "' alt='Jwelery Image'><br>" ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['ID']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $data['ID']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </section>
</body>