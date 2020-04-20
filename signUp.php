<?php
require('connectdb.php');
require('signInPage-db.php');

// $action = "list_tasks";        // default action
?>
<!doctype html>
<html>
	<head>
		<title>Example Story Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="home.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Ellipsis</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
                            <li><a href="home.php">Home</a></li>
							<li><a href="mypage.php">My Page</a></li>
							<li><a href="generic.html">FAQ</a></li>
							<li><a href="generic.html">Donate</a></li>
						</ul>
					</nav>
                    <div class="container">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="row">
                            <h2 style="text-align: center; color: black;">Create a new account</h2>
                            <div class = "column">
                                &nbsp;
                            </div>
                            <div class = "column" style="text-align: center;">
                                <div class="row" style="width=33.33%;">
                                    <div class="column" style="width:50%; text-align: right;">
                                        <div style="color: black;">Username:</div>
                                    </div>
                                    <div class="column" style="width:50%; text-align: left;">
                                        <div style="color: black;"><input type="text" id="username" name="username" placeholder="Username" required></div>
                                    </div>
                                </div>
                                <div class="row" style="width=33.33%; text-align: center;">
                                    <div class="column" style="width:50%; text-align: right;">
                                        <div style = "color: black;">Password:</div>
                                    </div>
                                    <div class="column" style="width:50%; text-align: left;">
                                        <div style = "color: black;"><input type="password" name="pwd" id="password" placeholder="Password" required></div>
                                    </div>
                                </div>
                                <div class="row" style="width=33.33%; text-align: center;">
                                    <div class="column" style="width:50%; text-align: right;">
                                        <div style = "color: black;">Re-Type Password:</div>
                                    </div>
                                    <div class="column" style="width:50%; text-align: left;">
                                        <div style = "color: black;"><input type="password" id="retypePass" name="password2" placeholder="Password" required></div>
                                    </div>
                                </div>
                                <div class="row" style="width=33.33%;">
                                    <div class="column" style="width:50%; text-align: right;">
                                        <div style="color: black;">First Name:</div>
                                    </div>
                                    <div class="column" style="width:50%; text-align: left;">
                                        <div style="color: black;"><input type="text" id="displayname" name="displayname" placeholder="First Name" required></div>
                                    </div>
                                </div>
                                <div class="row" style="width=33.33%;">
                                    <div class="column" style="width:50%; text-align: right;">
                                        <div style="color: black;">Email Address:</div>
                                    </div>
                                    <div class="column" style="width:50%; text-align: left;">
                                        <div style="color: black;"><input type="text" id="email_address" name="email_address" placeholder="Email" required></div>
                                    </div>
                                </div>
                                <input type="submit" id="submit" value="Create Account">
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    // DOM manipulation, event listener, arrow function
                    document.getElementById("submit").addEventListener("click", () => {
                        var usernameCheck = document.getElementById("username").value;
                        var usernameLength = usernameCheck.length;
                        var passwordCheck = document.getElementById("password").value;
                        var retypePassword = document.getElementById("retypePass").value;
                        var passwordLength = passwordCheck.length;

                        if (usernameLength < 5 && usernameLength != 0) {
                            alert("Username is too short. Must be longer than 5 characters.");
                        }
                        if(passwordLength < 5 && passwordLength != 0){
                            alert("Password is too short. Must be longer than 5 characters");
                        }
                        if(passwordCheck != retypePassword){
                            alert("Passwords do not match");
                        }
                    });
                </script>
                    </div>
                </div>
                <?php session_start(); 
                // foreach($_SESSION as $key => $value) {
                //     echo "<li style='color: black;'> $key : $value </li>";
                //   }
                ?>
                <?php
                    function reject($entry) {
                        echo "<li style='color: black;'>Username is already taken. Please enter a different one.</li>";
                    }
                  
                      if($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) >= 5 && strlen($_POST['pwd']) >= 5) {
                          $user = trim($_POST['username']);
                          $pwd = trim($_POST['pwd']);
                        
                          if(!ctype_alnum($user) || $newUserCheck == "user found") {//ctype_alnum checks if string is made of only alphanumeric characters (true if yes, false if not)
                            reject('username');
                          }
                          else {
                            if(isset($_POST['pwd'])) {
                                if(!ctype_alnum($pwd)) {
                                    reject('password');
                                }
                                
                                else {
                                    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                                    $newUserCheck = newUserSignUp($user, $hash_pwd);
                                    if($newUserCheck == "new user") {
                                        $_SESSION['user'] = $user;
                                        $_SESSION['pwd'] = $hash_pwd;
                                        header('Location: home.php');
                                    }
                                    else {
                                        reject('password');
                                    }
                                }
                            }
                          }
                      }
                ?>

            <br> </br>
            <div class="container">
                <div class="row">
                    <div class="column">
                        &nbsp;
                    </div>
                    <div class="column" style="text-align: center; color: black;">
                        Already have an account? <a href="signInPage.php" style="color: black;">Sign in here.</a>
                    </div>
                </div>
            </div>

            </body>
            </head>