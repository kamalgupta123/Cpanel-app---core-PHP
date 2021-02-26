<?php
session_start();
include("config.php");
$sql = "SELECT * FROM adminpanel";
$result = mysqli_query($db,$sql);
$sql1 = "SELECT * FROM cpanel";
$result1 = mysqli_query($db,$sql1);
$sql2 = "SELECT DISTINCT `id`,`domain_name` FROM `cpanel` WHERE `user_id`=".$_SESSION['user_id'];
$result2 = mysqli_query($db,$sql2);
$sql3 = "SELECT DISTINCT `cpanel_id`,`domain`,`subdomain` FROM `adminpanel` WHERE `u_id`=".$_SESSION['user_id'];
$result3 = mysqli_query($db,$sql3);
$sql4 = "SELECT * FROM `products`";
$result4 = mysqli_query($db,$sql4);
$sql5 = "SELECT * FROM makeapp";
$result5 = mysqli_query($db,$sql5);
if(isset($_SESSION['login_user'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--jQuery CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <script src="jq/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
   <script src="jq/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="jq/css/validationEngine.jquery.css" type="text/css"/>
</head>

<body>
<script>
$(document).ready(function(){
    $("#signup-form").validationEngine({
        promptPosition: "topRight:-90"
    });
});
</script>
    <div class="main">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Home</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="user_profile.php">&nbsp;&nbsp;My Profile</a>
                        <div class="dropdown-divider"><hr></div>
                        <a class="dropdown-item" href="logout.php">&nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Logout</a>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
        <div class="container">
        <?php //echo $sql3;?>
            <div class="signup-content">    
                <div class="signup-desc">
                    <div class="col-sm-3 col-md-4 sidebar">
                        <ul class="nav nav-sidebar">
                            <li class="active"><a href="#" id="cpanel">Create Cpanel</a></li>
                            <li><a href="#" id="admin_panel">Install admin panel</a></li>
                            <li><a href="#" id="make_app">Make App</a></li>
                            <li><a href="#" id="my_admin_panel">My Admin Panel</a></li>
                            <li><a href="#" id="my_cpanel">My Cpanel</a></li>
                            <li><a href="#" id="my_app">My App</a></li>
                        </ul>
                    </div>
                    <!-- <div class="signup-desc-content">
                        <img src="images/signup-img.jpg" alt="" class="signup-img">
                    </div> -->
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <div class="signup-desc-content">
                        <img src="images/create.jpg" alt="" class="signup-img">
                    </div>
                </div>
                <div id="main">
                    <button class="btn btn-default" id="toggle-sidebar">☰</button>  
                </div>
                <!-- cpanel creation form -->
                <div class="signup-form-conent">
                    <form method="POST" id="signup-form" class="signup-form cpanel-form" enctype="multipart/form-data">
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 1 / 6</span>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="required" required>
                                <label for="username">Enter your username</label>
                            </div>
                        </fieldset>
    
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 2 / 6</span>
                            <div class="form-group">
                                <input type="text" name="password" id="password" class="validate[required]" required>
                                <label for="password">Enter your Password</label>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                        </fieldset>
    
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 3 / 6</span>
                            <div class="form-group">
                                <input type="text" name="email" class="validate[required]" id="email" required/>
                                <label for="email">Enter your Email</label>
                            </div>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 4 / 6</span>
                            <div class="form-group">
                                <input type="text" name="domain_name_cpanel" id="domain_name_cpanel" required/>
                                <label for="domain_name_cpanel">Enter your Domain Name</label>
                            </div>
                        </fieldset>
                        <h3></h3>

                        <fieldset>
                            <span class="step-current">Step 5 / 6</span>
                            <div class="form-group">
                                <input type="text" name="client_name" id="client_name" required/>
                                <label for="client_name">Enter your Client Name</label>
                            </div>
                        </fieldset>
                        <h3></h3>

                        <fieldset>
                            <span class="step-current">Step 6 / 6</span>
                            <div class="form-group">
                                <input type="number" name="project_id" id="project_id" required/>
                                <label for="project_id">Enter your Project Id (integer)</label>
                            </div>
                        </fieldset>
                    </form>
                    <form method="POST" id="admin_panel_form" class="signup-form admin_panel_form" enctype="multipart/form-data">

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 1 / 4</span>
                            <div class="form-group">
                                <input type="text" name="company_name" id="company_name" class="required" required/>
                                <label for="company_name">Enter your Company Name</label>
                            </div>
                        </fieldset>
    
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 2 / 4</span>
                            <div class="form-group">
                            <label for="product_id">Select your Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="select_choice">Select your Product</option>
                                <?php
                                    while($row4 = $result4->fetch_assoc()) {
                                        echo "<option value='".$row4['product_id']."'>".$row4['product_name']."</option>";
                                    }
                                ?>
                            </select>
                            </div>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 3 / 4</span>
                            <label for="domain_app">Enter your Domain Name</label>
                            <select name="domain_name_admin" id="domain_name_admin" class="form-control required">
                                <option value="select_choice">Select your domain name</option>
                                <?php
                                    while($row2 = $result2->fetch_assoc()) {
                                        echo "<option value='".$row2['domain_name']."' data-id=".$row2['id'].">".$row2['domain_name']."</option>";
                                    }
                                ?>
                            </select>
                            <div class="form-group">
                                <input type="text" name="subdomain" id="subdomain" required/>
                                <label for="subdomain">Enter Your Subdomain</label>
                            </div>
                            
                        </fieldset>
                        
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 4 / 4</span>
                            <div class="form-group">
                                <input type="file" id="logo" name="logo" />
                                <label for="confirm_password">Upload the company logo</label>
                            </div>
                        </fieldset>
                    </form>
                    <form method="POST" id="make_app_form" class="signup-form make_app_form" enctype="multipart/form-data">
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 1 / 9</span>
                            <div class="form-group">
                                <label for="domain_app">Enter your Domain Name</label>
                                <select name="domain_app" id="domain_app" class="form-control required">
                                    <option value="">Select your domain name</option>
                                    <?php
                                        while($row3 = $result3->fetch_assoc()) {
                                            if(empty($row3['subdomain'])){
                                                echo "<option value='".$row3['domain']."' data-cpanelid=".$row3['cpanel_id'].">".$row3['domain']."</option>";
                                            }
                                            else{
                                                echo "<option value='".$row3['subdomain'].".".$row3['domain']."' data-cpanelid=".$row3['cpanel_id'].">".$row3['subdomain'].".".$row3['domain']."</option>";
                                            }   
                                        }
                                    ?>
                                </select>
                            </div>
                        </fieldset>
    
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 2 / 9</span>
                            <div class="form-group">
                                <input type="text" name="appname" id="appname" class="required" required/>
                                <label for="appname">Enter your App Name</label>
                            </div>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 3 / 9</span>
                            <div class="form-group">
                                <input type="file" id="appicon" class="required" name="appicon" />
                                <label for="appicon">Upload the app icon</label>
                            </div>
                            <p class="app_uploaded_file">Uploaded file url : <a href="" id="appicon_file"></a></p>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 4 / 9</span>
                            <div class="form-group">
                                <input type="text" name="map_api_key" id="map_api_key" required/>
                                <label for="map_api_key">Enter your Map API Key</label>
                            </div>
                        </fieldset>
    
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 5 / 9</span>
                            <div class="form-group">
                                <input type="file" id="splashscreen" name="splashscreen" />
                                <label for="splashscreen">Upload the splash screen</label>
                            </div>
                            <p class="app_uploaded_file">Uploaded file url : <a href="" id="splashscreen_file"></a></p>
                        </fieldset>
                        
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 6 / 9</span>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" required/>
                                <label for="phone">Enter your phone number</label>
                            </div>
                        </fieldset>
                        
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 7 / 9</span>
                            <div class="form-group">
                                <input type="text" name="email_app" id="email_app" required/>
                                <label for="email_app">Enter your email</label>
                            </div>
                        </fieldset>
                        
                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 8 / 9</span>
                            <label for="colorcode">Enter your color code</label>
                            <div class="form-group">
                                <input type="color" name="colorcode" id="colorcode" value="#ff0000" required/>
                                
                            </div>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 9 / 9</span>
                            <div class="form-group">
                                <input type="file" id="json_file" name="json_file" />
                                <label for="json_file">Upload the json file</label>
                            </div>
                            <p class="app_uploaded_file">Uploaded file url : <a href="" id="json_file_upload"></a></p>
                        </fieldset>
                        <button class="btn btn-primary" id="advanced-toggle" type="button">Advanced
                        <span class="caret"></span></button><br><br>
                        <div id="advanced">
                            <input type="text" class="form-control advanced" placeholder="opt1" id="opt1">
                            <input type="text" class="form-control advanced" placeholder="opt2" id="opt2">
                            <input type="text" class="form-control advanced" placeholder="opt3" id="opt3">
                            <input type="text" class="form-control advanced" placeholder="version name" id="version_name">
                            <input type="text" class="form-control advanced" placeholder="version code" id="version_code"><br><br>
                            <button class="btn btn-primary" id="advanced-submit">Submit</button>
                        </div>
                    </form>
                    <!--<div class="container">-->
                    <!--    <div class="jumbotron">-->
                    <!--        <h3 class="display-3 text-script-output">Output of the script running in background</h3>-->
                    <!--        <hr class="my-4 hr-output-script">-->
                    <!--        <p class="lead"></p>-->
                    <!--    </div>                      -->
                    <!--</div>-->
                </div>

                <div class="table-data-admin table-wrapper">
                    <br><br><br><br>
                    <div class="row table-scroll">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>subdomain</th>
                                    <th>domain_name</th>
                                    <th>company_logo</th>
                                    <th>company_name</th>
                                    <th>product_id</th>
                                </tr>
                                <?php
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['subdomain']."</td>";
                                        echo "<td>".$row['domain']."</td>";
                                        echo "<td>".$row['company_logo']."</td>";
                                        echo "<td>".$row['company_name']."</td>";
                                        echo "<td>".$row['product_id']."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="table-data-cpanel table-wrapper">
                    <br><br><br><br>
                    <div class="row table-scroll">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>email</th>
                                    <th>domain_name</th>
                                    <th>client_name</th>
                                    <th>project_id</th>
                                </tr>
                                <?php
                                    while($row1 = $result1->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row1['username']."</td>";
                                        echo "<td>".$row1['password']."</td>";
                                        echo "<td>".$row1['email']."</td>";
                                        echo "<td>".$row1['domain_name']."</td>";
                                        echo "<td>".$row1['client_name']."</td>";
                                        echo "<td>".$row1['project_id']."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-data-app table-wrapper">
                    <br><br><br><br>
                    <div class="row table-scroll">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>uid</th>
                                    <th>appname</th>
                                    <th>appicon</th>
                                    <th>splashscreen</th>
                                    <th>username</th>
                                    <th>domain</th>
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>colorcode</th>
                                    <th>json_file</th>
                                    <th>map_api_key</th>
                                    <th>opt1</th>
                                    <th>opt2</th>
                                    <th>opt3</th>
                                    <th>versionname</th>
                                    <th>versioncode</th>
                                    <th>created</th>
                                    <th>Edit</th>
                                </tr>
                                <?php
                                    while($row1 = $result5->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row1['uid']."</td>";
                                        echo "<td>".$row1['appname']."</td>";
                                        echo "<td>".$row1['appicon']."</td>";
                                        echo "<td>".$row1['splashscreen']."</td>";
                                        echo "<td>".$row1['username']."</td>";
                                        echo "<td>".$row1['domain']."</td>";
                                        echo "<td>".$row1['phone']."</td>";
                                        echo "<td>".$row1['email']."</td>";
                                        echo "<td>".$row1['colorcode']."</td>";
                                        echo "<td>".$row1['json_file']."</td>";
                                        echo "<td>".$row1['map_api_key']."</td>";
                                        echo "<td>".$row1['opt1']."</td>";
                                        echo "<td>".$row1['opt2']."</td>";
                                        echo "<td>".$row1['opt3']."</td>";
                                        echo "<td>".$row1['versionname']."</td>";
                                        echo "<td>".$row1['versioncode']."</td>";
                                        echo "<td>".$row1['created']."</td>";
                                        echo "<td><button class='btn btn-primary' id='edit-app'>Edit</button></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="loading-api">
            <div class="split left">
                    <div id="loader">
                        <div>
                            <img src="images/reload.gif" alt="loader">
                        </div>
                    </div>
                    <div class="jumbotron" id="task-completed-div">
                        <h3 class="text-center">The Task is Completed</h1>
                        <a class="btn btn-success success-button" href="http://localhost/Cpanel/index.php">Go Back!</a>
                    </div>
            </div>
            <div class="split right">
                <div class="row">
                    <div class="container">
                            <div class="jumbotron">
                                <h3 class="display-3 text-script-output">Output of the script running in background</h3>
                                <hr class="my-4 hr-output-script">
                                <p class="lead"><div id='pwrShellDiagWC' class="lead-realtime" ><iframe id='ajaxFrameWC' src='' width='100%' height='60%' frameborder='0'></iframe></div></p>
                            </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
            echo "<script>";
            echo "var user_id =".$_SESSION['user_id'];
            echo "</script>";
    ?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
 <?php
}
else{
    header("location: login.php");
}
?>