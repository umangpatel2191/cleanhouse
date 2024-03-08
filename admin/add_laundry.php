<?php include 'modules/checksession.php'; ?>
<?php include '../conn.php'; ?>
<?php
function GetStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
};
if(isset($_POST["submit"])){
    $sql = "SELECT * FROM items ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($sql);
    $last_item_id;
    if ($result->num_rows > 0) {
      // output data of each row
      $row = $result->fetch_assoc();
      $last_item_id = $row["id"];
    }

    $fileuploaded = false;
    $last_item_id += 1;
    $main_file_name = $last_item_id . "_file." . GetStr($_FILES["fileToUpload"]["name"],"."," ");
    $cuted_file_name = $main_file_name;
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($main_file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
      echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "<script>alert('Sorry, your file is too large.');</script>";
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');</script>";

    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fileuploaded = true;
    } else {
        $fileuploaded = false;
    }
    }

    $name = $_POST["name"];
    $price = $_POST["price"];
    $sql = "INSERT INTO items (item_name, price_per_kg, item_img)
    VALUES ('$name', '$price', '$cuted_file_name')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Item added successfully');</script>";
    } else {
      echo "<script>alert('Error!');</script>";
    }
}

?>
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
<body style="background-image: url('blog-1.jpg');">
<div class="sidebar_cont">
    <div><?php include 'modules/sidebar.php'; ?></div>
    <div style="width:100%; min-height:100vh; padding:20px">
        <div class="table_view">
            <h2>All laundry items</h2>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Item name</th>
                <th scope="col">Price/kg</th>
                <th scope="col">Added date</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM items";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {  
                    echo '<tr>
                    <th scope="row">'.$row["id"].'</th>
                    <td>'.$row["item_name"].'</td>
                    <td>'.$row["price_per_kg"].'</td>
                    <td>'.$row["added_date"].'</td>
                    <td><a href="modules/delete_laundry.php?pid='.  $row['id'] .'">Delete</a></td>
                    </tr>';
                  }
                }
                ?>
                
            </tbody>
            </table>
        </div>
        <div class="add_data">
        <section class="h-100 h-custom" style="">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Add item</h3>

            <form class="px-md-2" method="post" action="add_laundry.php" enctype="multipart/form-data">

              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" class="form-control" name="name" required/>
                <label class="form-label" for="form3Example1q">Name</label>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="number" class="form-control" id="exampleDatepicker1" name="price" required/>
                    <label for="exampleDatepicker1" class="form-label">Price/kg</label>
                  </div>

                </div>
              </div>

              <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                <div class="col-md-6">

                  <div class="form-outline">
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                    <label class="form-label" for="form3Example1w">Image</label>
                  </div>

                </div>
              </div>

              <button type="submit" class="btn btn-success btn-lg mb-1" name="submit">Add</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
    </div>
</div>
</body>
</html>