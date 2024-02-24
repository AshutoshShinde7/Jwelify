<?php
session_start();
include('config.php');
if (isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']);
}
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jwelify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <div class="title"><span>Jwelify</span></div>
            <div class="service">
                <ul class="nav">
                    <li><a href="index.php#home" class="active">Home</a></li>
                    <li><a href="index.php#card">All Jwelery</a></li>
                    <li><a href="#foot">About</a></li>
                </ul>
            </div>
            <div class="button">
                <a href="logout.php" class="btn" id="logout-btn--">Logout</a>
            </div>
        </nav>
    </header>
    <!-- <section id="home" class="home">
        <div class="main-text">
            <h1>Welcome to Jwelify</h1>
            <p>Jewels That Speak Louder Than Words.</p>
            <p>Where Elegance Meets Brilliance.</p>
        </div>
    </section> -->
    <section class="card" id="card">
        <?php
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $sql = "SELECT * FROM category WHERE ID = '$id'";

            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            $category = $data['CName'];
            $desc = $data['Description'];


        } else {
            echo "No Category found!!!";
        }
        ?>
        <div class="heading">
            <span>What we Offer</span>
            <h2><?php echo $category; ?></h2>
            <p><?php echo $desc; ?></p>
        </div>
        <div class="card-container container">
            <?php
            $sqlSelect = "SELECT * FROM product WHERE Category = '$category'";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="box">
                    <?php echo "<img class='box-img' src='image/" . basename($data['PImage']) . "' alt='Jwelery Image'><br>" ?>
                    <h3>
                        <?php echo $data['PName']; ?>
                    </h3>
                    <span>₹
                        <?php echo $data['PPrice']; ?>
                    </span>
                    <form action="order.php?id=<?php echo $data['ID']; ?>" method="post">
                        <div class="q" hidden>
                            <label class="lab">Qantity : </label>
                            <input type="number" id="Input" name="quantity" value="1">
                        </div>
                        <button type="submit" id="card" class="btn">Buy Now</button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section id="foot" class="footer">
        <div class="footer-container container">
            <div class="footer-box">
                <a href="#" class="logo"><span>Jwelify</span></a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i>
                        <a href="#"><i class='bx bxl-twitter'></i>
                            <a href="#"><i class='bx bxl-instagram'></i>
                                <a href="#"><i class='bx bxl-youtube'></i>
                </div>
            </div>
            <div class="footer-box">
                <h3>Pages</h3>
                <a href="#home">Home</a>
                <a href="#card">Jwelery</a>
                <a href="#foot">About</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <p>India</p>
                <p>India</p>
                <a href="feedback.php">Submit Your Feedback</a>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>&#169; All Rights Reserved to Jwelify</p>
    </div>
</body>

</html>