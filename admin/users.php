<?php include '../conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <style>
        @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
    </style>
</head>
<body>
<div class="sidebar_cont">
    <div><?php include 'modules/sidebar.php'; ?></div>
    <div style="width:100%; min-height:100vh; padding:20px">
        <div class="table_view">
            <h2>Users</h2>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
                <th scope="col">phone_no</th>
                <th scope="col">address</th>
                <th scope="col">pincode</th>
                <th scope="col">reg_time</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {  
                    echo '<tr>
                    <th scope="row">'.$row["id"].'</th>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["username"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["phone_no"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["pincode"].'</td>
                    <td>'.$row["reg_time"].'</td>

                    
                    </tr>';
                  }
                }
                ?>
                
            </tbody>
            </table>
        </div>
        </div>
        </div> </div>
            </body>
            </html>