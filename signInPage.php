<?php
require('connectdb.php');
require('signInPage-db.php');

// $action = "list_tasks";        // default action
?>
<!doctype html>
    <html>
    <head>
		<title>Sign In</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
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
							<li><a href="signInPage.php">Sign In</a></li>
                            <li><a href="mypage.php">My Page</a></li>
							<li><a href="generic.html">FAQ</a></li>
							<li><a href="generic.html">Donate</a></li>
						</ul>
					</nav>

                <!-- Main -->
                <body>
                <div class="container">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="row">
                            <h2 style="text-align: center; color: black;">Log In</h2>
                            <div class = "column">
                                &nbsp;
                            </div>
                            <div class = "row" style="text-align: center;">
                                <div style="color: black;">
                                    Username: <input type="text" name="username" placeholder="Username" required/>
                                </div>
                                <div style = "color: black;">
                                    Password: <input type="password" name="pwd" placeholder="Password" required/>
                                </div>
                                <input type="submit" value="Login" class="btn btn-light"/>
                            </div>
                            <div class = "column">
                                &nbsp;
                            </div>
                        </div>
                    </form>
                    <?php session_start(); ?>
                    <?php
                        function reject($entry) {
                            echo "<ul style='text-align: center; color: white;'>Incorrect " . $entry . ". Please try again or create an account.</ul>";
                          }
                      
                          if($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) > 0) {
                              $user = trim($_POST['username']);
                              $foundUser = getUser_by_username($user);
                              if(!ctype_alnum($user) || !$foundUser) {//ctype_alnum checks if string is made of only alphanumeric characters (true if yes, false if not)
                                reject('username');
                              }
                              else {
                                header('Location: mypage.php');
                                if(isset($_POST['pwd'])) {
                                    $pwd = trim($_POST['pwd']);
                                    
                                    if(!ctype_alnum($pwd)) {
                                    reject('password');
                                    }
                                    
                                    else {
                                    //$hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                                    $foundPass = checkPasswordToUser($user, $pwd);

                                    if($foundPass) {
                                        $_SESSION['user'] = $user;
                                        $_SESSION['pwd'] = $hash_pwd;
                                        header('Location: mypage.php');
                                    }
                                    else {
                                        reject('password');
                                        
                                        }
                                    }
                                }
                              }
                          }
                    ?>
                </div>
                <div class="container">
                    <div class="row">
                        <div class = "column" >
                            &nbsp;
                        </div>
                        <div class="column">
                            <div class="row">
                                <div class="column" width="11%" style="text-align: center;">
                                    <a href="signUp.php" style="color:red" class="btn">Sign Up</a>
                                </div>
                                <div class = "column" width="11%">
                                    &nbsp;
                                </div>
                                <div class="column" width="11%" style="text-align: center;">
                                    <a href="#" style="color:blue" class="btn">Forgot password?</a>
                                </div>
                            <div class="row">
                        </div>

                        <div class = "column" width="25%">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </body>
            </body>
        </head>
           