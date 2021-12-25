<?php
    include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySchool Account Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
        if(isset($_GET['auth'])){
            if($_GET['auth'] == 'regfail'){
                echo '<script>alert("Registration failed.")</script>';
            }
        }
    ?>
    <section id="cover" class="min-vh-100">
		<div id="cover-caption">
			<div class="container">
				<br><br>
				<h1 class="display-4 mb-5 text-center">User Registration</h1>
				<br>
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
						<div class="px-2">
                            <form action="registration.php" method="POST" enctype="multipart/form-data" class="justify-content-center">
                                <div class="form-group">
                                    <h4><label for="fullname">Full name: </label></h4>
                                    <input type="text" class="form-control" name="fullname"/>
                                </div>
                                <div class="form-group">
                                    <h4><label for="username">Username: </label></h4>
                                    <input class="form-control" type="username" name="username">
                                </div>
                                <div class="form-group">
                                    <h4><label for="password">Password: </label></h4>
                                    <input class="form-control" type="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 mb-4" name="register">Submit</button>
                                <br>
                            </form>
						</div>
					</div>
				</div>
                <footer>
                    <h6 class="text-center">&copy Regents High School MMXXI</h6>
                </footer>
			</div>
		</div>
	</section>
</body>
</html>