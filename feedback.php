<?php

session_start();

include 'config.php';

if (isset($_POST['submit'])) {

    $fname = $_POST['f-name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $feedback = $_POST['feedback'];
    if (empty($fname) || empty($email) || empty($contact) || empty($feedback)) {
        die("Error: All fields are required.");
    } else {
        $insert = "INSERT INTO `feedback` (`Full Name`, `Email`, `Contact`, `Feedback`) VALUES ('$fname', '$email', '$contact', '$feedback')";
        mysqli_query($conn, $insert);
        header('location: index.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Booking Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="admin/admin.css">
    <style>
        body {
            background-image: url(bg/bg1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form method="post">
            <h2>Give Your Feedback</h2>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <label for="f-name">Full Name : </label>
            <input type="text" name="f-name" placeholder="Enter Your Full Name">
            <label for="email">Email : </label>
            <input type="email" name="email" placeholder="Enter Your Email">
            <label for="contact">Contact : </label>
            <input type="number" name="contact" placeholder="Enter Your Contact No.">
            <label for="feedback">Feedback : </label>
            <textarea type="text" name="feedback" rows="5" class="text-box" placeholder="Enter Your Feedback About Our Website"></textarea><br>
            
            <input type="submit" name="submit" value="Submit" class="form-btn">
    </div>
</body>

</html>