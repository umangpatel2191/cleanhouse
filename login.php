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
    <section class="" style="background-color: #194376 !important; height:100vh">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="https://images.unsplash.com/photo-1657064575960-efefbe831c2e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1331&q=80"
                      alt="Sample photo" class="img-fluid"
                      style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; width: 100%;
                      height: 100%;
                      object-fit: contain;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase">Log in</h3>
                    <form action="" method="post" id="login_form">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example97">Username or email</label>
                        <input type="text" id="form3Example97" class="form-control form-control-lg"  name="email" required/>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="phonenumber">Password</label>
                        <input type="password" id="phonenumber" class="form-control form-control-lg"  name="password" required />
                      </div>
                      <div class="alert alert-danger d-none" role="alert" id="loginFailed">Invalid username/email or password.</div>
                       <a href="sign-up.php">Sign-Up</a> 
                      <div class="d-flex justify-content-end pt-3">
                        <button type="submit" class="mybtn mybtn-warning mybtn-lg ms-2 mybtn-primary p-3">Login</button>
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
<script src="js/login.js"></script>
</html>
