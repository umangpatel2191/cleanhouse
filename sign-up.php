<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
.mymybtn {
  display: inline-block;
  font-weight: 400;
  color: #757575;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .mybtn {
    transition: none;
  }
}

.mybtn:hover {
  color: #757575;
  text-decoration: none;
}

.mybtn:focus, .mybtn.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(25, 67, 118, 0.25);
}

.mybtn.disabled, .mybtn:disabled {
  opacity: 0.65;
}

.mybtn:not(:disabled):not(.disabled) {
  cursor: pointer;
}

a.mybtn.disabled,
fieldset:disabled a.mybtn {
  pointer-events: none;
}

.mybtn-primary {
  color: #fff;
  background-color: #194376;
  border-color: #194376;
}

.mybtn-primary:hover {
  color: #fff;
  background-color: #123156;
  border-color: #102b4c;
}

.mybtn-primary:focus, .mybtn-primary.focus {
  color: #fff;
  background-color: #123156;
  border-color: #102b4c;
  box-shadow: 0 0 0 0.2rem rgba(60, 95, 139, 0.5);
}

.mybtn-primary.disabled, .mybtn-primary:disabled {
  color: #fff;
  background-color: #194376;
  border-color: #194376;
}

.mybtn-primary:not(:disabled):not(.disabled):active, .mybtn-primary:not(:disabled):not(.disabled).active,
.show > .mybtn-primary.dropdown-toggle {
  color: #fff;
  background-color: #102b4c;
  border-color: #0e2541;
}

.mybtn-primary:not(:disabled):not(.disabled):active:focus, .mybtn-primary:not(:disabled):not(.disabled).active:focus,
.show > .mybtn-primary.dropdown-toggle:focus {
  box-shadow: 0 0 0 0.2rem rgba(60, 95, 139, 0.5);
}
    </style>
</head>

<body>
    <section class="h-100" style="background-color: #194376 !important;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="https://images.unsplash.com/photo-1574538298279-26973f60efa3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; width: 100%;
                      height: 100%;
                      object-fit: contain;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase">Sign up</h3>
                    <form action="" method="post" id="reg_form">
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1m">Full name</label>
                            <input type="text" id="form3Example1m" class="form-control form-control-lg"  name="name" required/>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1n">Username</label>
                            <input type="text" id="username" class="form-control form-control-lg" name="username" required minlength="4"/>
                          </div>
                        </div>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example97">Email ID</label>
                        <input type="email" id="form3Example97" class="form-control form-control-lg"  name="email" required/>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="phonenumber">Phone number</label>
                        <input type="text" id="phonenumber" class="form-control form-control-lg"  name="phone-number" required minlength="10" maxlength="10"/>
                      </div>
      
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1m1">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" name="password" required/>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1n1">Confirm password</label>
                            <input type="password" id="confirmPassword" class="form-control form-control-lg" name="confirmPassword" required/>
                          </div>
                        </div>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8">Address</label>
                        <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" required/>
                      </div>
      
                      <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="pincode">Pincode</label>
                            <select name="pincode" id="pincode" class="form-control select select-form" name="area" required>
                            <?php
                            $sql = "SELECT * FROM areas ORDER BY pincode ASC;";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row["pincode"].'">'.$row["pincode"].'</option>';
                              }
                            }
                            ?>
                            </select>
                        </div>
                      </div>   
                      <div class="alert alert-danger d-none" role="alert" id="usernameAlert">Username only contains alphabets, number and underscore. and starts with alphabet.</div>
                      <div class="alert alert-danger d-none" role="alert" id="passwordAlert">Password not match</div>
                      <div class="alert alert-danger d-none" role="alert" id="phoneExist">Phone number already exists.</div>
                      <div class="alert alert-danger d-none" role="alert" id="usernameExist">Username already exists.</div>
                      <div class="alert alert-danger d-none" role="alert" id="emailExist">Email already exists.</div>
      
                      <div class="d-flex justify-content-end pt-3">
                        <button type="submit" class="mybtn mybtn-warning mybtn-lg ms-2 mybtn-primary p-3">Submit form</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
<script src="js/sign-up.js"></script>
</html>
