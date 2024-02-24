<link rel="stylesheet" href="admin.css">
<style>
   h2 {
      /* text-align: center; */
      color: #333;
   }

   table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
   }

   table,
   th,
   td {
      border: 1px solid #ddd;
   }

   th,
   td {
      padding: 10px;
      text-align: left;
   }

   th {
      background-color: #b76e79;
      color: white;
   }

   section div {
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
   }

   section div a {
      background: var(--main-color);
      color: var(--bg-color);
      text-transform: capitalize;
      font-size: 20px;
      cursor: pointer;
      padding: 10px;
      border-radius: 10px;
   }

   section div a:hover {
      background: #f1b545;
      color: #fff;
   }
</style>
<section>

   <div>
      <h2>User Details</h2>
      <a href="admin.php" class="btn">Back</a>
   </div>
   <?php
   include '../config.php';
   if (mysqli_connect_errno()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
   }
   $query = "SELECT * FROM users WHERE role = 'user'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['Email']}</td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   } 
   ?>
   <div>
      <h2>Admin Details</h2>
      <!-- <a href="admin.php" class="form-btn">Back</a> -->
   </div>
   <?php
   $query = "SELECT * FROM users WHERE role = 'admin'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['Email']}</td>
        </tr>";
      }
      echo "</table>";
   } else {
      echo "No records found";
   }
   ?>
</section>