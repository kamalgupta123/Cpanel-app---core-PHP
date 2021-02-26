<?php
    session_start();
    include("config.php");
    $sql = "SELECT * FROM user WHERE id=".$_SESSION['user_id'];
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $sql1 = "SELECT * FROM cpanel WHERE user_id=".$_SESSION['user_id']." LIMIT 1";
    $result1 = mysqli_query($db,$sql1);
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $sql2 = "SELECT * FROM adminpanel WHERE user_id=".$_SESSION['user_id']." LIMIT 1";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/user_profile.css">
</head>
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="row">
          <div class="col-lg-12"><a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">User profile</a></div>
        </div>
        
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
          </div>
        </form>
        <!-- User -->
        <div class="nav navbar-nav">
          <div class="col-lg-12"> <button class="btn btn-primary" onclick="window.location.href='index.php'">Return To Home Page</button></div>
        </div>

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['login_user'];?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style=" background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo ucfirst($_SESSION['login_user']);?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see your details here like username, email etc</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <p><?php echo $row['email'];?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Phone</label>
                        <p><?php echo $row['phone'];?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <p><?php echo $row['firstname'];?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <p><?php echo $row['lastname'];?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Cpanel information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Cpanel Username</label>
                        <p><?php echo $row1['username'];?></p>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Cpanel User Id</label>
                        <p><?php echo $row1['user_id'];?></p>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Cpanel Email Id</label>
                        <p><?php echo $row1['email'];?></p>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Cpanel Domain Name</label>
                        <p><?php echo $row1['domain_name'];?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Cpanel Client Name</label>
                        <p><?php echo $row1['client_name'];?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Admin Panel information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Admin Panel Subdomain</label>
                        <p><?php echo $row2['subdomain'];?></p>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Admin panel Domain Name</label>
                        <p><?php echo $row2['domain_name'];?></p>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Admin Panel Company Name</label>
                        <p><?php echo $row2['company_name'];?></p>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Admin panel Product id</label>
                        <p><?php echo $row2['product_id'];?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Admin panel User id</label>
                        <p><?php echo $row2['user_id'];?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>User Profile Page</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>